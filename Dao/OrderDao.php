<?php
require_once dirname(__FILE__) . "/../Model/Order.php";




class OrderDao extends DBConnector
{
    public function __construct()
    {
        DBConnector::connectDB();
        // parent::__construct();
    }

    public function insertNewOrder(Order $order)
    {
        try {

            $query = "INSERT INTO orders(id_order,id_user,id_cart,status,createAt,id_order_province,id_order_district,id_order_ward,receiver_name,receiver_phone,receiver_email,receiver_postcode,paymentType,note,addressNote,orderType) VALUES(?,?,?,0,now(),?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $order->getId_order());
            $stmt->bindParam(2, $order->getOwner()->getId());
            $stmt->bindParam(3, $order->getCart()->getId_cart());
            $stmt->bindParam(4, $order->getAddress()->getId_province());
            $stmt->bindParam(5, $order->getAddress()->getId_district());
            $stmt->bindParam(6, $order->getAddress()->getId_ward());
            $stmt->bindParam(7, $order->getReceiverName());
            $stmt->bindParam(8, $order->getReceiverPhone());
            $stmt->bindParam(9, $order->getReceiverEmail());
            $stmt->bindParam(10, $order->getReceiverPostCode());
            $stmt->bindParam(11, $order->getPayment()->getId_payment());
            $stmt->bindParam(12, $order->getNote());
            $stmt->bindParam(13, $order->getAddress()->getMoreInfo());
            $stmt->bindParam(14, $order->getOrderType()->getId_order_type());

            $stmt->execute();


            $listBookItem = $order->getCart()->getListBook();
            $updateProductQuery = "CALL buyProduct(?,?,@result);";
            $isUpdateProductSucceed = true;
            foreach ($listBookItem as $bookItem) {
                $stmt = parent::$db->prepare($updateProductQuery);
                $stmt->bindParam(1, $bookItem->getBook()->getId_book());
                $stmt->bindParam(2, $bookItem->getQuantity());
                // $stmt->bindParam(3,$res,PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $stmt->closeCursor();

                $rs = parent::$db->query("select @result as result")->fetch(PDO::FETCH_ASSOC);
                if (!$rs["result"]) {
                    $isUpdateProductSucceed = false;
                    break;
                }
            }

            if (!$isUpdateProductSucceed) {
                throw new Exception("Buy product failed", 2000);
            }
            return true;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}
