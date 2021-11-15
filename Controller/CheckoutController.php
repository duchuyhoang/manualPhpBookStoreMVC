<?php
require_once "BaseController.php";
require_once dirname(__FILE__) . "/../Dao/CityDao.php";
require_once dirname(__FILE__) . "/../Dao/DistrictDao.php";
require_once dirname(__FILE__) . "/../Dao/WardDao.php";

class CheckoutController extends BaseController
{
    private CityDao $cityDao;
    private DistrictDao $districtDao;
    private WardDao $wardDao;

    public function showView()
    {
        try {
            $this->view = new View();
            $this->cityDao = new CityDao();
            $this->districtDao = new DistrictDao();
            $this->wardDao = new WardDao();

            $listCityReturn = $this->cityDao->getAllCity();
            $listDistrict = $this->districtDao->getAll();
            $listWard = $this->wardDao->getAll();

            $this->view->load('Checkout', array(
                "listCity" => $listCityReturn["listCity"],
                "listCityJson" => $listCityReturn["listCityJson"],
                "listDistrict" => $listDistrict,
                "listWard" => $listWard
            ));
            $this->view->show();
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
