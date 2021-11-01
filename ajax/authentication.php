<?php
require_once dirname(__FILE__) . "/../Controller/AuthController.php";
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../Dao/UserDao.php";
session_start();

$actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;
$a = 1;
switch ($actionType) {
    case $ACTION_LOGIN: {
            try {
                $UserDao = new UserDao();
                $email = isset($_POST["email"]) ? $_POST["email"] : "";
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $result = $UserDao->login($email, $password);
                $_SESSION[$CURRENT_USER_INFO] = $result;
                $break=1;
                if ($result == null) throw new Exception("Login failed");
                else
                echo json_encode($result);
                break;
            } catch (Exception $e) {
                $error=new stdClass();
                $error->message = "Wrong email or password";
                $error->status = "401";
                http_response_code(401);
                echo json_encode($error);
                break;
            }
        }

case $SIGN_OUT:{
    $_SESSION[$CURRENT_USER_INFO] = NULL;
    $response=new stdClass();
    $response->message = "Sign out success";
    echo json_encode($response);
}


    default: {
        }
}

