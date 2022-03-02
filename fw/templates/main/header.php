<?php
if(!defined('CORE_ACCESS') || CORE_ACCESS !== true) die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php $this->pager->showProperty('TITLE');?></title>

    <?php
    $this->pager->addCss('/assets/css/style.css');
    $this->pager->addCss('/assets/css/style1.css');

    $this->getPager()->addJs('/assets/js/script.js');

    $this->pager->addString('<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">')
    ?>

    <?php $this->pager->ShowHead();?>
</head>
<body>
это header<br>