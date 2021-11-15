<?php
require_once dirname(__FILE__) . "/../db.php";
require_once dirname(__FILE__) . "/../Model/User.php";
require_once dirname(__FILE__) . "/../Model/Address.php";
require_once dirname(__FILE__) . "/../DBConnector.php";

require_once dirname(__FILE__) . "/BaseDao.php";



class UserDao extends DBConnector
{

    private $currentUser = null;

    public function __construct()
    {
        DBConnector::connectDB();
    }

    public function login($email, $password)
    {
        require dirname(__FILE__) . "/../shared/constants.php";
        $query = "SELECT user.*,province.name as provinceName,district.name as districtName,ward.name as wardName 
FROM thuvien.user INNER JOIN province ON user.id_province=province.id 
INNER JOIN district ON user.id_district=district.id 
INNER JOIN ward ON user.id_ward=ward.id WHERE email=? AND password=? AND delFlag={$DEL_FLAG_VALID} LIMIT 1";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        if (count($result) === 0) {
            $this->currentUser = null;
        } else {
            $record = $result[0];
            $this->currentUser = new User(
                $record["id_user"],
                $record["name"],
                $record["birthday"],
                $record["self_describe"],
                $record["delFlag"],
                $record["email"],
                new Address(
                    $record["id_province"],
                    $record["provinceName"],
                    $record["id_district"],
                    $record["districtName"],
                    $record["id_ward"],
                    $record["wardName"],
                ),
                $record["phone"],
                $record["permission"]
            );
        }

        return $this->currentUser;
    }
}
