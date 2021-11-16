<?php
require_once "BaseController.php";


class CartPageController extends BaseController{

    public function showView()
    {
        try {
            $view = new View();
            $view->load('CartPage');
            $view->show();
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
?>