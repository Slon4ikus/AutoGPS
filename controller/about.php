<?php
class controller_about extends core_controller
{
    // description: page "О нас" controller
    function index()
    {
        $data['info'] = model_info::selectAboutInfo(1);
        $this->view->generate("template.php", "about.php", $data);
    }
    // description: page "О нас" admin controller
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

    // description: adds 'about' info in data base
    //parameters: POST data
    function adminAddItem()
    {
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
    // description: changes 'about' info in data base
    //parameters: POST data
    function adminChangeItem()
    {
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
    // description: deletes 'about' info in data base
    //parameters: GET data, contains an id of record
    function adminDeleteItem($paramNames = array(), $paramValues = array())
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if (isset($paramNames[0]) and isset($paramValues[0])) {
            model_info::adminDeleteAboutInfo($paramValues[0]);
        }
        header("Location:" . core_route::$path . "/about/adminShow");
    }
}
