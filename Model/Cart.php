<?php

class Cart
{
    private $listBook;
    private $createAt;
    private $user;

    public function __construct($listBook, $createAt, $user)
    {
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
        $this->listBook = array($this->listBook, $book);
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
}
