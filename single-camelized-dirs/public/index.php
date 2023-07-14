<?php

use Phalcon\Support\Helper\Str\Camelize;
use Phalcon\Mvc\Application;
use Phalcon\Events\Manager as EventsManager;

require "../app/Config/Loader.php";
require "../app/Config/Services.php";

try {
    $eventsManager = new EventsManager;

    $eventsManager->attach(
        'application:viewRender',
        function ($event, $application, $view) use ($di) {

            $dispatcher = $di->getDispatcher();
            $helper = $di->getHelper();
            $view->render(
                $helper->camelize($dispatcher->getControllerName()),
                $helper->camelize($dispatcher->getActionName()),
                $dispatcher->getParams()
            );
        }
    );

    $application = new Application($di);

    $application->setEventsManager($eventsManager);

    $response = $application->handle($_SERVER["REQUEST_URI"]);

    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage();
}
