<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View\Simple as View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {
    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(
        [
            '.volt' => function ($view) use ($config) {
                $volt = new VoltEngine($view);

                $volt->setOptions(
                    [
                        'path'      => $config->application->cacheDir,
                        'separator' => '_',
                    ]
                );

                return $volt;
            }
        ]
    );

    return $view;
});


$di->setShared(
    'tag',
    function () {
        return new \Phalcon\Html\TagFactory(new \Phalcon\Html\Escaper());
    }
);
