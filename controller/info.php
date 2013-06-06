<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/12/13
 * Time: 8:34 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_info extends core_controller
{

    public function index($paramNames = array(), $paramValues = array())
    {
        if (isset($paramValues[0]) and isset($paramValues[1])) {
            $data["brand"] = $paramValues[0];
            $data["mainInfo"] = model_info::findAllText($paramValues[0], 1);
            $data["existingCategories"] = model_info::checkForCategories($paramValues[0]);
            $data['scroll'] = $paramValues[1];

            $this->view->generate("template.php", "info.php", $data);
        }
        else
            core_route::ErrorPage404();
    }

    public function adminAddItem()
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if ($_POST) {
            model_info::addInfoItem($_POST['textInfoContent'], $_POST['textInfoBrand'], $_POST['textInfoCategory'],
                                    $_POST['textInfoType'], $_POST['textInfoOrder'],
                                    $_POST['textInfoEnabled'], $_POST['textInfoClass']);
            header("Location:" . core_route::$path . "/brands/adminList/brandName/" . $_POST['textInfoBrand']);
            exit;
        }
        header("Location:" . core_route::$path . "/brands/adminList/");
    }

    public function adminChangeItem()
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if ($_POST) {
            model_info::changeInfoItem($_POST['textInfoId'], $_POST['textInfoContent'],
                                       $_POST['textInfoType'], $_POST['textInfoOrder'],
                                       $_POST['textInfoEnabled'], $_POST['textInfoClass']);
            header("Location:" . core_route::$path . "/brands/adminList/brandName/" . $_POST['textInfoBrand']);
            exit;
        }
        header("Location:" . core_route::$path . "/brands/adminList/");
    }

    public function adminDeleteItem($paramNames = array(), $paramValues = array())
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if (isset($paramNames[0]) and isset($paramValues[0])) {
            model_info::deleteInfoItem($paramValues[0]);
            if (isset($paramValues[1])) {
                header("Location:" . core_route::$path . "/brands/adminList/brandName/" . $paramValues[1]);
                exit;
            }
        }
        header("Location:" . core_route::$path . "/brands/adminList");


    }
}
