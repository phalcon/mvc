<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);
ini_set('display_errors', 1);

try {

    /**
     * Include services
     */
    require __DIR__ . '/../apps/config/services.php';

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
    require __DIR__ . '/../apps/config/modules.php';

    $response = $application->handle($_SERVER["REQUEST_URI"]);

    $response->send();
} catch (PDOException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}
