<?php

namespace Multiple\Frontend;

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
                "Multiple\\Frontend\\Controllers" => "../apps/modules/frontend/controllers/",
                "Multiple\\Frontend\\Models"      => "../apps/modules/frontend/models/",
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

                $dispatcher->setDefaultNamespace('Multiple\Frontend\Controllers\\');

                return $dispatcher;
            }
        );

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
