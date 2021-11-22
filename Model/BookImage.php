<?php


class BookImage implements JsonSerializable{
    private String|int $id_image;
    private String|null $url;
    private String|int $id_book;
    private String|int $delFlag;


    public function __construct($id_image,$url,$id_book,$delFlag){
        $this->id_image=$id_image;
        $this->url=$url;
        $this->id_book=$id_book;
        $this->delFlag=$delFlag;
    }

    public function jsonSerialize()
    {
        return [
            'id_image' => $this->id_image,
            'url' => $this->url,
            'id_book' => $this->id_book,
            'delFlag' => $this->delFlag,
        ];
    }
    /**
     * Get the value of id_image
     */ 
    public function getId_image()
    {
        return $this->id_image;
    }

    /**
     * Set the value of id_image
     *
     * @return  self
     */ 
    public function setId_image($id_image)
    {
        $this->id_image = $id_image;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

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



?>