<?php


class BookCategory implements JsonSerializable{

    private String|int $id;
    private String|int $id_book_category;
    private String|int $id_book;
    private String|int $delFlag;

 
public function __construct($id,$id_book_category,$id_book,$delFlag){
    $this->id=$id;
    $this->id_book_category=$id_book_category;
    $this->id_book=$id_book;
    $this->delFlag=$delFlag;
}

    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "id_book_category" => $this->id_book_category,
            "id_book" => $this->id_book,
            "delFlag" => $this->delFlag,
        ];
    }
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_book_category
     */ 
    public function getId_book_category()
    {
        return $this->id_book_category;
    }

    /**
     * Set the value of id_book_category
     *
     * @return  self
     */ 
    public function setId_book_category($id_book_category)
    {
        $this->id_book_category = $id_book_category;

        return $this;
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