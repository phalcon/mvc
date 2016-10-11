<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces(
    [
        'Single\Controllers' => '../App/Controllers/',
        'Single\Models'      => '../App/Models/'
    ]
);

$loader->register();
