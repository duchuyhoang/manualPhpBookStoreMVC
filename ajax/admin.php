<?php
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../Model/Book.php";
require_once dirname(__FILE__) . "/../Model/BookImage.php";
require_once dirname(__FILE__) . "/../Model/BookCategory.php";


require_once dirname(__FILE__) . "/../Dao/BookDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/OrderDaoImplement.php";

require_once dirname(__FILE__) . "/../Dao/BookCategoryDaoImplement.php";

require_once dirname(__FILE__) . "/../shared/functions.php";
$actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;
error_reporting(E_ALL ^ E_NOTICE);


switch ($actionType) {

    case $ADD_NEW_PRODUCT:
        try {
            $newBook = new Book(
                "",
                $_POST["bookName"],
                $_POST["bookPrice"],
                $_POST["bookQuantity"],
                1,
                $_POST["bookDescription"],
                implode("////", explode(",", $_POST["bookCategory"])),
                "",
                "",
                $_POST["bookManufacture"],
                "",
                0,
                $_POST["bookAuthor"],
                "",
                "",
                "",
                0,
                date("Y-m-d"),
                "",
                "",
                "",
                "",
                date("Y-m-d h:i:s"),
                0
            );
            $bookDao = new BookDaoImplement();
            $bookCategoryDao = new BookCategoryDaoImplement();

            $newBookId = $bookDao->insertProduct($newBook);
            $newBook->setId_book($newBookId);

            if (count(explode(",", $_POST["bookCategory"])) > 0 && $_POST["bookCategory"]) {
                $listCategoryId = explode(",", $_POST["bookCategory"]);
                $listBookCategory = array();
                for ($i = 0; $i < count($listCategoryId); $i++) {
                    $listBookCategory[] = new BookCategory("", $listCategoryId[$i], $newBookId, 0);
                }
                $bookCategoryDao->insertBookCategory($newBookId, $listBookCategory);
            }


            // $bookCategoryDao->insertBookCategory($newBook->getId_book())


            if (count($_FILES) > 0) {
                $list = uploadFile($_FILES["bookImage"]["name"], $_FILES["bookImage"]["tmp_name"], $_FILES["bookImage"]["error"]);
                $listBookImage = array();
                for ($i = 0; $i < count($list); $i++)
                    $listBookImage[] = new BookImage("", $list[$i], $newBook->getId_book(), 0);
                $bookDao->insertBookImages($newBook->getId_book(), $listBookImage);
            }
            $response = new stdClass();
            $response->message = "Ok";
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            // header('HTTP/1.1 400 Bad Request');
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        }

        break;

    case $GET_PRODUCT:
        try {
            $params_book = (int)$_POST['idBook'];
            $currentBook = new BookDaoImplement();
            $currentBook = $currentBook->getById((int)$_POST['idBook']);
            $response = new stdClass();
            $response->message = "OK";
            $response->data = $currentBook;
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            die(json_encode($response));
        }
        break;

    case $EDIT_PRODUCT:
        try {

            $newBook = new Book(
                $_POST["idBook"],
                $_POST["newBookName"],
                $_POST["newBookPrice"],
                $_POST["newBookQuantity"],
                1,
                $_POST["newBookDescription"],
                "",
                "",
                "",
                $_POST["newBookManufacture"],
                "",
                0,
                $_POST["newBookAuthor"],
                "",
                "",
                "",
                0,
                date("Y-m-d"),
                "",
                "",
                "",
                date("Y-m-d h:i:s"),
                0
            );
            $bookDao = new BookDaoImplement();
            $bookCategoryDao = new BookCategoryDaoImplement();
            $selectedBook = $bookDao->getById($_POST["idBook"]);

            $bookCategoryDao->editBookCategory($selectedBook, $_POST["newBookCategory"] ? explode(",", $_POST["newBookCategory"]) : []);

            $bookDao->editProduct($newBook);
            // $list = [];
            $_listBookImage = array();
            $listImageId = $_POST["productImageListId"] ? explode(",", $_POST["productImageListId"]) : [];
            $listOldBookImage = $selectedBook->getListImage();

            $listOldImageId = array_intersect($listImageId, array_map(function ($bookImage) {
                return $bookImage->getId_image();
            }, $listOldBookImage));


            for ($i = 0; $i < count($listOldImageId); $i++) {
                $selectedBookImage = null;
                for ($j = 0; $j < count($listOldBookImage); $j++) {
                    if ($listOldImageId[$i] == $listOldBookImage[$j]->getId_image()) {
                        $selectedBookImage = $listOldBookImage[$j];
                        break;
                    }
                }
                if ($selectedBookImage) {
                    $_listBookImage[] = $selectedBookImage;
                }
            }


            if (count($_FILES) > 0 && $_FILES["newImageList"]) {
                $list = uploadFile($_FILES["newImageList"]["name"], $_FILES["newImageList"]["tmp_name"], $_FILES["newImageList"]["error"]);
                for ($i = 0; $i < count($list); $i++)
                    $_listBookImage[] = new BookImage("", $list[$i], $selectedBook->getId_book(), 0);
                // $bookDao->insertBookImages($newBook->getId_book(), $listBookImage);
            }

            $bookDao->deleteBookImages($selectedBook->getId_book());
            $bookDao->insertBookImages($selectedBook->getId_book(), $_listBookImage);

            // $listOldImage=$selectedBook->


            $response = new stdClass();
            $response->message = "Edit product success";
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            // header('HTTP/1.1 400 Bad Request');
            $response = new stdClass();
            $response->message = "Update product failed";
            $response->status = 400;
            die(json_encode($response));
        } catch (Exception $e) {
        }
        break;

    case $DELETE_PRODUCT:
        try {

            $bookDao = new BookDaoImplement();

            $selectedBook = $bookDao->getById($_POST["idBook"]);

            $bookDao->deleteBook($selectedBook);

            if (!$selectedBook)
                throw new Exception("This book is not exist", 1000);
        } catch (PDOException $e) {
        } catch (Exception $e) {
        }

    case $GET_ORDER:
        try {
            $idOrder = $_POST["id_order"];
            $orderDao = new OrderDaoImplement();
            $selectedOrder = $orderDao->getOrderDetail($_POST["id_order"]);
            if (!$selectedOrder) throw new Exception("Order not exist");

            $response = new stdClass();
            $response->message = "Success";
            $response->data = $selectedOrder;

            echo json_encode($response);
        } catch (PDOException $e) {
        } catch (Exception $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = $e->getMessage();
            die(json_encode($response));
        }






    default: {
            try {
                $response = new stdClass();

                $response->message = 'default';
            } catch (PDOException $e) {
            }
            break;
        }
}
