<?php

use Phalcon\Config;

return new Config(
    [
        "database" => [
            "adapter"  => "Mysql",
            "host"     => "localhost",
            "username" => "root",
            "password" => "",
            "name"     => "test",
        ],
        "application" => [
            "controllersDir" => __DIR__ . "/../controllers/",
            "modelsDir"      => __DIR__ . "/../models/",
            "viewsDir"       => __DIR__ . "/../views/",
        ],
    ]
);
