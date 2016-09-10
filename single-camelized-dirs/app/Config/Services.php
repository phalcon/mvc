<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
use Phalcon\Mvc\Model\Manager as ModelsManager;
use Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaData;

$di = new FactoryDefault();

//Registering a dispatcher
$di->set('dispatcher', function () {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Single\Controllers\\');
    return $dispatcher;
}, true);

//Registering the view component
$di->set('view', function () {
    $view = new View();
    $view->setViewsDir('../App/Views/');
    return $view;
}, true);

$di->set('url', function () {
    $url = new UrlProvider();
    $url->setBaseUri('/mvc/single-camelized-dirs/');
    return $url;
}, true);

$di->set('db', function () {
    return new Database(array(
        "host" => "localhost",
        "username" => "root",
        "password" => "",
        "dbname" => "invo"
    ));
}, true);
