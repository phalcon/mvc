<?php
use Phalcon\DI, 
    Phalcon\DI\FactoryDefault;
    
ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__);
define('PATH_LIBRARY', __DIR__ . '/../apps/library/');
define('PATH_SERVICES', __DIR__ . '/../apps/services/');
define('PATH_MODELS', __DIR__ . '/../apps/models/');
// define('PATH_RESOURCES', __DIR__ . '/../apps/resources/');

set_include_path(
    ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

// required for phalcon/incubator
include __DIR__ . "/../vendor/autoload.php";

// use the application autoloader to autoload the classes
// autoload the dependencies found in composer
$loader = new \Phalcon\Loader();

$loader->registerDirs(array(
    ROOT_PATH
));

$loader->registerNamespaces(array(
    'Modules\Services' => PATH_SERVICES,
    'Modules\Models' => PATH_MODELS, 
    'Phalcon' => __DIR__ . '../vendor/phalcon/incubator/Library/Phalcon'
));

$loader->register();

$di = new FactoryDefault();
DI::reset();

// add any needed services to the DI here

DI::setDefault($di);