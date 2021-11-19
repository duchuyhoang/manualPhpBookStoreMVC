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
            parent::$db->beginTransaction();
            $query = "INSERT INTO order(id_order,id_user,id_cart,status,createAt,id_order_province,id_order_district,
    id_order_ward,receiver_name,receiver_phone,receiver_email,receiver_postcode,paymentType,note,addressNote,orderType
    VALUES(?,?,?,0,now(),?,?,?,?,?,?,?,?,?,?,?)
    ";
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
            $stmt->bindParam(11, $order->getPayment()->getId_payment);
            $stmt->bindParam(12, $order->getNote());
            $stmt->bindParam(13, $order->getAddress()->getMoreInfo());
            $stmt->bindParam(14, $order->getOrderType()->getId_order_type());

            $stmt->execute();

            // for ($i = 0; $i < count($listBookCategory); $i++) {
            //     $questionMark[] = '(' . placeholders('?', 2) . ')';
            //     $insertData = array_merge($insertData, array($listBookCategory[$i]->getId_book_category(), $listBookCategory[$i]->getId_book()));
            // }

            $questionMark[] = '(' . placeholders('?', 2) . ')';






        } catch (PDOException $e) {
            parent::$db->rollBack();

        }



        // parent::$db->comm

        // $stmt = parent::$db->query($query);

    }
}
