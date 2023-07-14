<?php

error_reporting(E_ALL);

use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View as View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\Application as Application;
use Phalcon\Session\Adapter\Stream as SessionFiles;
use Phalcon\Session\Manager as SessionManager;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
use Phalcon\Mvc\Model\MetaData\Memory as MemoryMetaData;

try {
    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    $loader = new Loader();

    /**
     * We're a registering a set of directories taken from the configuration file
     */
    $loader->setDirectories(
        [
            $config->application->controllersDir,
            $config->application->modelsDir
        ]
    )->register();

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new FactoryDefault();

    /**
     * The URL component is used to generate all kind of urls in the application
     */
    $di->set('url', function () use ($config) {
        $url = new UrlResolver();
        $url->setBaseUri($config->application->baseUri);
        return $url;
    });

    /**
     * Setting up the view component
     */
    $di->set('view', function () use ($config) {
        $view = new View();
        $view->setViewsDir($config->application->viewsDir);
        return $view;
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
     * If the configuration specify the use of metadata adapter use it or use memory otherwise
     */
    $di->set('modelsMetadata', function () {
        return new MemoryMetaData();
    });

    /**
     * Start the session the first time some component request the session service
     */
    $di->set('session', function () {
        $session = new SessionManager();
        $files = new SessionFiles([
            'savePath' => '/tmp',
        ]);
        
        $session
            ->setAdapter($files)
            ->start();
        return $session;
    });

    /**
     * Handle the request
     */
    $application = new Application($di);

    $response = $application->handle($_SERVER["REQUEST_URI"]);

    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage();
}
