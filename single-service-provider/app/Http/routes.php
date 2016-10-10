<?php

use Phalcon\Mvc\Router;

$router = new Router();

$router->add(
    '/:controller/:action/:params',
    [
        'namespace' => 'App\Controllers',
        'controller' => 1,
        'action' => 2,
        'params' => 3,
    ]
);

$router->add(
    '/:controller',
    [
        'namespace' => 'App\Controllers',
        'controller' => 1
    ]
);

$router->add(
    '/admin/:controller/:action/:params',
    [
        'namespace' => 'App\Controllers\Admin',
        'controller' => 1,
        'action' => 2,
        'params' => 3,
    ]
);

$router->add(
    '/admin/:controller',
    [
        'namespace' => 'App\Controllers\Admin',
        'controller' => 1
    ]
);

return $router;
