<?php

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpViewEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Session\Adapter\Stream as SessionAdapter;
use Phalcon\Session\Manager as Session;

/**
 * The FactoryDefault Dependency Injector automatically registers the right
 * services to provide a full stack framework
 */
$di = new FactoryDefault();

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set(
    "url",
    function () use ($config) {
        $url = new UrlResolver();

        $url->setBaseUri(
            $config->application->baseUri
        );

        return $url;
    },
    true
);

/**
 * Setting up the view component
 */
$di->set(
    "view",
    function () use ($config) {
        $view = new View();

        $view->setViewsDir(
            $config->application->viewsDir
        );

        $view->registerEngines(
            [
                ".volt" => function ($view) use ($config) {
                    $volt = new VoltEngine($view, $this);

                    $volt->setOptions(
                        [
                            "path"      => $config->application->cacheDir,
                            "separator" => "_",
                        ]
                    );

                    return $volt;
                },

                // Generate Template files uses PHP itself as the template engine
                ".phtml" => PhpViewEngine::class
            ]
        );

        return $view;
    },
    true
);

/**
 * Database connection is created based on the parameters defined in the
 * configuration file
 */
$di->set(
    'db',
    function () use ($config) {
        return new DbAdapter(
            [
                "host"     => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname"   => $config->database->dbname,
            ]
        );
    }
);

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set(
    "modelsMetadata",
    function () use ($config) {
        return new MetaDataAdapter();
    }
);

/**
 * Start the session the first time some component request the session service
 */
$di->set(
    "session",
    function () {
        $session = new Session();
        $files = new SessionAdapter([
            'savePath' => sys_get_temp_dir(),
        ]);
        $session->setAdapter($files);

        $session->start();

        return $session;
    }
);


class myVoltEngine extends VoltEngine
{
    public function __set(string $key, $value)
    {
    }

}