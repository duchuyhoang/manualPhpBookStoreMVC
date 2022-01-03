<?php

// require "./BaseController.php";
require_once "BaseController.php";
require_once dirname(__FILE__) ."/../Dao/UserDaoImplement.php";;

class AuthController extends BaseController
{

    private $UserDao;

    public function showView()
    {
        $this->UserDao = new UserDaoImplement();
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
