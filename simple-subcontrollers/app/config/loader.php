<?php

$loader = new \Phalcon\Autoload\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader
    ->setNamespaces(
        [
            'MyApp\Controllers' => __DIR__ . '/../controllers/',
            'MyApp\Controllers\Admin' => __DIR__ . '/../controllers/admin'
        ]
    )->register();
