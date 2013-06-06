<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/13/13
 * Time: 6:46 PM
 * To change this template use File | Settings | File Templates.
 */
 
class model_info extends core_model{

    public static function findAllText($brandName, $enabled) {

        $query = "SELECT * FROM info
                  WHERE brand_name='$brandName' AND enabled=$enabled
                  ORDER BY category, info.type, info.order";
        $result = self::doQuery($query);
        $infoArr = core_addition::fetchArr($result);

        $categoriesArr = self::selectAllCategories();

        $infoTypeArr = self::selectAllInfoTypes();


        foreach($categoriesArr as $category) {
            foreach($infoTypeArr as $infoType) {
                $mainArr[$category['name']][$infoType['name']] = array();
            }
        }

        foreach($infoArr as $arrData) {
            $mainArr[$arrData['category']] [$arrData['type']]
                    [count($mainArr[$arrData['category']][$arrData['type']])] = $arrData;
        }

        return $mainArr;

    }

    static function checkForCategories($brand) {
        $query = "SELECT categories.name FROM categories";
        $result = self::doQuery($query);
        $categoriesArr = core_addition::fetchArr($result);

        $existingCategories = array();
        foreach($categoriesArr as $category) {
           $query = "SELECT * FROM brands_categories
                     WHERE brand_name = '$brand' AND category_name ='".$category['name']."'";
           $result = self::doQuery($query);
           if($result->num_rows == 0)
                $existingCategories[$category['name']] = 0;
           else
                $existingCategories[$category['name']] = 1;
        }
        return $existingCategories;
    }

     static function selectAboutInfo($enabled) {
        $query = "SELECT * FROM about
                  WHERE enabled=$enabled ORDER BY about.type, about.order";
        $result = self::doQuery($query);
        $infoArr = core_addition::fetchArr($result);

        $infoTypeArr = self::selectAllInfoTypes();

        foreach($infoTypeArr as $infoType) {
                $mainArr[$infoType['name'] ] = array();
        }

        foreach($infoArr as $arrData) {
            $mainArr[$arrData['type']][count($mainArr[$arrData['type']])] = $arrData;
        }
        return $mainArr;
    }

    static function selectAllInfoTypes() {
        $query = "SELECT * FROM info_type ORDER BY importance";
        $result = self::doQuery($query);
        return core_addition::fetchArr($result);
    }

    static function selectAllCategories() {
        $query = "SELECT * FROM categories ORDER BY importance";
        $result = self::doQuery($query);
        return core_addition::fetchArr($result);
    }


    static function adminAddAboutInfo($content, $type, $order, $enabled, $class) {
        $content = htmlspecialchars ($content, ENT_QUOTES);
        $content=core_addition::replaceBreaks($content);
        $type = htmlspecialchars ($type, ENT_QUOTES);
        $class = htmlspecialchars($class, ENT_QUOTES);
        $command = "INSERT INTO `about` (
            `id` ,
            `content` ,
            `order` ,
            `enabled` ,
            `type` ,
            `class`
            )
        VALUES (NULL ,  '$content',  '$order',  '$enabled',  '$type',  '$class');";
        core_model::upDate($command);
    }

    static function adminChangeAboutInfo($id, $content, $type, $order, $enabled, $class) {
        $content = htmlspecialchars($content, ENT_QUOTES);
        $content=core_addition::replaceBreaks($content);
        $type = htmlspecialchars($type, ENT_QUOTES);
        $class = htmlspecialchars($class, ENT_QUOTES);
        $command = "UPDATE `about` SET
            `content` = '$content' ,
            `order` = '$order' ,
            `enabled` = '$enabled',
            `type` = '$type',
            `class` = '$class'
        WHERE `id`='$id'";
        core_model::upDate($command);
    }

    static function adminDeleteAboutInfo($id) {
        $command = "DELETE FROM about WHERE id=$id";
        self::upDate($command);
    }

    static function addInfoItem($content, $brand, $category, $type, $order, $enabled, $class) {
        $content = htmlspecialchars($content, ENT_QUOTES);
        $content=core_addition::replaceBreaks($content);
        $brand = htmlspecialchars($brand, ENT_QUOTES);
        $type = htmlspecialchars($type, ENT_QUOTES);
        $class = htmlspecialchars($class, ENT_QUOTES);
        $command = "INSERT INTO `info` (
            `id` ,
            `category` ,
            `info` ,
            `brand_name` ,
            `type` ,
            `order` ,
            `enabled` ,
            `class`
            )
        VALUES (NULL , '$category', '$content', '$brand', '$type', '$order',  '$enabled',  '$class');";
        core_model::upDate($command);
    }

    static function changeInfoItem($id, $content, $type, $order, $enabled, $class) {
        $content = htmlspecialchars($content, ENT_QUOTES);
        $content=core_addition::replaceBreaks($content);
        $type = htmlspecialchars($type, ENT_QUOTES);
        $class = htmlspecialchars($class, ENT_QUOTES);
         $command = "UPDATE `info` SET
            `info` = '$content' ,
            `order` = '$order' ,
            `enabled` = '$enabled',
            `type` = '$type',
            `class` = '$class'
        WHERE `id`='$id'";
        core_model::upDate($command);
    }

    static function deleteInfoItem($id) {
        $command = "DELETE FROM info WHERE id=$id";
        self::upDate($command);
    }

}
