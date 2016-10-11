<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;

$di = new FactoryDefault();

// Registering a dispatcher
$di->setShared('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Single\Controllers\\');

    return $dispatcher;
});

// Registering the view component
$di->setShared('view', function () {
    $view = new View();
    $view->setViewsDir('../App/Views/');

    return $view;
});

$di->setShared('url', function () {
    $url = new UrlProvider();
    $url->setBaseUri('/mvc/single-camelized-dirs/');

    return $url;
});

$di->setShared('db', function () {
    return new Database(
        [
            "host"     => "localhost",
            "username" => "root",
            "password" => "",
            "dbname"   => "invo"
        ]
    );
});
