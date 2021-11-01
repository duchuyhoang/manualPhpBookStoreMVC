<?php

class Author
{
    private String|int $id_author;
    private String|null $maxim;
    private String|null $birthday;
    private String|int $delFlag;
    private String|null $address;
    private String $name;

    public function __construct($id_author, $maxim,$name, $birthday, $delFlag, $address)
    {

        $this->id_author = $id_author;
        $this->maxim = $maxim;
        $this->birthday = $birthday;
        $this->delFlag = $delFlag;
        $this->address = $address;
        $this->name=$name;
    }

    /**
     * Get the value of id_author
     */ 
    public function getId_author()
    {
        return $this->id_author;
    }

    /**
     * Set the value of id_author
     *
     * @return  self
     */ 
    public function setId_author($id_author)
    {
        $this->id_author = $id_author;

        return $this;
    }

    /**
     * Get the value of maxim
     */ 
    public function getMaxim()
    {
        return $this->maxim;
    }

    /**
     * Set the value of maxim
     *
     * @return  self
     */ 
    public function setMaxim($maxim)
    {
        $this->maxim = $maxim;

        return $this;
    }

    /**
     * Get the value of birthday
     */ 
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set the value of birthday
     *
     * @return  self
     */ 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

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
}
