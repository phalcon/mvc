<?php

$app = new Phalcon\Mvc\Micro();

$app->get('/', function () {
    echo "<h1>Welcome!</h1>";
});

$app->get('/say/hello/{name}', function ($name) {
    echo "<h1>Hello! $name</h1>";
});

$app->post('/store/something', function () {

    $name = $this->request->getPost('name');

    echo "<h1>Hello! $name</h1>";
    
});

$app->handle();
