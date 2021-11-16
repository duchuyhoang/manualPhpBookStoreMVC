<?php

require_once "./Controller/HomeController.php";
require_once "./Controller/NotFoundPageController.php";
require_once "./Controller/AuthController.php";
require_once "./Controller/SiteMapController.php";
require_once "./Controller/ProductInfoController.php";
require_once "./Controller/AdminController.php";
require_once "./Controller/ContactController.php";
require_once "./Controller/CartPageController.php";
require_once "./Controller/CheckoutController.php";
require_once "./Controller/ProfileController.php";

require_once "./shared/functions.php";
require_once "./Model/Router.php";
class App
{

    private $routers = array();

    // 
    private $currentController = null;

    private function initRouter()
    {
        include "./shared/constants.php";
        array_push($this->routers, new Router("/", true, new HomeController()));
        array_push($this->routers, new Router("/home", true, new HomeController()));
        array_push($this->routers, new Router($NOT_FOUND_URL, true, new NotFoundPageController()));
        array_push($this->routers, new Router("/auth", true, new AuthController()));
        array_push($this->routers, new Router("/aboutUs", true, new SiteMapController()));
        array_push($this->routers, new Router("/product", true, new ProductInfoController()));
        array_push($this->routers, new Router("/admin", true, new AdminController()));
        array_push($this->routers, new Router("/contact", true, new ContactController()));
        array_push($this->routers, new Router("/myCart", true, new CartPageController()));
        array_push($this->routers, new Router("/checkout", true, new CheckoutController()));
        array_push($this->routers, new Router("/myProfile", true, new ProfileController()));

    }


    function __construct()
    {
        require_once "./shared/constants.php";
        // $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';
        $this->initRouter();
        // session_start();
        try {
            $url = isset($_GET["url"]) ? $_GET["url"] : null;
            $currentController = null;
            foreach ($this->routers as $router) {
                $currentRouter = $router->getController($url);
                if ($currentRouter->isMatched == true) {
                    $currentController = $currentRouter->controller;
                    break;
                }
            }
            if ($currentController != null) {
                // var_dump($currentController);
                $currentController->showView();
            } else {
                // echo "dada"
                header('Location: ' . getProtocol() . $_SERVER['SERVER_NAME'] . "/banSach" . "" . $NOT_FOUND_URL);
            }
        } catch (Exception) {
            // here for db exception
        }

        //        foreach($this->controllers as $controller){
        // if(preg_match($this->controller->getUrl())){

        // }



        //        }
    }
}
