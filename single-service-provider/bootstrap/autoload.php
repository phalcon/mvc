<?php

use Phalcon\Autoload\Loader;

/**
 * We're a registering a set of namespaces
 */
$loader = new Loader();
$loader->setNamespaces(['App' => dirname(dirname(__FILE__)) . '/app/']);
$loader->register();
