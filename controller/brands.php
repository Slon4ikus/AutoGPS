<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/12/13
 * Time: 4:16 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_brands extends core_controller
{

    function gpsList()
    {
        $data['brands'] = model_brands::getBrands("gps");
        $data['url'] = "gpsInfo";
        $this->view->generate("template.php", "brands.php", $data);
    }

    function russificationList()
    {
        $data['brands'] = model_brands::getBrands("russification");
        $data['url'] = "russificationInfo";
        $this->view->generate("template.php", "brands.php", $data);
    }

    function otherList()
    {
        $data['brands'] = model_brands::getBrands("other");
        $data['url'] = "otherInfo";
        $this->view->generate("template.php", "brands.php", $data);
    }

    function adminList($brandNames, $brandValues)
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        $data['brands'] = model_brands::getAllBrands();

        if (!isset($brandValues[0])) {
            $data['brandInfo'] = model_brands::selectFirstBrand();
            $brand = $data['brandInfo'][0]['name'];
        }
        else {
            $brand = rawurldecode($brandValues[0]);
            $data['brandInfo'] = model_brands::selectBrand($brand);
        }
            $data['categories'] = model_info::selectAllCategories();
            $data['existingCategories'] = model_info::checkForCategories($brand);
            $data['textInfo']['enabled'] = model_info::findAllText($brand, 1);
            $data['textInfo']['disabled'] = model_info::findAllText($brand, 0);
            $data['infoTypes'] = model_info::selectAllInfoTypes();

        $this->view->generate("admin/template.php", "admin/brands.php", $data);
    }

    function adminAddBrand()
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if ($_POST) {
            if (isset($_POST['newBrandInfoName']) and isset($_POST['newBrandInfoPictureUrl']))
                if (!core_addition::alreadyExists($_POST['newBrandInfoName'], 'brands', 'name')) {
                    model_brands::addNewBrand($_POST['newBrandInfoName'], $_POST['newBrandInfoPictureUrl']);
                    header("Location:" . core_route::$path . "/brands/adminList/brandName/".$_POST['newBrandInfoName']);
                    exit;
                }
        }
        header("Location:" . core_route::$path . "/brands/adminList");
    }

    function checkForDuplicate($paramName, $brandName)
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if (isset($paramName[0]) and isset($brandName[0]))
            if (!core_addition::alreadyExists(rawurldecode($brandName[0]), 'brands', 'name'))
                echo "ok";
            else
                echo "no";
    }

    function adminChangeBrand()
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if ($_POST) {
            if ($_POST['newBrandInfoName'] != $_POST['newBrandInfoNameOld']) {
                if (core_addition::alreadyExists($_POST['newBrandInfoName'], 'brands', 'name')) {
                    core_addition::setSessionMessage("Добавить бренд", "Такое название уже существует");
                    header("Location:" . core_route::$path . "/brands/adminList");
                    exit;
                }
            }
            model_brands::changeBrandInfo($_POST['newBrandInfoNameOld'], $_POST['newBrandInfoName'],
                                          $_POST['newBrandInfoPictureUrl']);
            header("Location:" . core_route::$path . "/brands/adminList/brandName/".$_POST['newBrandInfoName']);
            exit;
        }
        header("Location:" . core_route::$path . "/brands/adminList");
    }

    function adminDeleteBrand($paramName, $brandName)
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if (isset($paramName[0]) and isset($brandName[0])) {
            model_brands::deleteBrand(rawurldecode($brandName[0]));
        }
        header("Location:" . core_route::$path . "/brands/adminList");
    }

}
