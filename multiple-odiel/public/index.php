<?php

class Application extends \Phalcon\Mvc\Application
{

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	protected function _registerServices()
	{

		$di = new \Phalcon\DI\FactoryDefault();

		$loader = new \Phalcon\Loader();

		/**
		 * We're a registering a set of directories taken from the configuration file
		 */
		$loader->registerDirs(
			array(
				__DIR__ . '/../apps/library/'
			)
		)->register();

		//Registering a router
		$di->set('router', function(){
			$router = new \Phalcon\Mvc\Router();
			$router->setDefaultModule("main");
			return $router;
		});

		$this->setDI($di);
	}

	public function main()
	{

		$this->_registerServices();

		//Register the installed modules
		$this->registerModules(array(
			'backend' => array(
				'className' => 'Application\Backend\Module',
				'path' => '../apps/backend/Module.php'
			),
			'main' => array(
				'className' => 'Application\Main\Module',
				'path' => '../apps/main/Module.php'
			)
		));

		echo $this->handle()->getContent();
	}

}

try {
	$application = new Application();
	$application->main();
} catch (Exception $e) {
	echo $e->getMessage();
}
