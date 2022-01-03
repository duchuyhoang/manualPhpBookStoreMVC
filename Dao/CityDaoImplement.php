<?php
// require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__) . "/../Model/City.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/./DaoInterfaceDesign/CityDao.php";


class CityDaoImplement extends DBConnector implements CityDao
{
    public function __construct()
    {
        DBConnector::connectDB();
    }

    public function getAllCity()
    {
        $listCity = [];
        $query = "SELECT * FROM province";
        $stmt = parent::$db->query($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $list_query_cities = $stmt->fetchAll();
        foreach ($list_query_cities as $query_city) {
            $listCity[] = new City($query_city["id"], $query_city["name"], $query_city["type"]);
        }
        $l = json_encode($listCity, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        return [
            "listCityJson" => $l,
            "listCity" => $listCity,
        ];
    }

    public function getById($id)
    {

        $query = 'SELECT * FROM province WHERE id=? LIMIT 1';
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $id,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $queryCity = $stmt->fetch();
        $selectedCity = null;
        if ($queryCity) {
            $selectedCity = new City($queryCity["id"], $queryCity["name"], $queryCity["type"]);
        }

        return $selectedCity;
    }
}
