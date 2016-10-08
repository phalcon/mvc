<?php

use Phalcon\Config;

$config = new Config(
    [
        'application' => [
            'viewsDir' => 'views/',
            'cacheDir' => 'cache/',
            'baseUri'  => '/mvc/micro-simple-views/',
        ]
    ]
);
