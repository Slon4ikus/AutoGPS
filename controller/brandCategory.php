<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/24/13
 * Time: 9:13 PM
 * To change this template use File | Settings | File Templates.
 */

class controller_brandCategory extends core_controller
{

    function adminChangeState($paramNames, $paramValues)
    {
        if (!core_auth::isAdmin()) {
            core_addition::setSessionMessage("Страница админа", "У вас нет на это прав");
            header("Location:" . core_route::$path . "/admin/index");
            exit;
        }
        if (isset($paramValues[0]) and isset($paramValues[1])) {
            $brand = rawurldecode($paramValues[0]);
            $category = rawurldecode($paramValues[1]);
            if (model_brandCategory::checkIfExist($brand, $category)) {
                model_brandCategory::deleteRow($brand, $category);
                echo "disabled";
            }
            else {
                model_brandCategory::addRow($brand, $category);
                echo "enabled";
            }
        }

    }
}
