<?php
require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__) . "/../Model/City.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";


class CityDao extends DBConnector{
    public function __construct(){
        DBConnector::connectDB();           
    }

public function getAllCity(){
$listCity=[];
$query="SELECT * FROM province";
$stmt =parent::$db->query($query);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$list_query_cities=$stmt->fetchAll();
foreach(
    $list_query_cities as $query_city
){
    $listCity[]=new City($query_city["id"],$query_city["name"],$query_city["type"]);
}
$l=json_encode($listCity,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
return [
    "listCityJson"=>$l,
    "listCity"=>$listCity,
];
}



}
