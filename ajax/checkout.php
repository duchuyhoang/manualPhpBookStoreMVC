<?php
require_once dirname(__FILE__) . "/../shared/functions.php";
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../shared/constants.php";

require_once dirname(__FILE__) . "/../Model/Cart.php";
require_once dirname(__FILE__) . "/../Model/Address.php";
require_once dirname(__FILE__) . "/../Model/Order.php";
require_once dirname(__FILE__) . "/../Model/OrderType.php";
require_once dirname(__FILE__) . "/../Model/User.php";
require_once dirname(__FILE__) . "/../Model/Payment.php";
require_once dirname(__FILE__) . "/../Dao/CartDao.php";
require_once dirname(__FILE__) . "/../Dao/OrderDao.php";
require_once dirname(__FILE__) . "/../Dao/PaymentTypeDao.php";
require_once dirname(__FILE__) . "/../Dao/OrderTypeDao.php";
require_once dirname(__FILE__) . "/../PDOTransaction.php";


session_start();
$actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;

switch ($actionType) {


    case $CHECKOUT_CART: {
            $transactionDb = new PDOTransaction();
            // $transactionDb->rollbackTrasaction();
            try {
                $receiverFirstName = $_POST["receiverFirstName"];
                $receiverLastName = $_POST["receiverLastName"];
                $receiverEmail = $_POST["receiverEmail"];
                $receiverCity = $_POST["receiverCity"];
                $receiverDistrict = $_POST["receiverDistrict"];
                $receiverWard = $_POST["receiverWard"];
                $receiverAddressNote = $_POST["receiverAddressNote"];
                $receiverPhone = $_POST["receiverPhone"];
                $receiverPostcode = $_POST["receiverPostcode"];
                $receiverOrderNote = $_POST["receiverOrderNote"];
                $receiverPayment = $_POST["receiverPayment"];
                $receiverOrderType = $_POST["receiverOrderType"];


                $currentUser = isset($_SESSION[$CURRENT_USER_INFO]) ? $_SESSION[$CURRENT_USER_INFO] : null;

                if ($currentUser === null || !($currentUser instanceof User)) {
                    throw new Exception('Need an user', 1000);
                }
                $currentCart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : null;
                if ($currentCart === null || !($currentCart instanceof Cart)) {
                    throw new Exception('Need a cart', 1001);
                }

                $cartDao = new CartDao();
                // $transactionDb->
                $addCartStatus = $cartDao->insertNewCart($currentCart);
                if (!$addCartStatus)
                    throw new Exception('Add cart failed', 1002);
                $orderDao = new OrderDao();
                $paymentTypeDao = new PaymentTypeDao();

                $selectedPayment = $paymentTypeDao->getById($receiverPayment);

                if (!$selectedPayment)
                    throw new Exception('Payment required', 1003);

                $orderTypeDao = new OrderTypeDao();

                $selectedOrderType = $orderTypeDao->getById($receiverOrderType);
                if (!$selectedOrderType)
                    throw new Exception('Order type required', 1004);


                $isInsertSucceed = $orderDao->insertNewOrder(new Order(
                    generateRandomString(30),
                    $currentCart,
                    new Address($receiverCity, "", $receiverDistrict, "", $receiverWard, "", $receiverAddressNote),
                    new DateTime('now',new DateTimeZone("Asia/Bangkok")),
                    // date("Y-m-d h:i:s"),
                    $ORDER_STATUS_PENDING,
                    $receiverLastName . " " . $receiverFirstName,
                    $receiverPhone,
                    $receiverEmail,
                    $receiverPostcode,
                    $selectedPayment,
                    $selectedOrderType,
                    $currentUser,
                    $receiverOrderNote
                ));

                if (!$isInsertSucceed)
                    throw new Exception('Add product to order failed', 1005);

                $transactionDb->commitTrasaction();

                $response = new stdClass();
                $response->message = "Success";
                $_SESSION["cart"] = NULL;
                echo json_encode($response);
            } catch (Exception $e) {
                $transactionDb->rollbackTrasaction();
                $message = $e->getMessage();
                http_response_code(400);
                $response = new stdClass();
                $response->message = $message;
                echo json_encode($response);
            }
            catch(PDOException $e) {
                $transactionDb->rollbackTrasaction();
                $message = $e->getMessage();
                http_response_code(400);
                $response = new stdClass();
                $response->message = $message;
                echo json_encode($response);
            }





            break;
        }
}
