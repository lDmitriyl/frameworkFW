<?php

namespace fw\core;

class Config{

    const CONFIG_PATH = '/fw/config.php';

    private static $config = null;

    private static function getConfig()
    {
        self::$config = include $_SERVER['DOCUMENT_ROOT'] . self::CONFIG_PATH;
    }

    public static function get($property)
    {
        if(self::$config === null) self::getConfig();

        $arr = explode('/',$property);

        foreach (self::$config as $key => $items){

            if($key === $arr[0])
                return $items[$arr[1]];
        }

        return false;
    }
}




