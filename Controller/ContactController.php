<?php
require_once "BaseController.php";

class ContactController extends BaseController{


    public function showView()
    {
        try {
            // require_once dirname(__FILE__) . "/../shared/constant.php";
            // echo $NOT_FOUND_URL;
            $view = new View();
            $view->load('Contact');
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
