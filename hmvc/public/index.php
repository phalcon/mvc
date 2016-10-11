<?php

use Phalcon\Loader;
use Phalcon\DiInterface;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Http\ResponseInterface;
use Phalcon\Mvc\Application as MVCApplication;

class HMVCApplication extends MVCApplication
{
    /**
     * HMVCApplication Constructor
     *
     * @param DiInterface $di
     */
    public function __construct(DiInterface $di)
    {
        $loader = new Loader();

        // Application Loader
        $loader->registerDirs(
            [
                "../app/controllers/",
            ]
        );

        $loader->register();

        // Register the view service
        $di["view"] = function () {
            $view = new View();

            $view->setViewsDir("../app/views/");

            return $view;
        };

        // Register the app itself as a service
        $di["app"] = $this;

        // Sets the parent Id
        parent::setDI($di);
    }

    /**
     * Does a HMVC request in the application
     *
     * @param array $location
     * @param array $data
     *
     * @return mixed
     */
    public function request(array $location, $data = null)
    {
        $di = $this->getDI();

        $dispatcher = clone $di->get("dispatcher");

        if (isset($location["controller"])) {
            $dispatcher->setControllerName($location["controller"]);
        } else {
            $dispatcher->setControllerName("index");
        }

        if (isset($location["action"])) {
            $dispatcher->setActionName($location["action"]);
        } else {
            $dispatcher->setActionName("index");
        }

        $params = [];

        if (isset($location["params"])) {
            if (is_array($location["params"])) {
                $dispatcher->setParams($location["params"]);
            } else {
                $dispatcher->setParams(
                    (array)$location["params"]
                );
            }
        }

        $dispatcher->setParams($params);
        $dispatcher->dispatch();

        $response = $dispatcher->getReturnedValue();

        if ($response instanceof ResponseInterface) {
            return $response->getContent();
        }

        return $response;
    }
}

$di = new FactoryDefault();

$app = new HMVCApplication($di);

echo $app->handle()->getContent();
