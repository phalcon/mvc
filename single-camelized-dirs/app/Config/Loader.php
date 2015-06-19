<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces(array(
    'Single\Controllers' => '../App/Controllers/',
    'Single\Models'      => '../App/Models/'
));

$loader->register();
