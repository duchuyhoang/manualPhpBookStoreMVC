<?php

require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__)."/../Model/Book.php";
require_once dirname(__FILE__)."/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";

class HomeDao extends DBConnector{
private $listBook;

public function __construct(){
// parent::__construct();
DBConnector::connectDB();

$this->listBook =array();
}

public function getAll(){
$query="SELECT * FROM category";
// $stmt=$conn;
$stmt =parent::$db->query($query);
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