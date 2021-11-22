<?php

class Category implements JsonSerializable{
    private String|int $id_category;
    private String $cat_name;
    private int $delFlag;

    public function __construct($id_category,$cat_name,$delFlag){
        $this->id_category = $id_category;
        $this->cat_name = $cat_name;
        $this->delFlag = $delFlag;
    }
    
    public function jsonSerialize()
    {
        return [
            'id_category' => $this->id_category,
            'cat_name' => $this->cat_name,
            'delFlag' => $this->delFlag,
        ];
    }

    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of cat_name
     */ 
    public function getCat_name()
    {
        return $this->cat_name;
    }

    /**
     * Set the value of cat_name
     *
     * @return  self
     */ 
    public function setCat_name($cat_name)
    {
        $this->cat_name = $cat_name;

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