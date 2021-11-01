<?php

require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__)."/../Model/User.php";
require_once dirname(__FILE__)."/BaseDao.php";

class HomeDao extends BaseDao{
private $listBook;

public function __construct(){
parent::__construct();
$this->listBook =array();
}

public function getAll(){
$query="SELECT * FROM book";
// $stmt=$conn;
$stmt =$this->db->query($query);
$list_books=$stmt->fetchAll();
foreach(
    $list_books as $book
){
    echo "1";
}
$this->listBook=array(1,2,3,45);
return $this->listBook; 

}

public function goi(){
    echo  "ok";
}

}

?>