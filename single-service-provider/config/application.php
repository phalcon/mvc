<?php

return [
    // Database configuration
    'database' => [
        'host'     => 'localhost',
        'username' => 'phalcon',
        'password' => 'secret',
        'dbname'   => 'phalcondb',
    ],

    // Application configuration
    'application' => [
        'controllersDir' => __DIR__ . '/../app/Http/Controllers',
        'modelsDir'      => __DIR__ . '/../app/Models/',
        'viewsDir'       => __DIR__ . '/../resources/views/',
        'cacheDir'       => __DIR__ . '/../storage/cache/data/',
        'logsDir'        => __DIR__ . '/../storage/logs/',
        'baseUri'        => '/mvc/single-service-provider/',
    ],

    // The Volt Engine configuration
    'volt' => [
        'cacheDir'          => __DIR__ . '/../storage/cache/volt/',
        'compiledSeparator' => '_',
    ],
];
