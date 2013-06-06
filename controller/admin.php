<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/7/13
 * Time: 4:02 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_admin extends core_controller
{

    function index()
    {
        if ($_POST) {
            if (!empty($_POST['username']) and !empty($_POST['password'])) {
                if (core_auth::login($_POST['username'], $_POST['password'])) {
                    if (core_auth::isAdmin()) {
                        header("Location:" . core_route::$path . "/about/adminShow");
                        exit;
                    }
                    else {
                        header("Location:" . core_route::$path . "/about/index");
                        exit;
                    }
                }
                core_addition::setSessionMessage("Вход", "Неверные данные");
            }
            else {
                core_addition::setSessionMessage("Вход", "Не заполнены нужные поля");
            }
        }
        if (core_auth::isAdmin()) {
             header("Location:" . core_route::$path . "/about/adminShow");
             exit;
        }
        $this->view->generate("template.php", "login.php");
    }

    function logout()
    {
        if (isset($_SESSION['user_name'])) {
            core_auth::logout();
        }
        header("Location:" . core_route::$path . "/about/index");
    }

    function registration()
    {
        if ($_POST) {

        }
        $this->view->generate("template.php", "registration.php");
    }
    function account($paramNames, $paramValues) {
        if (!core_auth::isAdmin()) {
             header("Location:" . core_route::$path . "/about/index");
             exit;
        }
        if ($_POST) {
            if(!empty($_POST['oldNick']) && !empty($_POST['oldPassword']))
                if (core_auth::checkAdminAccount($_POST['oldNick'], $_POST['oldPassword']))
                     {
                        echo 'ok';
                        exit;
                    }
            echo 'no';
            exit;
        }
        $this->view->generate("admin/template.php", "admin/account.php");
    }

    function changeAccount() {
        if (!core_auth::isAdmin()) {
             header("Location:" . core_route::$path . "/about/index");
            exit;
        }
        if ($_POST) {
            if(!empty($_POST['newNick']) and !empty($_POST['newPassword'])  and
               !empty($_POST['oldNick']) and !empty($_POST['oldPassword']))
                if(strlen($_POST['newNick']) >= 5 and strlen($_POST['newPassword']) >= 5)
                    if(core_auth::checkAdminAccount($_POST['oldNick'], $_POST['oldPassword']) ) {
                        core_auth::changeAccount($_POST['oldNick'], $_POST['newNick'], $_POST['newPassword']);
                        core_addition::setSessionMessage('Account change', 'success');
                    }
        }
        $this->view->generate("admin/template.php", "admin/account.php");
    }


}
