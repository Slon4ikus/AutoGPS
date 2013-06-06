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
                        header("Location:" . core_route::$path . "/admin/home");
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

    function home() {
      if (!core_auth::isAdmin()) {
        core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
        header("Location:" . core_route::$path . "/admin/index");
        exit;
      }
     $this->view->generate("admin/template.php", "admin/home.php");
    }


}
