<?php

// require "./BaseController.php";
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Views/View.php";

class SiteMapController extends BaseController
{
    public function showView()
    {
        try {
            // require_once dirname(__FILE__) . "/../shared/constant.php";
            // echo $NOT_FOUND_URL;
            $view = new View();
            $view->load('SiteMap');
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
