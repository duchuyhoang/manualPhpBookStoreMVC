<?php

require_once dirname(__FILE__) . "/../db.php";
require_once dirname(__FILE__) . "/../Model/Manufacture.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";


class ManufactureDao extends DBConnector
{
    public function __construct()
    {
        DBConnector::connectDB();           
        // parent::__construct();
    }

    public function getAllManufacture()
    {
        $query = "SELECT * FROM manufacture WHERE delFlag=0";
        // $stmt=$conn;
        $stmt = parent::$db->query($query);
        $listQueryManufacture= $stmt->fetchAll();
        $listManufacture = array();
        foreach ($listQueryManufacture as $manufacture) {
            array_push($listManufacture, new Manufacture($manufacture["id_manufacture"], $manufacture["name"], $manufacture["delFlag"]));
        }
        return $listManufacture;
    }
}
