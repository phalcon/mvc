<?php

use Phalcon\Mvc\Micro;
use Phalcon\Http\Response;

require __DIR__ . "/config/config.php";
require __DIR__ . "/config/services.php";

$app = new Micro($di);

$app->get('/', function () use ($app) {
    echo $app['view']->render('index');
});

$app->notFound(function () use ($app) {
    echo $app['view']->render('404');
});

$app->error(function () use ($app) {
    echo $app['view']->render('500');
});

$app->handle();
