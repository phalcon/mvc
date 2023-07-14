<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);

try {
    /**
     * Include services
     */
    require __DIR__ . "/../config/services.php";

    /**
     * Handle the request
     */
    $application = new Application();

    /**
     * Assign the DI
     */
    $application->setDI($di);

    /**
     * Include modules
     */
    require __DIR__ . "/../config/modules.php";

    $response = $application->handle($_SERVER["REQUEST_URI"]);

    $response->send();
} catch (Exception $e) {
    echo $e->getMessage();
}
