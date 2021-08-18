<?php
    include_once __DIR__ . '/models/config.php';
    include_once __DIR__ . '/models/photo.php';

    // подгружаем и активируем авто-загрузчик Twig-а
    require_once __DIR__ . '/vendor/autoload.php';
    Twig_Autoloader::register();

try {
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');

    // инициализируем Twig
    $twig = new Twig_Environment($loader);

    // подгружаем шаблон
    $template = $twig->loadTemplate('list.tmpl');

    // передаём в шаблон переменные и значения
    // выводим сформированное содержание

    $content = $template->render([
        'title' => 'Работа с файлами',
        'h1' => 'ГАЛЕРЕЯ ФОТО',
        'PHOTO_SMALL' => PHOTO_SMALL,
        'images' => $images
    ]);
    echo $content;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}

