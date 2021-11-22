<?php
require_once dirname(__FILE__) . "/Book.php";
require_once dirname(__FILE__) . "/Book.php";
require_once dirname(__FILE__) . "/Category.php";

class StatistcalBookByMonth implements JsonSerializable
{
    private Book $book;
    private float $totalPrice;
    private int $totalQuantity;
    // private Category $listCategory;
    private Datetime $statistcalDate;

    public function __construct(Book $book, $totalPrice, $totalQuantity, $statistcalDate)
    {
        $this->book = $book;
        $this->totalPrice = $totalPrice;
        $this->totalQuantity = $totalQuantity;
        $this->statistcalDate = $statistcalDate;
    }


    public function jsonSerialize()
    {
        return array(
            "book" => $this->book,
            "totalPrice" => $this->totalPrice,
            "totalQuantity" => $this->totalQuantity,
            "statistcalDate" => $this->statistcalDate
        );
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
     * Get the value of totalPrice
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * Set the value of totalPrice
     *
     * @return  self
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;

        return $this;
    }

    /**
     * Get the value of statistcalDate
     */
    public function getStatistcalDate()
    {
        return $this->statistcalDate;
    }

    /**
     * Set the value of statistcalDate
     *
     * @return  self
     */
    public function setStatistcalDate($statistcalDate)
    {
        $this->statistcalDate = $statistcalDate;

        return $this;
    }

    /**
     * Get the value of totalQuantity
     */
    public function getTotalQuantity()
    {
        return $this->totalQuantity;
    }

    /**
     * Set the value of totalQuantity
     *
     * @return  self
     */
    public function setTotalQuantity($totalQuantity)
    {
        $this->totalQuantity = $totalQuantity;

        return $this;
    }
}
