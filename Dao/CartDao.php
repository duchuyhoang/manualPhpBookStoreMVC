<?php
require_once dirname(__FILE__) . "/../Model/Cart.php";
require_once dirname(__FILE__) . "/../DBConnector.php";


class CartDao extends DBConnector
{

    public function __construct()
    {
        // parent::__construct();
        DBConnector::connectDB();
    }

    public function insertNewCart(Cart $cart)
    {
        require_once dirname(__FILE__) . "/../shared/constants.php";

        try {
            parent::$db->beginTransaction();
            $query = "INSERT INTO cart(id_cart,id_cart_user,status,createAt) VALUES(?,?,{$CART_STATUS_PENDING},now())";
            $stmt = parent::$db->prepare($query);
            $stmt->bindParam(1, $cart->getId_cart());
            $stmt->bindParam(2, $cart->getUser()->getId());
            $stmt->execute();

            $listBook = $cart->getListBook();

            $insertBook = [];

            foreach ($listBook as $bookItem) {
                $questionMark[] = '(' . placeholders('?', 6) . ')';
                $insertBook=array_merge($insertBook,[
                    $cart->getId_cart(),
                    $bookItem->getBook()->getId_book(),
                    $bookItem->getQuantity(),
                    $bookItem->getPrice(),
                    1,
                    date("Y-m-d h:i:s")
                ]);
            }

            $cartItemQuery="INSERT INTO cart_item(id_cart,id_book,quantity,price,status,creatAt) VALUES ".implode(',', $questionMark);
            $stmt = parent::$db->prepare($cartItemQuery);
            $stmt->execute($insertBook);

            return true;
        } catch (Exception $e) {
            parent::$db->rollBack();
            return false;
        } catch (PDOException $e) {
            parent::$db->rollBack();
            return false;
        }
    }
}
