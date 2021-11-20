<?php
require_once dirname(__FILE__) . "/./DBConnector.php";

class PDOTransaction extends DBConnector{

    public function __construct()
    {
        // parent::__construct();
        DBConnector::connectDB();
        parent::$db->beginTransaction();
    }

public function rollbackTrasaction(){
    if(parent::$db->inTransaction()){
        parent::$db->rollBack();
    }
}


public function commitTrasaction(){
    if(parent::$db->inTransaction()){
        parent::$db->commit();
    }
}


}
