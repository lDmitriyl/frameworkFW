<?php

namespace fw\core;

class Page
{
    use singleton;

    private $macros = 'FW_PAGE_PROPERTY_';

    private $scripts = [];

    private $styles = [];

    private $string = [];

    private $arrMacros = [];

    public function addJs(string $src)
    {
        $this->scripts[$this->formMacros($src)] = $src;
    }

    public function addCss(string $link)
    {
        $this->styles[$this->formMacros($link)] = $link;
    }

    public function addString(string $str)
    {
        $this->string[$this->formMacros($str)] = $str;
    }

    public function setProperty(string $id, $value)
    {
        $this->arrMacros[$this->formMacros($id)] = $value;
    }

    public function getProperty(string $id)
    {
        return $this->arrMacros[$this->getMacros() . $id];
    }

    public function showProperty(string $id)
    {
        echo $this->formMacros($id);
    }

    public function getAllReplace()
    {
        return array_merge($this->arrMacros, $this->scripts, $this->styles, $this->string);
    }

    protected function getMacros()
    {
        return $this->macros;
    }

    protected function setMacros(string $value)
    {
        $this->macros = $value;
    }

    public function showHead()
    {
        if($this->styles)
            foreach ($this->styles as $macros => $style) echo '<link rel="stylesheet" href="' . $macros . '">';

        if($this->string)
            foreach ($this->string as $macros => $string) echo $macros;

        if($this->scripts)
            foreach ($this->scripts as $macros => $script) echo '<script src="' . $macros . '"></script>';
    }

    protected function formMacros($str){
        return '#'. $this->getMacros() . $str . '#';
    }

}