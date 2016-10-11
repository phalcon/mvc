<?php

use Phalcon\Config;

return new Config(
    [
        'database'    => [
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => '',
            'name'     => 'test',
        ],
        'application' => [
            'modelsDir' => __DIR__ . '/../models/',
            'baseUri'   => '/micro-factory-default/',
        ],
        'models'      => [
            'metadata' => [
                'adapter' => 'Memory'
            ]
        ]
    ]
);
