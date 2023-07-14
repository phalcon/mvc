<?php

use Phalcon\Di\Di;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql;

/**
 * Very simple MVC structure
 */

$loader = new Loader();

$loader->setDirectories(
    [
        '../apps/controllers/',
        '../apps/models/'
    ]
);

$loader->register();

$di = new Di();

//Registering a router
$di->set('router', 'Phalcon\Mvc\Router');

//Registering a dispatcher
$di->set('dispatcher', 'Phalcon\Mvc\Dispatcher');

//Registering a Http\Response
$di->set('response', 'Phalcon\Http\Response');

//Registering the view component
$di->set('view', function () {
    $view = new View();
    $view->setViewsDir('../apps/views/');
    return $view;
});

$di->set('db', function () {
    return new Mysql([
        'host'     => 'localhost',
        'username' => 'phalcon',
        'password' => 'secret',
        'dbname'   => 'phalcon_invo',
    ]);
});

//Registering the Models-Metadata
$di->set('modelsMetadata', 'Phalcon\Mvc\Model\Metadata\Memory');

//Registering the Models Manager
$di->set('modelsManager', 'Phalcon\Mvc\Model\Manager');

try {
    $router = $di->getShared('router');
    $router->handle($_SERVER["REQUEST_URI"]);

    $view = $di->getShared('view');

    $dispatcher = $di->getShared('dispatcher');

    $dispatcher->setControllerName($router->getControllerName());
    $dispatcher->setActionName($router->getActionName());
    $dispatcher->setParams($router->getParams());

    // Start the view
    $view->start();

    // Dispatch the request
    $dispatcher->dispatch();

    $view->render($dispatcher->getControllerName(), $dispatcher->getActionName(), $dispatcher->getParams());

    $view->finish();

    $response = $di->getShared('response');

    // Pass the output of the view to the response
    $response->setContent($view->getContent());

    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage();
    var_dump(getcwd(), realpath('../apps/controllers/'), $loader->getDebug());
}
