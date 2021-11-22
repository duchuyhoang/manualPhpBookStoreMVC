<?php
require_once dirname(__FILE__) . "/User.php";
require_once dirname(__FILE__) . "/Address.php";

class OrderLabel implements JsonSerializable
{
    private $id_order;
    private String $id_cart;
    private User $orderUser;
    private DateTime $createAt;
    private Address $address;
    private int $status;
    private String $receiverName;
    private String $receiverPhone;
    private String $receiverEmail;
    private Payment $payment;
    private OrderType $orderType;

    public function __construct(
        $id_order,
        $id_cart,
        $orderUser,
        $createAt,
        $address,
        $status,
        $receiverName,
        $receiverPhone,
        $receiverEmail,
        $payment,
        $orderType
    ) {

        $this->id_order = $id_order;
        $this->id_cart = $id_cart;
        $this->orderUser = $orderUser;
        $this->createAt = $createAt;
        $this->address = $address;
        $this->status = $status;
        $this->receiverName = $receiverName;
        $this->receiverPhone = $receiverPhone;
        $this->receiverEmail = $receiverEmail;
        $this->payment = $payment;
        $this->orderType = $orderType;
    }



    public function jsonSerialize()
    {
        return [
            "id_order" => $this->id_order,
            "id_cart" => $this->id_cart,
            "orderUser" => $this->orderUser,
            "createAt" => $this->createAt,
            "address" => $this->address,
            "status" => $this->status,
            "receiverName" => $this->receiverName,
            "receiverPhone" => $this->receiverPhone,
            "payment" => $this->payment,
            "receiverEmail" => $this->receiverEmail,
            "orderType" => $this->orderType,
        ];
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
     * Get the value of id_cart
     */
    public function getId_cart()
    {
        return $this->id_cart;
    }

    /**
     * Set the value of id_cart
     *
     * @return  self
     */
    public function setId_cart($id_cart)
    {
        $this->id_cart = $id_cart;

        return $this;
    }

    /**
     * Get the value of orderUser
     */
    public function getOrderUser()
    {
        return $this->orderUser;
    }

    /**
     * Set the value of orderUser
     *
     * @return  self
     */
    public function setOrderUser($orderUser)
    {
        $this->orderUser = $orderUser;

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

    /**
     * Get the value of orderType
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Set the value of orderType
     *
     * @return  self
     */
    public function setOrderType($orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }
}