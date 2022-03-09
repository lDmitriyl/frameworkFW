<?php

namespace fw\core\component;

abstract class Base
{

    public $result;

    public $id;

    public $params;

    public $template;

    public $__path;

    public function __construct($id, $path){

        $this->id = $id;

        $this->__path = $path;

    }

    abstract public function executeComponent();

}