<?php
class Manufacture implements JsonSerializable{
    private String|int $id_manufacture;
    private String $name;
    private int $delFlag;

    public function __construct($id_manufacture,$name,$delFlag)
    {
        $this->id_manufacture = $id_manufacture;
        $this->name = $name;
        $this->delFlag = $delFlag;
    }

    public function jsonSerialize()
    {
        return [
            'id_manufacture' => $this->id_manufacture,
            'name' => $this->name,
            'delFlag' => $this->delFlag,

        ];
    }
    /**
     * Get the value of id_manufacture
     */ 
    public function getId_manufacture()
    {
        return $this->id_manufacture;
    }

    /**
     * Set the value of id_manufacture
     *
     * @return  self
     */ 
    public function setId_manufacture($id_manufacture)
    {
        $this->id_manufacture = $id_manufacture;

        return $this;
    }

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
     * Get the value of delFlag
     */ 
    public function getDelFlag()
    {
        return $this->delFlag;
    }

    /**
     * Set the value of delFlag
     *
     * @return  self
     */ 
    public function setDelFlag($delFlag)
    {
        $this->delFlag = $delFlag;

        return $this;
    }
}



?>