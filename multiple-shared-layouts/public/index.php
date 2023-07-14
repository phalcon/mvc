<?php

error_reporting(E_ALL);

try {

    /**
     * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
     */
    $di = new \Phalcon\DI\FactoryDefault();

    /**
     * Registering a router
     */
    $di['router'] = function () {

        $router = new \Phalcon\Mvc\Router(false);

        $router->add('/admin', [
            'module'     => 'backend',
            'controller' => 'index',
            'action'     => 'index'
        ]);

        $router->add('/index', [
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'index'
        ]);

        $router->add('/', [
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'index'
        ]);

        return $router;
    };

    /**
     * The URL component is used to generate all kind of urls in the application
     */
    $di->set('url', function () {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/mvc/multiple-shared-layouts/');

        return $url;
    });

    /**
     * Start the session the first time some component request the session service
     */
    $di->set('session', function () {
        $session = new \Phalcon\Session\Adapter\Files();
        $session->start();

        return $session;
    });

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application();

    $application->setDI($di);

    /**
     * Register application modules
     */
    $application->registerModules(
        [
            'frontend' => [
                'className' => 'Modules\Frontend\Module',
                'path'      => '../apps/frontend/Module.php'
            ],
            'backend'  => [
                'className' => 'Modules\Backend\Module',
                'path'      => '../apps/backend/Module.php'
            ]
        ]
    );

    $response = $application->handle($_SERVER["REQUEST_URI"]);

    $response->send();
} catch (PDOException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
