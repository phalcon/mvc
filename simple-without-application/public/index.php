<?php

/**
 * Very simple MVC structure
 */

$loader = new \Phalcon\Loader();

$loader->registerDirs(array('../apps/controllers/', '../apps/models/'));

$loader->register();

$di = new \Phalcon\DI();

//Registering a router
$di->set('router', 'Phalcon\Mvc\Router');

//Registering a dispatcher
$di->set('dispatcher', 'Phalcon\Mvc\Dispatcher');

//Registering a Http\Response
$di->set('response', 'Phalcon\Http\Response');

//Registering the view component
$di->set('view', function(){
	$view = new \Phalcon\Mvc\View();
	$view->setViewsDir('../apps/views/');
	return $view;
});

$di->set('db', function(){
	return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
		"host" => "localhost",
		"username" => "root",
		"password" => "",
		"dbname" => "invo"
	));
});

//Registering the Models-Metadata
$di->set('modelsMetadata', 'Phalcon\Mvc\Model\Metadata\Memory');

//Registering the Models Manager
$di->set('modelsManager', 'Phalcon\Mvc\Model\Manager');

try {

	$router = $di->getShared('router');
	$router->handle();

	$view = $di->getShared('view');

	$dispatcher = $di->getShared('dispatcher');

	$dispatcher->setControllerName($router->getControllerName());
	$dispatcher->setActionName($router->getActionName());
	$dispatcher->setParams($router->getParams());

	//Start the view
	$view->start();

	//Dispatch the request
	$dispatcher->dispatch();

	$view->render($dispatcher->getControllerName(), $dispatcher->getActionName(), $dispatcher->getParams());

	$view->finish();

	$response = $di->getShared('response');

	//Pass the output of the view to the response
	$response->setContent($view->getContent());

	$response->sendHeaders();

	echo $response->getContent();

}
catch(Phalcon\Exception $e){
	echo $e->getMessage();
}
