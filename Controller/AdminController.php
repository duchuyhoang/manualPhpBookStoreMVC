<?php
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Dao/ManufactureDao.php";
require_once dirname(__FILE__) . "/../Dao/CategoryDao.php";
require_once dirname(__FILE__) . "/../Dao/AuthorDao.php";
require_once dirname(__FILE__) . "/../Dao/OrderDao.php";

require_once dirname(__FILE__) . "/../Dao/StatistcalDao.php";

// 
class AdminController extends BaseController
{
    private $view;
    // private $AdminDao;
    private AuthorDao $authorDao;
    private ManufactureDao $manufactureDao;
    private CategoryDao $categoryDao;
    private BookDao $bookDao;
    private OrderDao $orderDao;

    private StatistcalDao $statistcalDao;
    public function showView()
    {
        try {
            session_start();
            require dirname(__FILE__) . "/../shared/constants.php";
            $this->view = new View();
            $this->authorDao = new AuthorDao();
            $this->manufactureDao = new ManufactureDao();
            $this->categoryDao = new CategoryDao();
            $this->bookDao = new BookDao();
            $this->orderDao = new OrderDao();
            $currentUser = isset($_SESSION[$CURRENT_USER_INFO]) ? $_SESSION[$CURRENT_USER_INFO] : null;

            if ($currentUser === null || !($currentUser instanceof User)||$currentUser->getPermission()!=$PERMISSION_ADMIN) {
                header('Location: ' . getProtocol() . $_SERVER['SERVER_NAME'] . "/banSach" . "" . $HOME);
                return;
            }
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

            case $LIST_PRODUCT: {

                    $listAuthor = $this->authorDao->getAllAuthor();
                    $listManufacture = $this->manufactureDao->getAllManufacture();
                    $listCategory = $this->categoryDao->getAllCategory();
                    $listAllBook = $this->bookDao->getAll();
                    $listData['ListAuthor'] = $listAuthor;
                    $listData['ListManufacture'] = $listManufacture;
                    $listData['ListCategory'] = $listCategory;
                    $listData['listAllBook'] = $listAllBook;
                    
                }



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
                    $this->statistcalDao = new StatistcalDao();

                    $listData['StatiscalBookByMonth'] = $this->statistcalDao->statistcalBookByThisMonth();

                    break;
                }
            default: {
                    $listAuthor = $this->authorDao->getAllAuthor();
                    $listManufacture = $this->manufactureDao->getAllManufacture();
                    $listCategory = $this->categoryDao->getAllCategory();
                    $listAllBook = $this->bookDao->getAll();
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
    }
}
