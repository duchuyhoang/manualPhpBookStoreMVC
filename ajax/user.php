<?php
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../shared/functions.php";

require_once dirname(__FILE__) . "/../Dao/UserDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/CityDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/DistrictDaoImplement.php";
require_once dirname(__FILE__) . "/../Dao/WardDaoImplement.php";



require_once dirname(__FILE__) . "/../Model/User.php";
$actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;

session_start();
switch ($actionType) {

    case $EDIT_USER:
        try {
            $userDao = new UserDaoImplement();
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
            $delFlag = isset($_POST["delFlag"]) ? $_POST["delFlag"] : 0;
            $self_describe = isset($_POST["self_describe"]) ? $_POST["self_describe"] : "";

            $avatar = isset($_POST["avatar"]) ? $_POST["avatar"] : "";


            if (isset($_FILES["newAvatar"])) {
                $avatar = uploadFile([$_FILES["newAvatar"]["name"]], [$_FILES["newAvatar"]["tmp_name"]], [$_FILES["newAvatar"]["error"]])[0];
            }

            $birthday = isset($_POST["birthday"]) ? $_POST["birthday"] : "now";
            $birthday = new DateTime($birthday, new DateTimeZone("Asia/Bangkok"));
            // $birthday = $birthday->format('Y-m-d H:i:s');

            $id_user =  isset($_POST["id_user"]) ? $_POST["id_user"] : "";
            $previousData = $userDao->getById($id_user);
            $permission = isset($_POST["permission"]) ? $_POST["permission"] : $previousData->getPermission();
            $editedUser = User::newEditUser($name, $phone, $delFlag, $avatar, $birthday, $permission, $self_describe, $id_user);


            $userDao->editUser($editedUser);

            $_SESSION[$CURRENT_USER_INFO] = $userDao->getById($id_user);

            $response = new stdClass();
            $response->message = "Ok";
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        } catch (Exception $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        }


    case $EDIT_USER_ADDRESS:
        try {

            $selectedCityId = isset($_POST["newCity"]) ? $_POST["newCity"] : "";
            $selectedDistrictId = isset($_POST["newDistrict"]) ? $_POST["newDistrict"] : "";
            $selectedWardId = isset($_POST["newWard"]) ? $_POST["newWard"] : "";



            $cityDao = new CityDaoImplement();
            $districtDao = new DistrictDaoImplement();
            $wardDao = new WardDaoImplement();
            $userDao = new UserDaoImplement();



            $selectedCity = $cityDao->getById($selectedCityId);
            $selectedDistrict = $districtDao->getById($selectedDistrictId);
            $selectedWard = $wardDao->getById($selectedWardId);

            $userDao->updateUserAddress($_SESSION[$CURRENT_USER_INFO], new
                Address(
                    $selectedCity->getId_city(),
                    $selectedCity->getCity_name(),
                    $selectedDistrict->getId_district(),
                    $selectedDistrict->getDistrict_name(),
                    $selectedWard->getId_ward(),
                    $selectedWard->getWard_name(),
                    ""
                ));

            $_SESSION[$CURRENT_USER_INFO] = $userDao->getById($_SESSION[$CURRENT_USER_INFO]->getId());
            $response = new stdClass();
            $response->message = "Ok";
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        } catch (Exception $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        }

    case $EDIT_USER_PASSWORD:
        try {

            $newPassword = isset($_POST["newPassword"]) ? $_POST["newPassword"] : "";
            $currentPassword = isset($_POST["currentPassword"]) ? $_POST["currentPassword "] : "";

            $currentUser = $_SESSION[$CURRENT_USER_INFO];
            $userDao = new UserDaoImplement();
            $result = $userDao->updateUserPassword($_SESSION[$CURRENT_USER_INFO], $newPassword, $currentPassword);
            if ($result == 0)
                throw new  Exception("Password not correct", 1000);




            $response = new stdClass();
            $response->message = "Ok";
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        } catch (Exception $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        }
}
