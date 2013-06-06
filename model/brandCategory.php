<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/25/13
 * Time: 12:38 AM
 * To change this template use File | Settings | File Templates.
 */

class model_brandCategory extends core_model
{
    public static function checkIfExist($brand, $category) {
        $query = "SELECT *
                  FROM brands_categories
                  WHERE brand_name = '$brand' AND category_name = '$category'";
        $result = core_model::doQuery($query);
        if ($result->num_rows == 0)
            return false;
        return true;
    }

    public static function deleteRow($brand, $category) {
         $command = "DELETE FROM brands_categories WHERE brand_name = '$brand' AND category_name = '$category'";
        self::upDate($command);
    }

    public static function addRow($brand, $category) {
        $command = "INSERT INTO `brands_categories` (
            `id` ,
            `brand_name` ,
            `category_name`
            )
        VALUES (NULL ,  '$brand',  '$category');";
        core_model::upDate($command);
    }
}
