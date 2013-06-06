<?php
class core_addition
{
    // description: check if there is root directory in url
    //parameters: url and root directory of system
    //returns true or false
    public static function urlHasRootDir($url, $rootDir)
    {
        for ($i = 0; $i < count($url); $i++) {
            if ($url[$i] == $rootDir) {
                return true;
            }
        }
        return false;
    }

    //description: sets session message
    //parameters: type of message, message
    public static function setSessionMessage($type, $text)
    {
        $_SESSION['message']['type'] = $type;
        $_SESSION['message']['text'] = $text;
    }

    //description: checks if string is in email type
    //parameters: email string
    //returns true or false
    public static function isMail($email)
    {
        $exp = '/([a-zA-Z0-9|.|-|_]{2,256})@(([a-zA-Z0-9|.|-]{2,256}).([a-z]{2,4}))/';
        $r = preg_match($exp, $email);
        if ($r == 1)
            return true;
        return false;
    }
    //description: checks if there is already such record in data base
    //parameters: value of record, table name of data base, column name of this table
    //returns true or false
    static function alreadyExists($value, $tableName, $columnName)
    {
        $query = "SELECT $columnName
                  FROM $tableName WHERE $columnName = '$value'";
        $result = core_model::doQuery($query);
        if ($result->num_rows == 0)
            return false;
        return true;
    }
    //description: makes array from object
    //parameters: object
    //returns array
    static function fetchArr($object)
    {
        $resultArr = array();
        if ($object != null)
            while ($row = $object->fetch_assoc()) {
                $resultArr[count($resultArr)] = $row;
            }
        return $resultArr;
    }
    //description: replaces all possible string break symbols with html tag br
    //parameters: string
    //returns string
    static function replaceBreaks($string)
    {
        $string = str_replace(array("\r\n", "\r", "\n"), "<br />", $string);
        return $string;
    }

    //description: finds which line breaks uses users os
    //parameters: string
    //returns string
    static function whichLineBreak($string)
    {
        if (strpos($string, "\r\n") != false)
            return "\r\n";
        else
            if (strpos($string, "\r") != false)
                return "\r";
            else
                return "\n";
    }
}
