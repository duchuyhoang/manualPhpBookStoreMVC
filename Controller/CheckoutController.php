<?php
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Dao/CityDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/DistrictDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/WardDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/BookDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/OrderTypeDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/PaymentTypeDaoImplement.php";
require_once dirname(__FILE__) . "/../Model/Cart.php";
require_once dirname(__FILE__) . "/../Model/BookItem.php";

class CheckoutController extends BaseController
{
    private CityDao $cityDao;
    private DistrictDao $districtDao;
    private WardDao $wardDao;
    private BookDao $bookDao;
    private OrderTypeDao $orderTypeDao;
    private PaymentTypeDao $paymentTypeDao;

    public function showView()
    {
        require dirname(__FILE__) . "/../shared/" . 'constants.php';
        try {
            session_start();
            $currentCart = isset($_SESSION["cart"]) ? ($_SESSION["cart"] instanceof Cart ? $_SESSION["cart"] : null) : null;
            if (!isset($_SESSION[$CURRENT_USER_INFO])||!$currentCart) {
                header('Location: ' . getProtocol() . $_SERVER['SERVER_NAME'] . "/banSach" . "" . "/home");
                die();
            }

            $this->view = new View();
            $this->cityDao = new CityDaoImplement();
            $this->districtDao = new DistrictDaoImplement();
            $this->wardDao = new WardDaoImplement();
            $this->bookDao = new BookDaoImplement();
            $this->orderTypeDao = new OrderTypeDaoImplement();
            $this->paymentTypeDao = new PaymentTypeDaoImplement();

            $different = [];





            if ($currentCart) {
                $listBook = $this->bookDao->getAll();
                $listSelectedBook = $currentCart->getListBook();

                foreach ($listSelectedBook as $bookItem) {
                    $id = $bookItem->getBook()->getId_book();
                    $selectedBook = array_values(array_filter($listBook, function ($book) use ($id) {
                        return $book->getId_book() == $id;
                    }));

                    if (count($selectedBook) > 0) {
                        if ($selectedBook[0]->getQuantity() < $bookItem->getQuantity()) {
                            $different[] = array(
                                "book" => $selectedBook[0],
                                "bookItem" => $bookItem
                            );
                        }
                    }
                }
            }

            $listCityReturn = $this->cityDao->getAllCity();
            $listDistrict = $this->districtDao->getAll();
            $listWard = $this->wardDao->getAll();
            $listOrderType = $this->orderTypeDao->getAll();
            $listPaymentType = $this->paymentTypeDao->getAll();



            $this->view->load('Checkout', array(
                "listCity" => $listCityReturn["listCity"],
                "listCityJson" => $listCityReturn["listCityJson"],
                "listDistrict" => $listDistrict,
                "listWard" => $listWard,
                "different" => $different,
                "currentCart" => $currentCart,
                "listOrderType" => $listOrderType,
                "listPaymentType" => $listPaymentType
            ));
            $this->view->show();
        } catch (PDOException $e) {
        }
    }

    public function handleGet()
    {
    }
    public function handlePost()
    {
    }
}
