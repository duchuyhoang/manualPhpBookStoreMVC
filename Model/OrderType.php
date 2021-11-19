<?php

class OrderType{
    public static $Online = 0;
    public static $Offline = 1;
    private $id_order_type;
    private $name;


    function __construct($id_order_type, $name)
    {
        $this->id_order_type = $id_order_type;
        $this->name = $name;
    }


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
     * Get the value of id_order_type
     */ 
    public function getId_order_type()
    {
        return $this->id_order_type;
    }

    /**
     * Set the value of id_order_type
     *
     * @return  self
     */ 
    public function setId_order_type($id_order_type)
    {
        $this->id_order_type = $id_order_type;

        return $this;
    }
}
