<?php

class Application extends \Phalcon\Mvc\Application
{	

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	protected function _registerServices()
	{

		$di = new \Phalcon\DI();		

		//Registering a router
		$di->set('router', function(){

			$router = new \Phalcon\Mvc\Router();

			$router->setDefaultModule("frontend");

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

		//Registering a Http\Response 
		$di->set('response', function(){
			return new \Phalcon\Http\Response();
		});

		//Registering a Http\Request
		$di->set('request', function(){
			return new \Phalcon\Http\Request();
		});		

		//Registering the Models-Metadata
		$di->set('modelsMetadata', function(){
			return new \Phalcon\Mvc\Model\Metadata\Memory();
		});

		//Registering the Models Manager
		$di->set('modelsManager', function(){
			return new \Phalcon\Mvc\Model\Manager();
		});		

		$this->setDI($di);
	}

	public function main()
	{

		$this->_registerServices();

		//Register the installed modules
		$this->registerModules(array(
			'frontend' => array(
				'className' => 'Multiple\Frontend\Module',
				'path' => '../apps/frontend/Module.php'
			),
			'backend' => array(
				'className' => 'Multiple\Backend\Module',
				'path' => '../apps/backend/Module.php'
			)
		));

		echo $this->handle()->getContent();
	}

}

$application = new Application();
$application->main();
