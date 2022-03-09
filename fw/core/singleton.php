<?php

namespace fw\core;

trait Singleton
{

    private static $_instance = null;

    private function __clone() {
    }

    private function __wakeup() {
    }

    private function __construct()
    {
    }

    public static function instance()
    {
        if (is_null(self::$_instance))
            self::$_instance = new self;

        return self::$_instance;
    }
}
