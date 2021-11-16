<?php

class BookItem implements JsonSerializable{

private $book;
private $quantity;
private $maxQuantity;
private $price;

public function __construct($book,$quantity,$maxQuantity,$price){
    $this->book = $book;
    $this->quantity = $quantity;
    $this->maxQuantity=$maxQuantity;
    if($price) $this->price=$price;
    else $this->price=$book->getPrice()-$book->getPrice()*$book->getSale();
}


public function jsonSerialize()
    {
        return [
            'id_book' => $this->book->getId_book(),
            'name' => $this->book->getName(),
            'boughtQuantity' => $this->quantity,
            'description' => $this->description,
            'sale'=>$this->book->getSale(),
            'price' =>  $this->book->getPrice(),
            'listImage' =>  $this->book->getListImage(),
            'authorName' => $this->book->getAuthor()->getName(),

        ];
    }


/**
 * Get the value of book
 */ 
public function getBook()
{
return $this->book;
}

/**
 * Set the value of book
 *
 * @return  self
 */ 
public function setBook($book)
{
$this->book = $book;

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
 * Get the value of maxQuantity
 */ 
public function getMaxQuantity()
{
return $this->maxQuantity;
}

/**
 * Set the value of maxQuantity
 *
 * @return  self
 */ 
public function setMaxQuantity($maxQuantity)
{
$this->maxQuantity = $maxQuantity;

return $this;
}

/**
 * Get the value of price
 */ 
public function getPrice()
{
return $this->price;
}

/**
 * Set the value of price
 *
 * @return  self
 */ 
public function setPrice($price)
{
$this->price = $price;

return $this;
}
}





?>