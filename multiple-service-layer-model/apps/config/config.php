<?php

use Phalcon\Config\Config;

return new Config(
    [
        'database'    => [
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'phalcon',
            'password' => 'secret',
            'dbname'   => 'phalcon_invo',
        ],
        'application' => [
            'controllersDir' => __DIR__ . '/../controllers/',
            'modelsDir'      => __DIR__ . '/../models/',
            'viewsDir'       => __DIR__ . '/../views/',
            'libraryDir'     => __DIR__ . '/../library/',
            'pluginsDir'     => __DIR__ . '/../plugin/',
            'baseUri'        => '/'
        ]
    ]
);
