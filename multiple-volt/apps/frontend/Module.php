<?php

namespace Multiple\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

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
                'Multiple\Frontend\Controllers' => __DIR__ . "/controllers/",
                'Multiple\Frontend\Models'      => __DIR__ . "/models/",
            ]
        );

        $loader->register();
    }

    /**
     * Registers the module-only services
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Read configuration
         */
        $config = include __DIR__ . "/config/config.php";

        /**
         * Setting up the view component
         */
        $di["view"] = function () {
            $view = new View();

            $view->setViewsDir(
                __DIR__ . "/views/"
            );

            $view->registerEngines(
                [
                    ".volt" => VoltEngine::class,
                ]
            );

            return $view;
        };

        /**
         * Database connection is created based in the parameters defined in the
         * configuration file
         */
        $di["db"] = function () use ($config) {
            return new DbAdapter(
                [
                    "host"     => $config->database->host,
                    "username" => $config->database->username,
                    "password" => $config->database->password,
                    "dbname"   => $config->database->name,
                ]
            );
        };
    }
}
