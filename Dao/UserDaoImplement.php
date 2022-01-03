<?php
// require_once dirname(__FILE__) . "/../db.php";
require_once dirname(__FILE__) . "/../Model/User.php";
require_once dirname(__FILE__) . "/../Model/Address.php";
require_once dirname(__FILE__) . "/../DBConnector.php";
require_once dirname(__FILE__) . "/./DaoInterfaceDesign/UserDao.php";

require_once dirname(__FILE__) . "/BaseDao.php";



class UserDaoImplement extends DBConnector implements UserDao
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
                    FROM thuvien.user LEFT JOIN province ON user.id_province=province.id 
                    LEFT JOIN district ON user.id_district=district.id 
                    LEFT JOIN ward ON user.id_ward=ward.id WHERE email=? AND password=? AND delFlag={$DEL_FLAG_VALID} LIMIT 1";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        // date("Y-m-d h:i:s")
        if (count($result) === 0) {
            $this->currentUser = null;
        } else {
            $record = $result[0];

            $this->currentUser = User::newNormalUser(
                $record["id_user"],
                $record["name"],
                date_create($record["birthday"]),
                $record["self_describe"],
                $record["avatar"],
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

    public function signUp(User $user, String $password)
    {



        require dirname(__FILE__) . "/../shared/constants.php";
        $query = "INSERT INTO user(name,phone,email,delFlag,password,avatar,birthday,permission) 
        VALUES(?,?,?,?,?,?,?,?)";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $user->getName());
        $stmt->bindParam(2, $user->getPhone());
        $stmt->bindParam(3, $user->getEmail());
        $stmt->bindParam(4, $user->getDelFlag());
        $stmt->bindParam(5, $password);
        $stmt->bindParam(6, $user->getAvatar());
        $stmt->bindParam(7, $user->getBirthday()->format('Y-m-d H:i:s'));
        $stmt->bindParam(8, $user->getPermission());
        $stmt->execute();
        return parent::$db->lastInsertId();
    }


    public function editUser(User $user)
    {
        $query = "UPDATE user SET name=?,phone=?,delFlag=?,avatar=?,birthday=?, permission=?,self_describe=?
    WHERE id_user=?;";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $user->getName());
        $stmt->bindParam(2, $user->getPhone());
        $stmt->bindParam(3, $user->getDelFlag());
        $stmt->bindParam(4, $user->getAvatar());
        $stmt->bindParam(5, $user->getBirthday()->format('Y-m-d H:i:s'));
        $stmt->bindParam(6, $user->getPermission());
        $stmt->bindParam(7, $user->getSelf_describe());
        $stmt->bindParam(8, $user->getId());
        $stmt->execute();
    }


    public function getById($id)
    {
        require dirname(__FILE__) . "/../shared/constants.php";
        $query = "SELECT user.*,province.name as provinceName,district.name as districtName,ward.name as wardName 
                FROM thuvien.user LEFT JOIN province ON user.id_province=province.id 
                LEFT JOIN district ON user.id_district=district.id 
                LEFT JOIN ward ON user.id_ward=ward.id WHERE id_user=? AND delFlag={$DEL_FLAG_VALID} LIMIT 1";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        // date("Y-m-d h:i:s")
        if (count($result) === 0) {
            $this->currentUser = null;
        } else {
            $record = $result[0];

            $this->currentUser = User::newNormalUser(
                $record["id_user"],
                $record["name"],
                date_create($record["birthday"]),
                $record["self_describe"],
                $record["avatar"],
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


    public function updateUserAddress(User $user, Address $address)
    {
        $query = "UPDATE user SET id_province=?,id_ward=?,id_district=? WHERE id_user=?";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $address->getId_province());
        $stmt->bindParam(2, $address->getId_ward());
        $stmt->bindParam(3, $address->getId_district());
        $stmt->bindParam(4, $user->getId());

        $stmt->execute();
    }

    public function updateUserPassword(User $user, $password, $oldPassword)
    {
        $query = "UPDATE user SET password=? WHERE id_user=? AND password=$oldPassword";
        $stmt = parent::$db->prepare($query);
        $stmt->bindParam(1, $password);
        $stmt->bindParam(2, $user->getId());
        $stmt->execute();

        return $stmt->rowCount();
    }
}
