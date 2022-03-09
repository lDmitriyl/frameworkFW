<?php

namespace fw\core;

use fw\core\component\Template;
use fw\core\type\Request;
use fw\core\type\Server;

class Application{

    use singleton;

    private $__components = [];
    private $pager;
    private $template = null;
    private $request;
    private $server;

    private function __construct()
    {
        $this->pager = Page::instance();
        $this->request = new Request();
        $this->server = new Server();
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

    public function IncludeComponent(string $componentName, string $template, array $params)
    {
        $componentsPath = $_SERVER["DOCUMENT_ROOT"] . '/fw/components/';

        $arrComponentName = explode(':', $componentName);

        $componentPath = $componentsPath . $arrComponentName[0] . '/' . $arrComponentName[1];

        if (!isset($this->__components[$componentPath])){

            $fileName = $componentPath . "/class.php";

            if(file_exists($fileName)){

                $beforeIncludeClasses = get_declared_classes();

                include_once($fileName);

                $afterIncludeClasses = get_declared_classes();

                for ($i = count($beforeIncludeClasses); $i < count($afterIncludeClasses); $i++) {

                    if (is_subclass_of($afterIncludeClasses[$i], "fw\core\component\Base"))
                        $this->__components[$componentPath] = $afterIncludeClasses[$i];
                }
            }else{
                throw new \Exception('Отсутствует класс компонента - ' . $componentName);
            }
        }

        $component = new $this->__components[$componentPath]($arrComponentName[1], $componentPath);

        $component->params = $params;

        $template = empty($template) ? 'default' : $template;

        $component->template = new Template($arrComponentName[1], $componentPath . '/templates/' . $template, $component);

        $component->executeComponent();

        return true;
    }

    protected function includeTemplate($file)
    {
        if(file_exists($_SERVER['DOCUMENT_ROOT']. '/fw/templates/'. Config::get('template/id/') . '/' . $file))
            include_once $_SERVER['DOCUMENT_ROOT']. '/fw/templates/'. Config::get('template/id/') . '/' . $file;
        else
            throw new \Exception('Отсутствует шаблон - ' . Config::get('template/id/') . '/' . $file);
    }

    public function getPager()
    {
        return $this->pager;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function getServer(): Server
    {
        return $this->server;
    }
}

