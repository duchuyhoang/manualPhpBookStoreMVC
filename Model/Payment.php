<?php

class Payment
{
    // public static $Money = 0;
    // public static $Card = 1;
    // public static $MoneyName = "Money";
    // public static $CardName = "Card";

    private $id_payment;
    private $name;
    function __construct($id_payment, $name)
    {
        $this->id_payment = $id_payment;
        $this->name = $name;
    }

    // public static function detectPaymentType($type)
    // {

    //     switch (intval($type)) {
    //         case Payment::$Money:
    //             return new self(Payment::$Money, Payment::$MoneyName);
    //             break;

    //         case Payment::$Card:
    //             return new self(Payment::$Card, Payment::$CardName);
    //             break;

    //         default:
    //             return new self(Payment::$Money, Payment::$MoneyName);
    //     }
    // }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of id_payment
     */ 
    public function getId_payment()
    {
        return $this->id_payment;
    }

    /**
     * Set the value of id_payment
     *
     * @return  self
     */ 
    public function setId_payment($id_payment)
    {
        $this->id_payment = $id_payment;

        return $this;
    }
}
