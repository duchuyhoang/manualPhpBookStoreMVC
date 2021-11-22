<?php
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Dao/ManufactureDao.php";
require_once dirname(__FILE__) . "/../Dao/CategoryDao.php";
require_once dirname(__FILE__) . "/../Dao/AuthorDao.php";


class AdminController extends BaseController
{
    private $view;
    // private $AdminDao;
    private AuthorDao $authorDao;
    private ManufactureDao $manufactureDao;
    private CategoryDao $categoryDao;
    private BookDao $bookDao;
    private OrderDao $orderDao;

    public function showView()
    {
        try {
            // require_once dirname(__FILE__) . "/../shared/constant.php";
            $this->view = new View();
            $this->authorDao = new AuthorDao();
            $this->manufactureDao = new ManufactureDao();
            $this->categoryDao = new CategoryDao();
            $this->bookDao = new BookDao();
            $this->orderDao = new OrderDao();

            // $this->BookDao = new BookDao();
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
    
    protected function handleGet()
    {
        require dirname(__FILE__) . "/../shared/constants.php";


        $tab = isset($_GET["tab"]) ? $_GET["tab"] : "";
        $listData = array();
        switch ($tab) {

            case $ADD_PRODUCT: {
                    $listAuthor = $this->authorDao->getAllAuthor();
                    $listManufacture = $this->manufactureDao->getAllManufacture();
                    $listCategory = $this->categoryDao->getAllCategory();
                    $listData['ListAuthor'] = $listAuthor;
                    $listData['ListManufacture'] = $listManufacture;
                    $listData['ListCategory'] = $listCategory;
                    break;
                }

            case $LIST_ODER: {
                    $listOrder = $this->orderDao->getAllOrderLabel();
                    
                    $listData['listOrder'] = $listOrder;

                    break;
                }

            case $STATISTICAL: {
                    break;
                }
            default: {
                    $listAuthor = $this->authorDao->getAllAuthor();
                    $listManufacture = $this->manufactureDao->getAllManufacture();
                    $listCategory=$this->categoryDao->getAllCategory();
                    $listAllBook=$this->bookDao->getAll();
                    $listData['ListAuthor'] = $listAuthor;
                    $listData['ListManufacture'] = $listManufacture;
                    $listData['ListCategory'] = $listCategory;
                    $listData['listAllBook'] = $listAllBook;
                }
        }

        $this->view->load("Admin/Admin", $listData);
        $this->view->show();
    }
    public function handlePost()
    {
        $a = 1;
    }
}