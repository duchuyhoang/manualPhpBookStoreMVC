<?php
// require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__) . "/../Model/District.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/../DBConnector.php";


class DistrictDao extends DBConnector{

    public function __construct(){
        DBConnector::connectDB();           
    }


public function getAll(){
    $listDistrict=[];
$query="SELECT * FROM district";
$stmt =parent::$db->query($query);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$list_query_districts=$stmt->fetchAll();
foreach(
    $list_query_districts as $query_district
){
    $listDistrict[]=new District($query_district["id"],$query_district["name"],$query_district["type"],$query_district["province_id"]);

}
$l=json_encode($listDistrict,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
return $l;
}



}
