<?php

namespace fw\core;

class Application{

    use singleton;

    private $__components = [];
    private $pager;
    private $template = null;

    private function __construct()
    {
        $this->pager = Page::instance();
    }

    public function header()
    {
        $this->startBuffer();

        $this->includeTemplate('header.php');
    }

    public function footer()
    {
        $this->includeTemplate('footer.php');

        $this->endBuffer();
    }

    public function startBuffer()
    {
        ob_start();
    }

    public function endBuffer()
    {
        $arrMacros = $this->pager->getAllReplace();

        echo str_replace(array_keys($arrMacros), array_values($arrMacros) , ob_get_clean());
    }

    public function restartBuffer()
    {
        ob_clean();
    }

    protected function includeTemplate($file){

        if(file_exists($_SERVER['DOCUMENT_ROOT']. '/fw/templates/'. Config::get('template/id/') . '/' . $file))
            include_once $_SERVER['DOCUMENT_ROOT']. '/fw/templates/'. Config::get('template/id/') . '/' . $file;
        else
            throw new \Exception('Отсутствует шаблон - ' . Config::get('template/id/') . '/' . $file);

    }

    public function getPager()
    {
        return $this->pager;
    }
}

