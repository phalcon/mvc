<?php

use Phalcon\Autoload\Loader;

$loader = new Loader();
$loader->setNamespaces(
    [
        'Single\Controllers' => '../app/Controllers/',
        'Single\Models'      => '../app/Models/'
    ]
);

$loader->register();
