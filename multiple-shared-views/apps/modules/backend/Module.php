<?php

namespace Multiple\Backend;

use Phalcon\Loader;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [
                "Multiple\\Backend\\Controllers" => "../apps/modules/backend/controllers/",
                "Multiple\\Backend\\Models"      => "../apps/modules/backend/models/",
            ]
        );

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        // Registering a dispatcher
        $di->set(
            "dispatcher",
            function () {
                $dispatcher = new Dispatcher();

                $dispatcher->setDefaultNamespace('Multiple\Backend\Controllers\\');

                return $dispatcher;
            }
        );

        // Set a different connection in each module
        $di->set(
            "db",
            function () {
                return new Mysql(
                    [
                        "host"     => "localhost",
                        "username" => "root",
                        "password" => "secret",
                        "dbname"   => "invo",
                    ]
                );
            }
        );
    }
}
