<?php

class core_model {

    protected static $mysqli;

    public static function makeConnection() {
        self::$mysqli = new mysqli();
        self::$mysqli->connect('localhost', 'root', '', 'gpsAuto');
        if(self::$mysqli->connect_error)
            die(self::echoDbError() . "Could not connect.");
        self::$mysqli->set_charset("utf8");
    }
    public static function doQuery($query) {
        $result = self::$mysqli->query($query);
        self::checkForErrors();
        return $result;
    }
    public static function upDate($command) {
        self::$mysqli->query($command);
        self::checkForErrors();
    }

    public static function checkForErrors(){
        if(self::$mysqli->error != '') {
            self::echoDbError();
            return true;
        }
        return false;
    }

    public static function echoDbError() {
       $_SESSION['message']['type'] = "Data base error";
       $_SESSION['message']['text'] = self::$mysqli->error;
    }




}
