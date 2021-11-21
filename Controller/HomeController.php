<?php

// require "./BaseController.php";
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Views/View.php";
require_once dirname(__FILE__) . "/../Dao/HomeDao.php";
require_once dirname(__FILE__) . "/../Dao/BookDao.php";
require_once dirname(__FILE__) . "/../Dao/OrderDao.php";



class HomeController extends BaseController
{

    private $view;
    private $HomeDao;
    private $BookDao;

    public function showView()
    {
        try {
            // require_once dirname(__FILE__) . "/../shared/constant.php";
            $this->view = new View();
            $this->HomeDao = new HomeDao();
            $this->BookDao = new BookDao();

            // $rs = $this->BookDao->getProductByKeyword("đi");



            // $this->view->load('Home',);
            // $this->view->show();

            $this->initialActions();
        } catch (PDOException $e) {
            var_dump($e);
            // var_dump($e->getMessage);
        }
    }
    public function initialActions()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->handlePost();
        } else if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $this->handleGet();
        }
    }

    public function handleGet()
    {
        require_once dirname(__FILE__) . "/../shared" . "/actionsType.php";
        $actionType = isset($_GET["submit"]) ? $_GET["submit"] : null;

        switch ($actionType) {
            case $ACTION_HOME_INITIAL: {
                    $listBooking = $this->HomeDao->getAll();
                    $listLatestBook = $this->BookDao->getLatestBook();
                    $this->view->load('Home', [$listBooking, $listLatestBook]);
                    break;
                }

            default: {
                    $listBooking = $this->HomeDao->getAll();
                    $listLatestBook = $this->BookDao->getLatestBook();
                    $a = [$listBooking, $listLatestBook];

                    $this->view->load('Home', array(
                        "listBook" => $listBooking,
                        "listLatestBook" => $listLatestBook
                    ));
                    break;
                }
        }
        $this->view->show();
    }
    public function handlePost()
    {
        require_once dirname(__FILE__) . "/../shared" . "/actionsType.php";
        require_once dirname(__FILE__) . "/../shared" . "/functions.php";

        $actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;

        switch ($actionType) {
            case $ACTION_HOME_INITIAL: {
                    header('Location: ' . getUrl("/home"));
                    break;
                }

            case $ACTION_LOGIN: {
                    var_dump($_POST);
                    $email = isset($_POST["email"]) ? $_POST["email"] : "";
                    $password = isset($_POST["password"]) ? $_POST["password"] : "";

                    die();
                }


            default: {
                    // $listBooking = $this->HomeDao->getAll();
                    // $this->view->load('Home', [$listBooking]);
                    // header('Location: ' . getUrl("/home"));
                    echo "dada";
                    break;
                }
        }
        $this->view->show();
    }
}
