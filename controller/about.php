<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/6/13
 * Time: 5:56 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_about extends core_controller
{

    function index()
    {
        $data['info'] = model_info::selectAboutInfo(1);
        $this->view->generate("template.php", "about.php", $data);
    }

    function adminShow()
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
       
        $data['enabled'] = model_info::selectAboutInfo(1);
        $data['disabled'] = model_info::selectAboutInfo(0);
        $data['infoTypes'] = model_info::selectAllInfoTypes();       
        $this->view->generate("admin/template.php", "admin/about.php", $data);
    }

    function adminAddItem() {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if ($_POST) {
            model_info::adminAddAboutInfo($_POST['newAboutInfoContent'], $_POST['newAboutInfoType'],
            $_POST['newAboutInfoOrder'], $_POST['newAboutInfoEnabled'], $_POST['newAboutInfoClass']);
        }
        header("Location:" . core_route::$path . "/about/adminShow");
    }

    function adminChangeItem() {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if ($_POST) {
           model_info::adminChangeAboutInfo($_POST['newAboutInfoId'], $_POST['newAboutInfoContent'], $_POST['newAboutInfoType'],
           $_POST['newAboutInfoOrder'], $_POST['newAboutInfoEnabled'], $_POST['newAboutInfoClass']);
        }
        header("Location:" . core_route::$path . "/about/adminShow");
    }

    function adminDeleteItem($paramNames = array(), $paramValues = array() ){
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if(isset($paramNames[0]) and isset($paramValues[0]) ) {
            model_info::adminDeleteAboutInfo($paramValues[0]);
        }
        header("Location:" . core_route::$path . "/about/adminShow");


    }


}
