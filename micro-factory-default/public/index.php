<?php

error_reporting(E_ALL);

use Phalcon\Autoload\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . '/../config/config.php';

    $di = new FactoryDefault();

    /**
     * The URL component is used to generate all kind of urls in the application
     */
    $di->set('url', function () use ($config) {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri($config->application->baseUri);

        return $url;
    });

    /**
     * Database connection is created based in the parameters defined in the configuration file
     */
    $di->set('db', function () use ($config) {
        return new Database(
            [
                "host"     => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname"   => $config->database->name
            ]
        );
    });

    /**
     * Registering an autoloader
     */
    $loader = new Loader();

    $loader
        ->setDirectories([$config->application->modelsDir])
        ->register();

    /**
     * Starting the application
     */
    $app = new Micro();

    /**
     * Add your routes here
     */
    $app->get('/', function () {
        require __DIR__ . "/../views/index.phtml";
    });

    /**
     * Not found handler
     */
    $app->notFound(function () use ($app) {
        $app->response->setStatusCode(404, "Not Found")->sendHeaders();
        require __DIR__ . "/../views/404.phtml";
    });

    /**
     * Handle the request
     */
    $app->handle($_SERVER["REQUEST_URI"]);
} catch (\Exception $e) {
    echo $e->getMessage(), PHP_EOL;
    echo $e->getTraceAsString();
}
