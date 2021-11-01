<?php

require_once dirname(__FILE__) . "/../db.php";
require_once dirname(__FILE__) . "/../Model/Category.php";
require_once dirname(__FILE__) . "/BaseDao.php";


class CategoryDao extends BaseDao
{
    public function __construct()
    {
        BaseDao::connectDB();           
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
