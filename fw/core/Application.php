<?php

namespace fw\core;

class Application{

    private $__components = [];
    private $pager =  null;
    private $template = null;

    private static $_instance = null;
    
    private function __construct()
    {
    }

    public static function instance()
    {
        if (is_null(self::$_instance))
            self::$_instance = new self;

        return self::$_instance;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

}

