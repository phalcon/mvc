<?php

namespace Modules\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql as MySQLAdapter;

class Module
{

    public function registerAutoloaders()
    {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Modules\Frontend\Models' => __DIR__ . '/models/',
        ));

        $loader->register();
    }

    public function registerServices(DiInterface $di)
    {

        /**
         * Read configuration
         */
        $config = include __DIR__ . "/config/config.php";

        $di['dispatcher'] = function () {
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace("Modules\Frontend\Controllers");
            return $dispatcher;
        };

        /**
         * Setting up the view component
         */
        $di->set('view', function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            return $view;
        });

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di->set('db', function () use ($config) {
            return new MySQLAdapter(array(
                "host" => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname" => $config->database->name
            ));
        });
    }
}
