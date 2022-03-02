<?php

session_start();

function autoloadClasses($class_name){
    $class_name = str_replace('\\','/', $class_name);

    if(!@include_once $_SERVER['DOCUMENT_ROOT']. '/' .$class_name . '.php'){
        throw new \Exception('Не верное имя файла для подключения - ' .$class_name);
    }

}

spl_autoload_register('autoloadClasses');
