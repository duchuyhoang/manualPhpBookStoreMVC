<?php

class Cart
{
    private $id_cart;
    private $listBook;
    private $createAt;
    private User|null $user;

    public function __construct($id_cart, $listBook, $createAt, $user)
    {
        $this->id_cart = $id_cart;
        $this->listBook = $listBook;
        $this->createAt = $createAt;
        $this->user = $user;
    }


    /**
     * Get the value of listBook
     */
    public function getListBook()
    {
        return $this->listBook;
    }

    /**
     * Set the value of listBook
     *
     * @return  self
     */
    public function setListBook($listBook)
    {
        $this->listBook = $listBook;

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
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    public function addProduct($book)
    {
        $bookExist = false;
        $selectedExistBook = null;
        $index = -1;

        foreach ($this->listBook as $_index => $_book) {

            if ($_book->getBook()->getId_book() === $book->getBook()->getId_book()) {
                $bookExist = true;
                $selectedExistBook = $_book;
                $index = $_index;
                break;
            }
        }
        if (!$bookExist) {
            $this->listBook = array_merge($this->listBook, [$book]);
            // if()
        } else {
            $a = $selectedExistBook->getMaxQuantity()
                >= $selectedExistBook->getQuantity() + $book->getQuantity();

            if (
                $selectedExistBook->getMaxQuantity()
                >= $selectedExistBook->getQuantity() + $book->getQuantity()
            ) {
                $qq = $selectedExistBook->getBook()->getQuantity() + $book->getBook()->getQuantity();

                $selectedExistBook->setQuantity(intval($selectedExistBook->getQuantity()) + intval($book->getQuantity()));
                $newListBook = $this->listBook;
                $newListBook[$index] = $selectedExistBook;
                $this->listBook = $newListBook;
            }
        }
    }

    public function deleteProduct($idBook)
    {
        $newListBook = $this->listBook;
        $index = -1;
        for ($i = 0; $i < count($newListBook); $i++) {
            if ($newListBook[$i]->getBook()->getId_book() == $idBook) {
                $index = $i;
            }
        }
        if ($index !== -1)
            array_splice($newListBook, $index, 1);
        $this->listBook = $newListBook;
    }

    /**
     * Get the value of id_cart
     */
    public function getId_cart()
    {
        return $this->id_cart;
    }

    /**
     * Set the value of id_cart
     *
     * @return  self
     */
    public function setId_cart($id_cart)
    {
        $this->id_cart = $id_cart;

        return $this;
    }
}
