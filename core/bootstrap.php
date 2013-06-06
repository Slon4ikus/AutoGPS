<?php

    function __autoload($class)
        {
            $parts = explode('_', $class);
            $path = implode(DIRECTORY_SEPARATOR, $parts);
            require_once $path . '.php';
        }

    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

    session_start();
    core_model::makeConnection();
    core_route::start();

 
