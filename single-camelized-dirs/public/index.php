<?php

use Phalcon\Text;
use Phalcon\Mvc\Application;
use Phalcon\Events\Manager as EventsManager;

require "../App/Config/Loader.php";
require "../App/Config/Services.php";

try {
    $eventsManager = new EventsManager;

    $eventsManager->attach(
        'application:viewRender',
        function ($event, $application, $view) use ($di) {

            $dispatcher = $di->getDispatcher();

            $view->render(
                Text::camelize($dispatcher->getControllerName()),
                Text::camelize($dispatcher->getActionName()),
                $dispatcher->getParams()
            );
        }
    );

    $application = new Application($di);

    $application->setEventsManager($eventsManager);

    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo $e->getMessage();
}
