<?php

use fw\core\Application;

include $_SERVER['DOCUMENT_ROOT'] . '/fw/init.php';
/**
 * @var Application $app
 */
$app->header();

$app->getPager()->setProperty('TITLE', '1C-BITRIX');
?>

<?php
$app->includeComponent('dmitriy:banner',
    '',
    [
        "name" => "default",
        "title" => 'банер',
    ]
);
?>

<?php
$app->includeComponent('dmitriy:banner',
    'main',
    [
        "name" => "main",
        "title" => 'банер',
    ]
);
?>

    <pre>
        -------- 01.03.2022 --------
        1)создан класс Page для работы с содержимым html страницы
        2)создан трэйт синглтон
        3)В класс Application добавлены методы: header() footer() startBuffer() endBuffer() restartBuffer()
        4)созданы файлы header.php и footer.php в темплейте main
        -------- 02.03.2022 --------
        1)Изменение методов класса Page + добавления методов formMacros(), getMacros(), setMacros()
        2)изменение метода endBuffer() класса Application
        -------- 09.03.2022 --------
        1) Добавление метода IncludeComponent в класс Application
        2) Создание класса \Core\Type\Dictionary
        3) Cоздание классов Requets , Server которые наследуются от Dictionary
        4) Создание базовых классов компонентов(Base) и их шаблонов(Template)
    </pre>

<?php
$app->footer();
?>