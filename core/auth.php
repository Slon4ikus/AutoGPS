<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/7/13
 * Time: 3:34 PM
 * To change this template use File | Settings | File Templates.
 */

class core_auth
{
    static function login($username, $password)
    {
        $query = "SELECT status, password
                  FROM users WHERE username = '$username'";
        $result = core_model::doQuery($query);
        if ($result->num_rows != 0) {
            $userInfo = $result->fetch_array();
            if (crypt($password, $userInfo['password']) == $userInfo['password']) {
                $_SESSION['user_name'] = $username;
                $_SESSION['user_status'] = $userInfo['status'];
                return true;
            }
        }
        return false;
    }

    static function addUser($username, $password, $email)
    {
        $hashedPassword = crypt($password);
        $command = "INSERT INTO users(status, username, password, email) VALUES(1, '$username', '$hashedPassword', '$email')";
        core_model::upDate($command);
    }

    static function logout()
    {
        unset($_SESSION["user_name"]);
        unset($_SESSION["user_status"]);
    }

    static function isAdmin()
    {
        if (isset($_SESSION['user_status']))
            if ($_SESSION['user_status'] == 3)
                return true;
        return false;
    }

    static function checkRegistration()
    {
        if (!empty($_POST['registrationNickname']) and !empty($_POST['registrationPassword']) and
                                                       !empty($_POST['registrationPassword2']) and !empty($_POST['registrationEmail'])
        ) {
            if (strlen($_POST['registrationNickname']) >= 5
                and !preg_match('/[^0-9a-zA-Z]/', $_POST['registrationNickname'])
            ) {
                if (strlen($_POST['registrationPassword']) >= 5 or strlen($_POST['registrationPassword2']) >= 5) {
                    if ($_POST['registrationPassword'] == $_POST['registrationPassword2']) {
                        if (core_addition::isMail($_POST['registrationEmail'])) {
                            if (!core_addition::alreadyExists($_POST['registrationNickname'], "users", "username")) {
                                if (!core_addition::alreadyExists($_POST['registrationEail'], "users", "email")) {
                                    core_auth::addUser($_POST['registrationNickname'], $_POST['registrationPassword'],
                                                       $_POST['registrationEmail']);
                                    core_auth::login($_POST['registrationNickname'], $_POST['registrationPassword']);
                                    header("Location:" . core_route::$path . "/about/index");
                                }
                                else
                                    core_addition::setSessionMessage("Регистрация", "Такой логин уже занят");
                            }
                            else
                                core_addition::setSessionMessage("Регистрация", "Недейсвительный электронный адресс");
                        }
                        else {
                            core_addition::setSessionMessage("Регистрация", "Пароли не совпадают");
                        }
                    }
                    else core_addition::setSessionMessage("Регистрация", "Пароль должен быть не менее 5 символов");
                }
                else {
                    core_addition::setSessionMessage("Регистрация", "Логин должен состоять как минимум из 5 букв
                                                                     и содержать только латинские буквы или цифры");
                }
            }
            else {
                core_addition::setSessionMessage("Регистрация", "Не заполнены нужные поля");
            }
        }
    }

    static function checkAdminAccount($username,$password) {
        $query = "SELECT status, password
                  FROM users WHERE username = '$username'";
        $result = core_model::doQuery($query);
        if ($result->num_rows != 0) {
            $userInfo = $result->fetch_array();
            if (crypt($password, $userInfo['password']) == $userInfo['password'])
                if($userInfo['status']==3)
                    return true;
        }
         return false;
    }
    static function changeAccount($oldName, $newName, $newPassword) {
        $hashedPassword = crypt($newPassword);
        $command = "UPDATE `users` SET
                     `username` = '$newName' ,
                     `password` = '$hashedPassword'
                     WHERE `username`='$oldName'";
        core_model::upDate($command);
    }

}
