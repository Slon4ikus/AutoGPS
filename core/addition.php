<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Landors
 * Date: 5/5/13
 * Time: 8:16 PM
 * To change this template use File | Settings | File Templates.
 */
 
class core_addition {

    public static function urlHasRootDir($url, $rootDir) {
        for($i=0; $i < count($url); $i++) {
            if($url[$i] == $rootDir) {
                return true;
            }
        }
        return false;
    }

    public static function setSessionMessage($type, $text) {
        $_SESSION['message']['type'] = $type;
        $_SESSION['message']['text'] = $text;
    }

    public static function isMail($email)
    {
	$exp = '/([a-zA-Z0-9|.|-|_]{2,256})@(([a-zA-Z0-9|.|-]{2,256}).([a-z]{2,4}))/';
	$r = preg_match($exp,$email);
	if ($r == 1)
        return true ;
    return false;
	}

    static function alreadyExists($value, $tableName, $columnName)
    {
        $query = "SELECT $columnName
                  FROM $tableName WHERE $columnName = '$value'";
        $result = core_model::doQuery($query);
        if ($result->num_rows == 0)
            return false;
        return true;
    }

    static function fetchArr($object){
        $resultArr = array();
        if($object != null)
            while ($row = $object->fetch_assoc()) {
                $resultArr[count($resultArr)] =  $row;
            }
        return $resultArr;
    }

    static function replaceBreaks($string) {
        $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
        return $string;
    }

    static function whichLineBreak($string) {
        if(strpos($string, "\r\n") != false)
            return "\r\n";
        else
            if(strpos($string, "\r") != false)
                return "\r";
            else
                return "\n";
    }




}
