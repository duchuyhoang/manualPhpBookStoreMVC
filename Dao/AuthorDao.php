<?php
require_once dirname(__FILE__) . "/../Model/Author.php";
require_once dirname(__FILE__) . "/BaseDao.php";
class AuthorDao extends BaseDao
{
    public function __construct()
    {
        BaseDao::connectDB();
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
