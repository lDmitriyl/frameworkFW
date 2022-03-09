<?php

use fw\core\Application;

include $_SERVER['DOCUMENT_ROOT'] . '/fw/init.php';
/**
 * @var Application $app
 */
$app->header();
?>

<?$app->getPager()->setProperty('TITLE', '1C-BITRIX');?>

    <pre>
        -------- 01.03.2022 --------
        1)создан класс Page для работы с содержимым html страницы
        2)создан трэйт синглтон
        3)В класс Application добавлены методы: header() footer() startBuffer() endBuffer() restartBuffer()
        4)созданы файлы header.php и footer.php в темплейте main
        -------- 02.03.2022 --------
        1)Изменение методов класса Page + добавления методов formMacros(), getMacros(), setMacros()
        2)изменение метода endBuffer() класса Application
    </pre>

<?php
$app->footer();
?>