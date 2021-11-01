<?php

require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__)."/../Model/Book.php";
require_once dirname(__FILE__)."/BaseDao.php";

class HomeDao extends BaseDao{
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

public function goi(){
    echo  "ok";
}

}

?>