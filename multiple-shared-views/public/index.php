<?php

error_reporting(E_ALL);

$di = new \Phalcon\DI\FactoryDefault();

//Registering a router
$di->set('router', function(){

	$router = new \Phalcon\Mvc\Router();

	$router->setDefaultModule("frontend");

	$router->add('/:controller/:action', array(
		'module' => 'frontend',
		'controller' => 1,
		'action' => 2,
	));

	$router->add("/login", array(
		'module' => 'backend',
		'controller' => 'login',
		'action' => 'index',
	));

	$router->add("/admin/products/:action", array(
		'module' => 'backend',
		'controller' => 'products',
		'action' => 1,
	));

	$router->add("/products/:action", array(
		'module' => 'frontend',
		'controller' => 'products',
		'action' => 1,
	));

	return $router;
});

//Registering a shared view component
$di->set('view', function() {
	$view = new \Phalcon\Mvc\View();
	$view->setViewsDir('../apps/common/views/');
	return $view;
});

$application = new \Phalcon\Mvc\Application();

//Pass the DI to the application
$application->setDI($di);

//Register the installed modules
$application->registerModules(array(
	'frontend' => array(
		'className' => 'Multiple\Frontend\Module',
		'path' => '../apps/modules/frontend/Module.php'
	),
	'backend' => array(
		'className' => 'Multiple\Backend\Module',
		'path' => '../apps/modules/backend/Module.php'
	)
));

echo $application->handle()->getContent();
