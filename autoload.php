<?php

function myAutoload($classname)
{
    if (is_readable(__DIR__ . '/c/' . $classname . '.php')) {
        include_once __DIR__ . '/c/' . $classname . '.php';
    } elseif (is_readable(__DIR__ . '/m/' . $classname . '.php')) {
        include_once __DIR__ . '/m/' . $classname . '.php';
    }
}

spl_autoload_register('myAutoload');
