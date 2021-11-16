<?php

require_once dirname(__FILE__) . "/Cart.php";
require_once dirname(__FILE__) . "/Address.php";
require_once dirname(__FILE__) . "/Payment.php";
require_once dirname(__FILE__) . "/OrderType.php";


class Order
{
    private $id_order;
    private Cart $cart;
    private Address $address;
    private Datetime $createAt;
    private int $status;
    private String $receiverName;
    private String $receiverPhone;
    private String $receiverEmail;
    private String|null $receiverPostCode;
    private Payment $payment;
    private OrderType $orderType;

function __construct($id_order,$cart,$address,$createAt,$status,$receiverName,
$receiverPhone,$receiverEmail,$receiverPostCode,$payment,$orderType){
$this->id_order=$id_order;
$this->cart=$cart;
$this->address=$address;
$this->createAt=$createAt;
$this->status=$status;
$this->receiverName=$receiverName;
$this->receiverPhone=$receiverPhone;
$this->receiverEmail=$receiverEmail;
$this->receiverPostCode=$receiverPostCode;
$this->payment=$payment;
$this->orderType=$orderType;

}




    /**
     * Get the value of id_order
     */ 
    public function getId_order()
    {
        return $this->id_order;
    }

    /**
     * Set the value of id_order
     *
     * @return  self
     */ 
    public function setId_order($id_order)
    {
        $this->id_order = $id_order;

        return $this;
    }

    /**
     * Get the value of cart
     */ 
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the value of cart
     *
     * @return  self
     */ 
    public function setCart($cart)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of createAt
     */ 
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set the value of createAt
     *
     * @return  self
     */ 
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of receiverName
     */ 
    public function getReceiverName()
    {
        return $this->receiverName;
    }

    /**
     * Set the value of receiverName
     *
     * @return  self
     */ 
    public function setReceiverName($receiverName)
    {
        $this->receiverName = $receiverName;

        return $this;
    }

    /**
     * Get the value of receiverPhone
     */ 
    public function getReceiverPhone()
    {
        return $this->receiverPhone;
    }

    /**
     * Set the value of receiverPhone
     *
     * @return  self
     */ 
    public function setReceiverPhone($receiverPhone)
    {
        $this->receiverPhone = $receiverPhone;

        return $this;
    }

    /**
     * Get the value of receiverEmail
     */ 
    public function getReceiverEmail()
    {
        return $this->receiverEmail;
    }

    /**
     * Set the value of receiverEmail
     *
     * @return  self
     */ 
    public function setReceiverEmail($receiverEmail)
    {
        $this->receiverEmail = $receiverEmail;

        return $this;
    }

    /**
     * Get the value of receiverPostCode
     */ 
    public function getReceiverPostCode()
    {
        return $this->receiverPostCode;
    }

    /**
     * Set the value of receiverPostCode
     *
     * @return  self
     */ 
    public function setReceiverPostCode($receiverPostCode)
    {
        $this->receiverPostCode = $receiverPostCode;

        return $this;
    }

    /**
     * Get the value of payment
     */ 
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Set the value of payment
     *
     * @return  self
     */ 
    public function setPayment($payment)
    {
        $this->payment = $payment;

        return $this;
    }
}
