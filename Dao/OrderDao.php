<?php
require_once dirname(__FILE__) . "/../Model/Order.php";
require_once dirname(__FILE__) . "/../Model/OrderLabel.php";
require_once dirname(__FILE__) . "/../Model/User.php";
require_once dirname(__FILE__) . "/../Model/Payment.php";
require_once dirname(__FILE__) . "/../Model/Cart.php";
require_once dirname(__FILE__) . "/../Model/OrderType.php";
require_once dirname(__FILE__) . "/../Implement/OrderImplement.php";

require_once dirname(__FILE__) . "/./BookDao.php";



class OrderDao extends DBConnector implements OrderImplement
{

    private BookDao $bookDao;

    public function __construct()
    {
        DBConnector::connectDB();
        $this->bookDao = new BookDao();
        // parent::__construct();
    }

    public function insertNewOrder(Order $order)
    {



        try {

            $query = "INSERT INTO orders(id_order,id_user,id_cart,status,createAt,id_order_province,id_order_district,id_order_ward,receiver_name,receiver_phone,receiver_email,receiver_postcode,paymentType,note,addressNote,orderType) VALUES(?,?,?,0,'{$order->getCreateAt()->format('Y-m-d H:i:s')}',?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $order->getId_order());
            $stmt->bindParam(2, $order->getOwner()->getId());
            $stmt->bindParam(3, $order->getCart()->getId_cart());
            // $stmt->bindParam(4, $order->getCreateAt()->format('Y-m-d H:i:s'));
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

    public function getAllOrderLabel()
    {
        $query = "
        SELECT orders.*,province.name as provinceName,
        district.name as districtName,ward.name as wardName,
        payment_type.*,order_type.*,userInfo.*
        FROM orders
        INNER JOIN province ON province.id=orders.id_order_province
        INNER JOIN district ON district.id=orders.id_order_district
        INNER JOIN ward ON ward.id=orders.id_order_ward
        LEFT JOIN payment_type ON orders.paymentType=payment_type.id_payment_type
        LEFT JOIN order_type ON orders.orderType=order_type.id_order_type
        LEFT JOIN (
        SELECT user.*,province.name as userProvinceName,
        district.name as userDistrictName,ward.name as userWardName
        FROM user 
        LEFT JOIN province ON province.id=user.id_province
        LEFT JOIN district ON district.id=user.id_district
        LEFT JOIN ward ON ward.id=user.id_ward
        ) as userInfo
        ON orders.id_user= userInfo.id_user ORDER BY orders.createAt DESC;";
        $stmt = parent::$db->query($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $list_query_order_label = $stmt->fetchAll();
        $listOrderLabel = [];

        foreach ($list_query_order_label as $query_order_label) {
            $listOrderLabel[] = new OrderLabel(
                $query_order_label["id_order"],
                $query_order_label["id_cart"],
                User::newNormalUser(
                    $query_order_label["id_user"],
                    $query_order_label["name"],
                    new DateTime($query_order_label["birthday"]),
                    $query_order_label["self_describe"],
                    $query_order_label["avatar"],
                    $query_order_label["delFlag"],
                    $query_order_label["email"],
                    new Address(
                        $query_order_label["id_province"],
                        $query_order_label["userProvinceName"],
                        $query_order_label["id_district"],
                        $query_order_label["userDistrictName"],
                        $query_order_label["id_ward"],
                        $query_order_label["userWardName"],
                        ""
                    ),
                    $query_order_label["phone"],
                    $query_order_label["permission"],
                ),
                new DateTime($query_order_label["createAt"]),
                new Address(
                    $query_order_label["id_order_province"],
                    $query_order_label["provinceName"],
                    $query_order_label["id_order_district"],
                    $query_order_label["districtName"],
                    $query_order_label["id_order_ward"],
                    $query_order_label["wardName"],
                    $query_order_label["addressNote"],
                ),
                $query_order_label["status"],
                $query_order_label["receiver_name"],
                $query_order_label["receiver_phone"],
                $query_order_label["receiver_email"],
                new Payment(
                    $query_order_label["id_payment_type"],
                    $query_order_label["payment_name"]
                ),
                new OrderType(
                    $query_order_label["id_order_type"],
                    $query_order_label["name_order_type"]
                ),

            );
        }
        return $listOrderLabel;
    }

    public function getOrderDetail($id_order)
    {

        try {
            $query = "SELECT orders.*,province.name as provinceName,district.name as districtName,ward.name as wardName,payment_type.*,order_type.*,userInfo.*,cartInfo.* FROM 
            (SELECT 
            group_concat(cart_item.id_cart_item SEPARATOR '////') as listCartItemId,group_concat(cart_item.id_book SEPARATOR '////') as listCartItemIdBook,
            group_concat(cart_item.quantity SEPARATOR '////') as listCartItemQuantity,
            group_concat(cart_item.price SEPARATOR '////') as listCartItemPrice,
            cart.createAt as cartCreateAt
            FROM cart INNER JOIN cart_item ON cart.id_cart=cart_item.id_cart
            INNER JOIN orders ON orders.id_cart=cart.id_cart WHERE orders.id_order = '{$id_order}' ) as cartInfo,orders
            INNER JOIN province ON province.id=orders.id_order_province
            INNER JOIN district ON district.id=orders.id_order_district
            INNER JOIN ward ON ward.id=orders.id_order_ward
            LEFT JOIN payment_type ON orders.paymentType=payment_type.id_payment_type
            LEFT JOIN order_type ON orders.orderType=order_type.id_order_type
            LEFT JOIN (SELECT user.*,province.name as userProvinceName,
            district.name as userDistrictName,ward.name as userWardName FROM user 
            INNER JOIN province ON province.id=user.id_province
            INNER JOIN district ON district.id=user.id_district
            INNER JOIN ward ON ward.id=user.id_ward
            ) as userInfo
            ON orders.id_user= userInfo.id_user WHERE orders.id_order='{$id_order}';";
            // $query = preg_replace("/[\r\n]*/", "", $query);
            $stmt = parent::$db->query($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            // $stmt->execute([
            //     "id_order_1" => $id_order,
            //     "id_order_2" => $id_order,
            // ]);


            // $stmt->bindParam(1, $id_order);
            // $stmt->bindParam(2, $id_order);

            // $stmt->bindParam(":id_order_1", $id_order,PDO::PARAM_STR);
            // $stmt->bindParam(":id_order_2", $id_order,PDO::PARAM_STR);

            $query_order = $stmt->fetch();
            $selectedOrder = null;




            if ($query_order) {

                $listBookInfo = $this->bookDao->getBookByListId(explode("////", $query_order["listCartItemIdBook"]));

                $cartUser = User::newNormalUser(
                    $query_order["id_user"],
                    $query_order["name"],
                    new DateTime($query_order["birthday"]),
                    $query_order["self_describe"],
                    $query_order["avatar"],
                    $query_order["delFlag"],
                    $query_order["email"],
                    new Address(
                        $query_order["id_order_province"],
                        $query_order["userProvinceName"],
                        $query_order["id_order_district"],
                        $query_order["userDistrictName"],
                        $query_order["id_order_ward"],
                        $query_order["userWardName"],
                        ""
                    ),
                    $query_order["phone"],
                    $query_order["permission"],
                );


                $selectedOrder = new Order(
                    $query_order["id_order"],
                    Cart::newCartFromDb(
                        $query_order["id_cart"],
                        array(
                            "listCartItemIdBook" => $query_order["listCartItemIdBook"],
                            "listCartItemPrice" => $query_order["listCartItemPrice"],
                            "listCartItemQuantity" => $query_order["listCartItemQuantity"],
                        ),
                        $listBookInfo,
                        new DateTime($query_order["cartCreateAt"]),
                        $cartUser
                    ),
                    new Address(
                        $query_order["id_province"],
                        $query_order["userProvinceName"],
                        $query_order["id_district"],
                        $query_order["userDistrictName"],
                        $query_order["id_ward"],
                        $query_order["userWardName"],
                        ""
                    ),
                    new DateTime($query_order["createAt"]),
                    $query_order["status"],
                    $query_order["receiver_name"],
                    $query_order["receiver_phone"],
                    $query_order["receiver_email"],
                    $query_order["receiver_postcode"],
                    new Payment(
                        $query_order["id_payment_type"],
                        $query_order["payment_name"]
                    ),
                    new OrderType(
                        $query_order["id_order_type"],
                        $query_order["name_order_type"]
                    ),
                    $cartUser,
                    $query_order["note"],

                );
            }
            return $selectedOrder;
        } catch (PDOException $e) {


        }
    }
}