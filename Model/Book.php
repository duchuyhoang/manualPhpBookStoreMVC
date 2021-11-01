<?php
require_once dirname(__FILE__) ."/Author.php";
require_once dirname(__FILE__) ."/Manufacture.php";
require_once dirname(__FILE__) ."/Category.php";


class Book
{
    private $id_book;
    private $name;
    private $quantity;
    private $status;
    private $description;
    private Category $category;
    private Manufacture $manufacture;
    private Author $author;

public function __construct($id_book,$name,$quantity,$status,$description,$id_category,
$category_name,$category_delFlag,
$id_manufacture,$manufacture_name,$manufacture_delFlag,
$id_author,$author_name,$author_maxim,$author_address,$author_delFlag,$author_birthday){
$this->id_book = $id_book;
$this->name = $name;
$this->quantity = $quantity;
$this->status = $status;
$this->description = $description;
$this->category = new Category($id_category,$category_name,$category_delFlag);
$this->manufacture =new Manufacture($id_manufacture,$manufacture_name,$manufacture_delFlag);
$this->author=new Author($id_author,$author_maxim,$author_name,$author_birthday,$author_delFlag,$author_address);
}


    /**
     * Get the value of id_book
     */ 
    public function getId_book()
    {
        return $this->id_book;
    }

    /**
     * Set the value of id_book
     *
     * @return  self
     */ 
    public function setId_book($id_book)
    {
        $this->id_book = $id_book;

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
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of manufacture
     */ 
    public function getManufacture()
    {
        return $this->manufacture;
    }

    /**
     * Set the value of manufacture
     *
     * @return  self
     */ 
    public function setManufacture($manufacture)
    {
        $this->manufacture = $manufacture;

        return $this;
    }

    /**
     * Get the value of author
     */ 
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */ 
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
}
