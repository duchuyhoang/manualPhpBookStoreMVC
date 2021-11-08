<?php

require_once dirname(__FILE__) . "/BaseDao.php";


class BookCategoryDao extends BaseDao{
    public function __construct()
    {
        // parent::__construct();
        BaseDao::connectDB();
        $this->listBook = array();
    }
    public function insertBookCategory($id_book, $listBookCategory)
    {
        $insertData = array();
        for ($i = 0; $i < count($listBookCategory); $i++) {
            $questionMark[] = '(' . placeholders('?', 2) . ')';
            $insertData = array_merge($insertData, array($listBookCategory[$i]->getId_book_category(), $listBookCategory[$i]->getId_book()));
        }
        $query = "INSERT INTO book_category(id_book_category,id_book) VALUES " . implode(',', $questionMark);
        $stmt = parent::$db->prepare($query);
        $stmt->execute($insertData);
    }
}
