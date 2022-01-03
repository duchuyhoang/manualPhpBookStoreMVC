<?php
interface BookDao {
    public function getAll();
    public function getById(int $id);
    public function getProductByPagination(int $limit, int $offset);
    public function insertProduct(Book $book);
    public function insertBookImages($id_book, $listBookImage);
    public function getProductByKeyword($keyword);
    public function getLatestBook();
    public function getBookByListId($listBookId);
    public function editProduct(Book $book);
}