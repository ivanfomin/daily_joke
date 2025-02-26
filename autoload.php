<?php
require __DIR__ . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    var_dump($file);
    die();

    if (file_exists($file)) {
        require $file;
    }
});
