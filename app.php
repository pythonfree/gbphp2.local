<?php


require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/functions.php';

try {
    App::init();
} catch (PDOException $e) {
    echo "DB is not available";
    dump($e->getTrace());
} catch (Exception $e) {
    echo $e->getMessage();
}
