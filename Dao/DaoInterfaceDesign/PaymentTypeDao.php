<?php
interface PaymentTypeDao {
    public function getAll();
    public function getById($id);
}