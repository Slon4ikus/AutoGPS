<?php
class core_route
{
    public static $path = "";
    public static $paramNames = array();
    public static $paramValues = array();

    /* main function which calls
    * other functions depending on URL.
    * Is called every time when changing URL
    */
    public static function start()
    {
        $pathToIndex = realpath('index.php');
        $pathToIndex = trim($pathToIndex, DIRECTORY_SEPARATOR);
        $pathArr = explode(DIRECTORY_SEPARATOR, $pathToIndex);
        $rootDir = $pathArr[count($pathArr) - 2];

        /*takes needed things from url
          and converts it as it should be read
        */
        $routes = $_SERVER['REQUEST_URI'];
        $routes = trim($routes, '/');
        $routes = explode('/', $routes);
        $requestStarts = 1;
        $requestMain = array();
        if (core_addition::urlHasRootDir($routes, $rootDir)) {
            $arrCount = count($routes);
            while ($routes[$arrCount - 1] != $rootDir)
                $arrCount--;
            $requestStarts = $arrCount;
            for ($i = 0; $i <= $arrCount - 1; $i++)
                self::$path = self::$path . '/' . $routes[$i];
        }
        for ($i = $requestStarts; $i < count($routes); $i++) {
            $requestMain[count($requestMain)] = $routes[$i];
        }


        // controller and action by default
        $controllerName = 'about';
        $actionName = 'index';

        /*
          puzzle out the url, call controller with action and variables
        */
        if (isset($requestMain[0])) {
            $controllerName = $requestMain[0];
            if (isset($requestMain[1])) {
                $actionName = $requestMain[1];
                if (isset($requestMain[2])) {
                    $mistake = self::getParams($requestMain);
                    if ($mistake) {
                        self::ErrorPage404();
                        exit;
                    }
                }
            }
        }
        $controllerPath = "controller" . DIRECTORY_SEPARATOR . $controllerName . ".php";
        if (!file_exists($controllerPath)) {
            $_SESSION["message"]["type"] = "Error";
            $_SESSION["message"]["text"] = "File doesnt exist: " . $controllerName . "<br>";
            self::ErrorPage404();
        }
        $controllerClass = "controller_" . $controllerName;
        $controller = new $controllerClass;
        if (!method_exists($controller, $actionName)) {
            $_SESSION["message"]["type"] = "Error";
            $_SESSION["message"]["text"] = "This method doesnt exist: " . $actionName . "<br>";
            self::ErrorPage404();
        }
        $controller->$actionName(self::$paramNames, self::$paramValues);
    }

/*
 * description: reads parameters of action and return false if something
 * is wrong ( for example, parameter without a value)
 * parameters: url request(array)
 * returns: true or false
 */
    public static function getParams($requestMain)
    {
        for ($i = 2; $i < count($requestMain); $i += 2) {
            self::$paramNames[count(self::$paramNames)] = $requestMain[$i];
            if (isset($requestMain[$i + 1])) {
                self::$paramValues[count(self::$paramValues)] = $requestMain[$i + 1];
            }
            else {
                return true;
            }
        }
        return false;
    }

    public static function ErrorPage404()
    {
        header("Location:" . self::$path . "/error/index");
    }
}
