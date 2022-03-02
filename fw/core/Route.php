<?php

namespace fw\core;

class Route{

    const ROUTES_PATH = '/fw/route.php';

    private static $routes;

    private static function getRoutes()
    {
        self::$routes = include $_SERVER['DOCUMENT_ROOT'] . self::ROUTES_PATH;
    }

}
