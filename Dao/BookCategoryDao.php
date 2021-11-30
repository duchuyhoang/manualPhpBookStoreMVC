<?php

require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/../Implement/BookCategoryImplement.php";
require_once dirname(__FILE__) . "/../Model/BookCategory.php";


class BookCategoryDao extends DBConnector implements BookCategoryImplement
{
    public function __construct()
    {
        // parent::__construct();
        DBConnector::connectDB();
        $this->listBook = array();
    }
    public function insertBookCategory($id_book, $listBookCategory)
    {
        $insertData = array();
        if (count($listBookCategory) === 0)
            return;
        for ($i = 0; $i < count($listBookCategory); $i++) {
            $questionMark[] = '(' . placeholders('?', 2) . ')';
            $insertData = array_merge($insertData, array($listBookCategory[$i]->getId_book_category(), $listBookCategory[$i]->getId_book()));
        }





        $query = "INSERT INTO book_category(id_book_category,id_book) VALUES " . implode(',', $questionMark);

        $stmt = parent::$db->prepare($query);
        $stmt->execute($insertData);
    }

    public function deleteCategory($id_book, $listBookCategory)
    {
        $query = "UPDATE book_category SET delFlag=1 WHERE ";
        if (count($listBookCategory) === 0)
            return;

        else {
            for ($i = 0; $i < count($listBookCategory); $i++) {
                if ($i < count($listBookCategory) - 1) {
                    $query .= "id_book={$id_book} AND id_book_category=? OR ";
                } else {
                    $query .= "id_book={$id_book} AND id_book_category=?";
                }
            }
        }

        $stmt = parent::$db->prepare($query);
        $stmt->execute($listBookCategory);
    }

    public function editBookCategory(Book $book, $listBookCategory)
    {

        $oldListCategory = array_map(
            function ($category) {
                return $category->getId_category();
            },

            $book->getCategory()
        );

        // $newListCategory = array_diff($listBookCategory, $oldListCategory);
        $this->deleteCategory($book->getId_book(), $oldListCategory);

        for ($i = 0; $i < count($listBookCategory); $i++) {
            $listNewBookCategory[] = new BookCategory("", $listBookCategory[$i], $book->getId_book(), 0);
        }


        $this->insertBookCategory($book->getId_book(), $listNewBookCategory);
    }
}
