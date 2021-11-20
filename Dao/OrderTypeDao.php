<?php
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/../Model/OrderType.php";
require_once dirname(__FILE__) . "/./BaseDao.php";

class OrderTypeDao extends DBConnector implements BaseDao{

    public function __construct()
    {
        DBConnector::connectDB();
    }


    public function getById($id)
    {
        $query = "SELECT * FROM order_type WHERE delFlag=0 AND id_order_type=? LIMIT 1";

        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $order = $stmt->fetch();
        $selectedOrder = null;

        if ($order) {
            $selectedOrder = new OrderType($order["id_order_type"], $order["name_order_type"]);
        }
        return $selectedOrder;
    }


    public function getAll()
    {
        $query = "SELECT * FROM order_type WHERE delFlag=0";

        $stmt = parent::$db->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $orders = $stmt->fetchAll();
        $listOrderTypes = [];
        foreach ($orders as $order) {
            $listOrderTypes[] = new OrderType($order["id_order_type"], $order["name_order_type"]);
        }

        return $listOrderTypes;
    }



}


?>