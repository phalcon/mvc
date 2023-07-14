<?php

error_reporting(E_ALL);

use Phalcon\Mvc\Application;

try {

    /**
     * Read the configuration
     */
    $config = include __DIR__ . "/../app/config/config.php";

    /**
     * Read auto-loader
     */
    include __DIR__ . "/../app/config/loader.php";

    /**
     * Read services
     */
    include __DIR__ . "/../app/config/services.php";

    /**
     * Handle the request
     */
    $application = new Application($di);

    $response = $application->handle($_SERVER["REQUEST_URI"]);

    $response->send();
} catch (\Exception $e) {
    echo $e->getMessage();
}
