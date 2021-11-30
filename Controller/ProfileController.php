<?php
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Dao/CityDao.php";
require_once dirname(__FILE__) . "/../Dao/OrderDao.php";
require_once dirname(__FILE__) . "/../Dao/DistrictDao.php";
require_once dirname(__FILE__) . "/../Dao/WardDao.php";
require_once dirname(__FILE__) . "/../Model/User.php";

class ProfileController extends BaseController
{
    private $cityDao;
    private $districtDao;
    private $wardDao;
    private $orderDao;



    public function showView()
    {
        try {
            $this->view = new View();
            $this->cityDao = new CityDao();
            $this->districtDao = new DistrictDao();
            $this->wardDao = new WardDao();
            $this->orderDao = new OrderDao();
            $this->initialActions();
        } catch (PDOException $e) {
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
        require dirname(__FILE__) . "/../shared/constants.php";
        require_once dirname(__FILE__) . "/../shared/functions.php";
        require_once dirname(__FILE__) . "/../Model/Cart.php";
        require_once dirname(__FILE__) . "/../Model/BookItem.php";

        session_start();

        $protocol = getProtocol();
        $currentUser = isset($_SESSION[$CURRENT_USER_INFO]) ? $_SESSION[$CURRENT_USER_INFO] : NULL;

        if ($currentUser === null || !($currentUser instanceof User)) {
            header('Location: ' . $protocol . $_SERVER['SERVER_NAME'] . "/banSach" . "" . $HOME);
            return;
        }
        $listCityReturn = $this->cityDao->getAllCity();
        $listDistrict = $this->districtDao->getAll();
        $listWard = $this->wardDao->getAll();
        $listOrderLabel = $this->orderDao->getAllOrderLabelByUser($currentUser);



        $this->view->load('Profile', array(
            "listCity" => $listCityReturn["listCity"],
            "listCityJson" => $listCityReturn["listCityJson"],
            "listDistrict" => $listDistrict,
            "listWard" => $listWard,
            "currentUser" => $_SESSION[$CURRENT_USER_INFO],
            "listOrderLabel" => $listOrderLabel
        ));
        $this->view->show();
    }



    public function handlePost()
    {
    }
}
