<?php
require_once dirname(__FILE__) . "/Author.php";
require_once dirname(__FILE__) . "/Manufacture.php";
require_once dirname(__FILE__) . "/Category.php";
require_once dirname(__FILE__) . "/BookImage.php";


class Book implements JsonSerializable
{
    private $id_book;
    private $name;
    private $quantity;
    private $status;
    private $description;
    private $price;
    private $sale;
    // Category
    private $category;
    private Manufacture $manufacture;
    private Author $author;
    // BookImage[]
    private $listImage;
    private $createAt;

    public function __construct(
        $id_book,
        $name,
        $price,
        $quantity,
        $status,
        $description,
        $list_id_category,
        $list_category_name,
        $list_category_delFlag,
        $id_manufacture,
        $manufacture_name,
        $manufacture_delFlag,
        $id_author,
        $author_name,
        $author_maxim,
        $author_address,
        $author_delFlag,
        $author_birthday,
        $list_book_image_id,
        $list_book_image_url,
        $list_book_image_delFlag,
        $createAt,
        $sale
    ) {
        $this->id_book = $id_book;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->status = $status;
        $this->description = $description;
        $this->createAt = $createAt;
        $this->sale = $sale;
        $listImage = array();
        $listCategory = array();
        // $this->category = new Category($id_category,$category_name,$category_delFlag);



        if ($list_id_category) {
            $listBookCategoryId = explode("////", $list_id_category);
            $listBookCategoryName = explode("////", $list_category_name);
            $listBookCategoryDelflag = explode("////", $list_category_delFlag);
            for ($i = 0; $i < count($listBookCategoryId); $i++) {
                array_push($listCategory, new Category($listBookCategoryId[$i], $listBookCategoryName[$i], $listBookCategoryDelflag[$i]));
            }
        }

        if ($list_book_image_id) {
            $listBookImageId = explode("////", $list_book_image_id ? $list_book_image_id : "");
            $listBookImageUrl = explode("////", $list_book_image_url ? $list_book_image_url : "");

            $listBookImageDelFlag = explode("////", $list_book_image_delFlag ? $list_book_image_delFlag : "");
            for ($i = 0; $i < count($listBookImageId); $i++) {
                array_push($listImage, new BookImage($listBookImageId[$i], $listBookImageUrl[$i], $id_book, $listBookImageDelFlag[$i]));
            }
        }


        $this->listImage = $listImage;
        $this->category = $listCategory;
        $this->manufacture = new Manufacture($id_manufacture, $manufacture_name, $manufacture_delFlag);
        $this->author = new Author($id_author, $author_maxim, $author_name, $author_birthday, $author_delFlag, $author_address);
    }

    public function jsonSerialize()
    {
        return [
            'id_book' => $this->id_book,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'status' => $this->status,
            'description' => $this->description,
            'price' =>  $this->price,
            'sale' =>  $this->sale,
        ];
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

    /**
     * Get the value of createAt
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set the value of createAt
     *
     * @return  self
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get the value of sale
     */
    public function getSale()
    {
        return $this->sale;
    }

    /**
     * Set the value of sale
     *
     * @return  self
     */
    public function setSale($sale)
    {
        $this->sale = $sale;

        return $this;
    }

    /**
     * Get the value of listImage
     */
    public function getListImage()
    {
        return $this->listImage;
    }

    /**
     * Set the value of listImage
     *
     * @return  self
     */
    public function setListImage($listImage)
    {
        $this->listImage = $listImage;

        return $this;
    }
}
