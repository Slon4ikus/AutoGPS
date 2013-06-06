<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/12/13
 * Time: 4:22 PM
 * To change this template use File | Settings | File Templates.
 */

class model_brands extends core_model
{

    public static function getBrands($category)
    {
        $query = "SELECT brands.name, brands.pictureUrl FROM brands, brands_categories
                      WHERE brands_categories.category_name='$category'
                      AND brands_categories.brand_name=brands.name";
        $result = self::doQuery($query);
        return core_addition::fetchArr($result);
    }

    public static function getAllBrands() {
        $query = "SELECT * FROM brands ORDER BY brands.name";
        $result = self::doQuery($query);
        return core_addition::fetchArr($result);
       }

    public static function selectFirstBrand() {
        $query = "SELECT * FROM `brands` LIMIT 0, 1";
        $result = self::doQuery($query);
        return core_addition::fetchArr($result);
    }

    public static function selectBrand($brand) {
        $query = "SELECT * FROM `brands` WHERE brands.name = '$brand'";
        $result = self::doQuery($query);
        return core_addition::fetchArr($result);
    }

    public static function addNewBrand($name, $pictureUrl) {
         $name = htmlspecialchars($name, ENT_QUOTES);
         $pictureUrl = htmlspecialchars($pictureUrl, ENT_QUOTES);
         $command = "INSERT INTO `brands`(`name`, `pictureUrl`)
                     VALUES ('$name', '$pictureUrl')";
         core_model::upDate($command);
         self::checkForErrors();
    }

    public static function changeBrandInfo($oldName, $newName, $pictureUrl) {
         $newName = htmlspecialchars($newName, ENT_QUOTES);
         $pictureUrl = htmlspecialchars($pictureUrl, ENT_QUOTES);
         $command = "UPDATE `brands` SET
                     `name` = '$newName' ,
                     `pictureUrl` = '$pictureUrl'
                     WHERE `name`='$oldName'";
        core_model::upDate($command);
    }

    public static function deleteBrand($name) {
        $command = "DELETE FROM brands WHERE name='$name'";
        self::upDate($command);
    }



}
