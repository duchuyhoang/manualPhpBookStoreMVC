<?php
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../Dao/UserDao.php";
require_once dirname(__FILE__) . "/../Model/User.php";
$actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;

switch ($actionType) {

    case $EDIT_USER:

        try {
            $userDao = new UserDao();
            $name = $_POST["name"] ? $_POST["name"] : "";
            $phone = $_POST["phone"] ? $_POST["phone"] : "";
            $delFlag = $_POST["delFlag"] ? $_POST["delFlag"] : 0;
            $avatar = $_POST["avatar"] ? $_POST["avatar"] : "";

            $birthday = $_POST["birthday"] ? $_POST["birthday"] : "now";
            $birthday = new DateTime($birthday, new DateTimeZone("Asia/Bangkok"));
            $birthday = $birthday->format('Y-m-d H:i:s');

            $permission = $_POST["permission"] ? $_POST["permission"] : "";
            $id_user =  $_POST["id_user"] ? $_POST["id_user"] : "";

            $editedUser = User::newEditUser($name, $phone, $delFlag, $avatar, $birthday, $permission, $id_user);

            $userDao->editUser($editedUser);
            $response = new stdClass();
            $response->message = "Ok";
            echo json_encode($response);
        } catch (PDOException $e) {
            http_response_code(400);
            $response = new stdClass();
            $response->message = "Error";
            $response->status = 400;
            die(json_encode($response));
        }
}
