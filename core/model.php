<?php

class core_model
{

    protected static $mysqli;

    // description: makes conntection with data base
    public static function makeConnection()
    {
        self::$mysqli = new mysqli();
        self::$mysqli->connect('localhost', 'root', '', 'gpsAuto');
        if (self::$mysqli->connect_error)
            die(self::echoDbError() . "Could not connect.");
        self::$mysqli->set_charset("utf8");
    }

    // description: makes query to data base
    //parameters: query (string)
    //returns object
    public static function doQuery($query)
    {
        $result = self::$mysqli->query($query);
        self::checkForErrors();
        return $result;
    }
    // description: makes update in data base
    //parameters: update command (string)
    //returns object
    public static function upDate($command)
    {
        self::$mysqli->query($command);
        self::checkForErrors();
    }
    // description: checks data base for errors
    //returns true or false
    public static function checkForErrors()
    {
        if (self::$mysqli->error != '') {
            self::echoDbError();
            return true;
        }
        return false;
    }

    // description: gives data base error description
    public static function echoDbError()
    {
        core_addition::setSessionMessage("Data base error", self::$mysqli->error);
    }
}
