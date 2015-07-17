<?php
use Application\Classes\E404Exception;
function __autoload($class)
{
    $ClassPath = explode('\\', $class);
    $ClassPath[0] = __DIR__;
    $path = implode(DIRECTORY_SEPARATOR, $ClassPath) . '.php';
    //var_dump($path);
    if (file_exists($path)) {
        require_once $path;
    } else {
        throw new E404Exception('Page ' . $class . ' does not exists');
    }
}

spl_autoload_register('__autoload');