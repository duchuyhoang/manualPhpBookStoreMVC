<?php

// require_once dirname(__FILE__) . "/../db.php";
require_once dirname(__FILE__) . "/../Model/Category.php";
require_once dirname(__FILE__) . "/BaseDao.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/./DaoInterfaceDesign/CategoryDao.php";


class CategoryDaoImplement extends DBConnector implements CategoryDao
{
    public function __construct()
    {
        DBConnector::connectDB();           
        // parent::__construct();
    }

    public function getAllCategory()
    {
        $query = "SELECT * FROM category WHERE delFlag=0";
        // $stmt=$conn;
        $stmt = parent::$db->query($query);
        $listQueryCategory = $stmt->fetchAll();
        $listCategory = array();
        foreach ($listQueryCategory as $category) {
            array_push($listCategory, new Category($category["id_category"], $category["cat_name"], $category["delFlag"]));
        }
        return $listCategory;
    }
}