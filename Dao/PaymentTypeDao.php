<?php
require_once dirname(__FILE__) . "/../Model/Payment.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/./BaseDao.php";


class PaymentTypeDao extends DBConnector implements BaseDao
{

    public function __construct()
    {
        DBConnector::connectDB();
    }

    public function getById($id)
    {
        $query = `SELECT * FROM payment_type WHERE delFlag=0 AND id_payment_type=? LIMIT 1`;

        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $payment = $stmt->fetch();
        $selectedPayment = null;

        if ($payment) {
            $selectedPayment = new Payment($payment->id_payment_type, $payment->payment_name);
        }


        return $selectedPayment;
    }
    public function getAll()
    {
        $query = `SELECT * FROM payment_type WHERE delFlag=0`;

        $stmt = parent::$db->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $payments = $stmt->fetchAll();
        $listPayment = [];
        foreach ($payments as $payment) {
            $listPayment[] = new Payment($payment->id_payment_type, $payment->payment_name);
        }

        return $listPayment;
    }
}
