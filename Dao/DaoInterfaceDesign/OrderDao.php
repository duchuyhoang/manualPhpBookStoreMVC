<?php
interface OrderDao {
    public function insertNewOrder(Order $order);
    public function getAllOrderLabel();
    public function getOrderDetail($id_order);
}