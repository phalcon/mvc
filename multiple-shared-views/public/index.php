<?php

use Phalcon\Mvc\Router;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\DI\FactoryDefault;
use Multiple\Frontend\Module as FrontendModule;
use Multiple\Backend\Module as BackendModule;

error_reporting(E_ALL);

$di = new FactoryDefault();

// Registering a router
$di->set(
    "router",
    function () {
        $router = new Router();

        $router->setDefaultModule("frontend");

        $router->add(
            "/:controller/:action",
            [
                "module"     => "frontend",
                "controller" => 1,
                "action"     => 2,
            ]
        );

        $router->add(
            "/login",
            [
                "module"     => "backend",
                "controller" => "login",
                "action"     => "index",
            ]
        );

        $router->add(
            "/admin/products/:action",
            [
                "module"     => "backend",
                "controller" => "products",
                "action"     => 1,
            ]
        );

        $router->add(
            "/products/:action",
            [
                "module"     => "frontend",
                "controller" => "products",
                "action"     => 1,
            ]
        );

        return $router;
    }
);

// Registering a shared view component
$di->set(
    "view",
    function () {
        $view = new View();

        $view->setViewsDir("../apps/common/views/");

        return $view;
    }
);

$application = new Application($di);

// Register the installed modules
$application->registerModules(
    [
        "frontend" => [
            "className" => FrontendModule::class,
            "path"      => "../apps/modules/frontend/Module.php",
        ],
        "backend" => [
            "className" => BackendModule::class,
            "path"      => "../apps/modules/backend/Module.php",
        ],
    ]
);

$response = $application->handle();

echo $response->getContent();
