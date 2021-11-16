<?php
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../Dao/BookDao.php";
require_once dirname(__FILE__) . "/../Model/BookItem.php";
require_once dirname(__FILE__) . "/../Model/BookItem.php";

error_reporting(E_ALL ^ E_NOTICE); 

$action=isset($_POST["submit"]) ? $_POST["submit"] : null;


switch ($action){


case $CART_ADD_PRODUCT:
    $bookDao=new BookDao();
$quantity=intval($_POST["quantity"])>0 ?intval($_POST["quantity"]) : 1;
$id_product=$_POST["id_product"];

$selectedBook=$bookDao->getById($id_product);

// $currentCart=isset($_SESSION["cart"]) ? $_SESSION["cart"] :(
// isset($_SESSION($CURRENT_USER_INFO)) ? new Cart()
// )




break;




}



?>