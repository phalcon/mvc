<?php

use Phalcon\Config\Config;

$config = new Config(
    [
        'application' => [
            'viewsDir' => 'views/',
            'cacheDir' => 'cache/',
            'baseUri'  => '/mvc/micro-simple-views/',
        ]
    ]
);
