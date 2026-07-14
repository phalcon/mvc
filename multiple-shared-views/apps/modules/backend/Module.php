<?php

namespace Multiple\Backend;

use Phalcon\Autoload\Loader;
use Phalcon\Di\DiInterface;
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

        $loader->setNamespaces(
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
                        'host'     => 'localhost',
                        'username' => 'phalcon',
                        'password' => 'secret',
                        'dbname'   => 'phalcon_invo',
                    ]
                );
            }
        );
    }
}
