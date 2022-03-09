<?php

namespace fw\core\component;

use fw\core\Page;

class Template
{
    public $__path;

    public $__relativePath;

    public $id;

    private $pager;

    public $__component;

    public function __construct($id, $path, $component)
    {
        $this->id = $id;

        $this->__path = $path;

        $this->__component = $component;

        $this->pager = Page::instance();
    }

    public function render(string $page = "template")
    {

        $params = $this->__component->params;
        $result = $this->__component->result;

        $this->IncludeModifierFile($result, $params);

        if($this->fileExistsTemplate($page . '.php'))
            include $this->__path. '/' . $page . '.php';
        else
            throw new \Exception('Отсутствует шаблон - ' . $page);

        $this->IncludeComponentEpilog();

        $this->addCss();

        $this->addJs();
    }

    public function IncludeModifierFile(&$result, &$params)
    {
        if ($this->fileExistsTemplate('result_modifier.php'))
        {
            include($this->__path."/result_modifier.php");
        }
    }

    public function IncludeComponentEpilog()
    {
        if ($this->fileExistsTemplate('component_epilog.php'))
        {
            include($this->__path."/component_epilog.php");
        }
    }

    public function addCss()
    {
        if ($this->fileExistsTemplate('style.css')) {
            $this->pager->addCss($this->__path . '/style.css');
        }
    }

    public function addJs()
    {
        if ($this->fileExistsTemplate('script.js')) {
            $this->pager->addJs($this->__path . '/script.js');
        }
    }

    private function fileExistsTemplate(string $file)
    {
        return file_exists($this->__path . "/" . $file);
    }

}