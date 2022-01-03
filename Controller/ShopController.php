<?php

// require "./BaseController.php";
require_once "BaseController.php";
require_once dirname(__FILE__) ."/../Dao/BookDaoImplement.php";
require_once dirname(__FILE__) . "/../Views/View.php";

class ShopController extends BaseController
{

    private $BookDao;
    private $HomeDao;
    private $View;

    public function showView()
    {
        $this->BookDao = new BookDaoImplement();
        $this->View = new View();
        $this->initialActions();
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
                    
                    break;
                }

            default: {
                    $listBooking = $this->BookDao->getAll();

                    $this->View->load('Shop', array(
                        "listBook" => $listBooking,
                    ));
                    break;
                }
        }
        $this->View->show();
    }
    public function handlePost()
    {
        require dirname(__FILE__) . "/../shared" . "/actionsType.php";
        require_once dirname(__FILE__) . "/../shared" . "/functions.php";
        $actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;
        switch ($actionType) {
            case $ACTION_LOGIN: {
                    var_dump($_POST);
                    $email = isset($_POST["email"]) ? $_POST["email"] : "";
                    $password = isset($_POST["password"]) ? $_POST["password"] : "";
                    $result = $this->UserDao->login($email, $password);
                    $_SESSION[$CURRENT_USER_INFO]=$result;
                    var_dump($result);
                    die();
                    break;
                }

                default: {

                }
        }
    }
}