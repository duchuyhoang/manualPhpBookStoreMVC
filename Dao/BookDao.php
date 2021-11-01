<?php

require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__)."/../Model/Book.php";
require_once dirname(__FILE__)."/BaseDao.php";

class BookDao extends BaseDao{
private $listBook;

public function __construct(){
parent::__construct();
$this->listBook =array();
}

public function getAll(){
$query="SELECT * FROM category";
// $stmt=$conn;
$stmt =$this->db->query($query);
$list_books=$stmt->fetchAll();
$list=array();
foreach(
    $list_books as $book
){
    array_push($list,$book);
}
$this->listBook=$list;
return $list; 

}

public function getById(int $id){
    $query="SELECT book.*,category.cat_name as categoryName,category.delFlag as categoryDelFlag,
    manufacture.name as manufactureName,manufacture.delFlag as manufactureDelFlag,
    author.name as authorName,author.delFlag as authorDelFlag,author.maxim as authorMaxim,
author.birthday as authorBirthday,author.address as authorAddress
    FROM book INNER JOIN category ON category.id_category=book.id_book_category 
    INNER JOIN manufacture ON manufacture.id_manufacture=book.id_book_manufacture
    INNER JOIN author ON author.id_author=book.id_author WHERE id_book = ? AND book.status=1";
    $stmt =$this->db->prepare($query);
    $stmt->bindParam(1,$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $selectedBook=NULL;
$book=$stmt->fetchAll();
if($book){
$selectedBook=
new Book($book[0]["id_book"],$book[0]["name"],$book[0]["quantity"],$book[0]["status"],$book[0]["description"],
$book[0]["id_book_category"],$book[0]["categoryName"],$book[0]["categoryDelFlag"],$book[0]["id_book_manufacture"],
$book[0]["manufactureName"],$book[0]["manufactureDelFlag"],$book[0]["id_author"],
$book[0]["authorName"],$book[0]["authorMaxim"],$book[0]["authorAddress"],$book[0]["authorDelFlag"],$book[0]["authorBirthday"]
);

}

return $selectedBook;

}


public function getProductByPagination(int $limit,int $offset){

}

}
