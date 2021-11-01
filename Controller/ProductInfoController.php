<?php
require_once "BaseController.php";
// require_once dirname(__FILE__) . "/../Views/ProductInfo.php";
require_once dirname(__FILE__) . "/../Dao/BookDao.php";

class ProductInfoController extends BaseController
{
    private $view;
    private $BookDao;


    public function showView()
    {
        try {
            // require_once dirname(__FILE__) . "/../shared/constant.php";
            $this->view = new View();
            $this->BookDao = new BookDao();
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
$a=$_SERVER['REQUEST_METHOD'];
        $b=1;
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->handlePost();
        } else if ($_SERVER['REQUEST_METHOD'] === "GET") {
            $this->handleGet();
            $a=1;
        }
    }


    protected function handleGet()
    {
        $id_product = isset($_GET["id_product"]) ? $_GET["id_product"] : null;
        $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === 0 ? 'https://' : 'http://';

        if ($id_product) {
            $bookInfo = $this->BookDao->getById($id_product);

            $this->view->load("ProductInfo",);
        } else {
            header('Location: ' . $protocol . $_SERVER['SERVER_NAME'] . "/banSach" . "" . "/home");
        }
    }
    public function handlePost()
    {
    }
}
