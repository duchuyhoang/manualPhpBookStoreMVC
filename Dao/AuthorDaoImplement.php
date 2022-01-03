<?php
require_once dirname(__FILE__) . "/../Model/Author.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/./DaoInterfaceDesign/AuthorDao.php";

class AuthorDaoImplement extends DBConnector implements AuthorDao
{
    public function __construct()
    {
        DBConnector::connectDB();
        // parent::__construct();
    }

    public function getAllAuthor()
    {
        $query = "SELECT * FROM author WHERE delFlag=0";
        // $stmt=$conn;
        $stmt = parent::$db->query($query);
        $listQueryAuthor = $stmt->fetchAll();
        $listAuthors = array();
        foreach ($listQueryAuthor as $author) {
            array_push($listAuthors, new Author(
                $author["id_author"],
                $author["maxim"],
                $author["name"],
                $author["birthday"],
                $author["delFlag"],
                $author["address"]
            ));
        }
        return $listAuthors;
    }
}