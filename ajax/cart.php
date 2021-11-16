<?php
require_once dirname(__FILE__) . "/../Model/Cart.php";
require_once dirname(__FILE__) . "/../Model/BookItem.php";
require_once dirname(__FILE__) . "/../Model/Book.php";
session_start();
// $_SESSION["cart"]=null;
// die();

require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../shared/functions.php";

require_once dirname(__FILE__) . "/../Dao/BookDao.php";

error_reporting(E_ALL ^ E_NOTICE);

$action = isset($_POST["submit"]) ? $_POST["submit"] : null;


switch ($action) {

    case $CART_ADD_PRODUCT:
        $bookDao = new BookDao();
        $quantity = intval($_POST["quantity"]) > 0 ? intval($_POST["quantity"]) : 1;
        $price = isset($_POST["price"]) || null;
        $id_product = $_POST["id_product"];

        try {
            $selectedBook = $bookDao->getById($id_product);

            $currentCart = isset($_SESSION["cart"]) ? $_SESSION["cart"] : (isset($_SESSION[$CURRENT_USER_INFO]) ?
                new Cart(generateRandomString(30),[], new DateTime(), $_SESSION[$CURRENT_USER_INFO]) :
                new Cart(generateRandomString(30),[], new DateTime(), null));

            if (!$selectedBook)
                throw new Exception("Book not exist", 1000);

            if ($selectedBook->getQuantity() < $quantity) throw new Exception("Product has been sold out", 1001);

            $currentCart->addProduct(new BookItem($selectedBook, $quantity, $selectedBook->getQuantity(), $price));

            $_SESSION["cart"] = $currentCart;

            $result = new stdClass();
            $result->message = "Success";
            echo json_encode($result);
        } catch (Exception $e) {
            $a = 1;

            // if($e->code===1000)
        }



        break;
}

// php>
