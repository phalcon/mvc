<?php

use Phalcon\Loader;

/**
 * We're a registering a set of namespaces
 */
$loader = new Loader();
$loader->registerNamespaces(['App' => dirname(dirname(__FILE__)) . '/app/']);
$loader->register();
