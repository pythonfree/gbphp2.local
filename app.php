<?php


require_once __DIR__ . '/autoload.php';

try {
    App::init();
} catch (PDOException $e) {
    echo "DB is not available";
    echo '<pre>';
    var_dump($e->getTrace());
    echo '</pre>';
} catch (Exception $e) {
    echo '<pre>';
    echo $e->getMessage();
    echo '</pre>';
}
