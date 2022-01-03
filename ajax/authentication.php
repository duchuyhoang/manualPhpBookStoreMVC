<?php
require_once dirname(__FILE__) . "/../Controller/AuthController.php";
require_once dirname(__FILE__) . "/../shared/constants.php";
require_once dirname(__FILE__) . "/../shared/actionsType.php";
require_once dirname(__FILE__) . "/../shared/functions.php";
require_once dirname(__FILE__) . "/../Dao/UserDaoImplement.php";
require_once dirname(__FILE__) . "/../Model/Cart.php";

session_start();
// session_destroy();
$actionType = isset($_POST["submit"]) ? $_POST["submit"] : null;
error_reporting(E_ALL ^ E_NOTICE);
switch ($actionType) {
    case $ACTION_LOGIN: {
            try {
                $UserDao = new UserDaoImplement();
                $email = isset($_POST["email"]) ? $_POST["email"] : "";
                $password = isset($_POST["password"]) ? $_POST["password"] : "";
                $result = $UserDao->login($email, $password);
                $_SESSION[$CURRENT_USER_INFO] = $result;
                $break = 1;
                if ($result == null) throw new Exception("Login failed");
                else {
                    if (isset($_SESSION["cart"])) {
                        $currentCart = $_SESSION["cart"];
                        $currentCart->setUser($result);
                    }
                    echo json_encode($result);
                }

                break;
            } catch (Exception $e) {
                $error = new stdClass();
                $error->message = "Wrong email or password";
                $error->status = "401";
                http_response_code(401);
                echo json_encode($error);
                break;
            }
        }

    case $SIGN_OUT: {
            $_SESSION[$CURRENT_USER_INFO] = NULL;
            $_SESSION["cart"] = NULL;
            $response = new stdClass();
            $response->message = "Sign out success";
            echo json_encode($response);
        }

    case $ACTION_SIGN_UP: {
            $email = isset($_POST["email"]) ? $_POST["email"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            $avatar = isset($_FILES["avatar"]["name"]) ? [$_FILES["avatar"]["name"]] : [];
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            // $province = isset($_POST["province"]) ? $_POST["province"] : "";
            // $district = isset($_POST["district"]) ? $_POST["district"] : "";
            // $ward = isset($_POST["ward"]) ? $_POST["ward"] : "";
            $birthday = isset($_POST["birthday"]) ? new DateTime($_POST["birthday"]) : null;
            $phone = isset($_POST["phone"]) ? $_POST["phone"] : "";

            // $length = count($_FILES["avatar"]);
            $a = count($avatar);


            try {
                $_avatar = count($avatar) > 0  ? uploadFile($avatar, [$_FILES["avatar"]["tmp_name"]], [$_FILES["avatar"]["error"]])[0] : null;
                $userDao = new UserDaoImplement();
                $newUserId = $userDao->signUp(
                    User::newSignupUser(
                        $name,
                        $birthday,
                        $_avatar,
                        $DEL_FLAG_VALID,
                        $email,
                        $phone,
                        $PERMISSION_USER
                    ),
                    $password
                );

                $result = new stdClass();
                $result->message = "Success";
                echo json_encode($result);
            } catch (Exception $e) {
                http_response_code(400);
                $result = new stdClass();
                $result->message = "Something wrong";
                die(json_encode($result));

                break;
            }
        }


    default: {
        }
}
