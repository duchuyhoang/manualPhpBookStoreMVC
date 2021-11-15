<?php

require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__) . "/../Model/Ward.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";


class WardDao extends DBConnector{

    public function __construct()
    {
        DBConnector::connectDB();
        // parent::__construct();
    }

public function getAll(){
    $listWard=[];
    $query="SELECT * FROM ward";
    $stmt =parent::$db->query($query);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $list_query_wards=$stmt->fetchAll();
    foreach(
        $list_query_wards as $query_ward
    ){
        $listWard[]=new Ward($query_ward["id"],$query_ward["name"],$query_ward["type"],$query_ward["district_id"]);
    }
    $l=json_encode($listWard,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    return $l;
}


}


?>