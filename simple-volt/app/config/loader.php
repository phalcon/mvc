<?php

use Phalcon\Autoload\Loader;

$loader = new Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->setDirectories(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
    ]
);

$loader->register();
