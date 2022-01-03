<?php

// require_once dirname(__FILE__)."/../db.php";
require_once dirname(__FILE__) . "/../Model/Ward.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/./DaoInterfaceDesign/WardDao.php";


class WardDaoImplement extends DBConnector implements WardDao{

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


public function getById($id)
{
    $query = "SELECT * FROM ward WHERE id=? LIMIT 1";
    $stmt = parent::$db->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $queryWard = $stmt->fetch();
    $selectedWard = null;
    if ($queryWard) {
        $selectedWard = new Ward($queryWard["id"], $queryWard["name"], $queryWard["type"],$queryWard["district_id"]);
    }

    return $selectedWard;
}


}


?>