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
            'controllersDir' => __DIR__ . '/../../app/controllers/',
            'modelsDir'      => __DIR__ . '/../../app/models/',
            'viewsDir'       => __DIR__ . '/../../app/views/',
            'pluginsDir'     => __DIR__ . '/../../app/plugins/',
            'libraryDir'     => __DIR__ . '/../../app/library/',
            'baseUri'        => '/mvc/single-factory-default/',
        ],
        'models'      => [
            'metadata' => [
                'adapter' => 'Memory'
            ]
        ]
    ]
);
