<?php

//backend/Module.php

namespace Test\Backend;

use Phalcon\Loader,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter,
	Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{

	/**
	 * Registers the module auto-loader
	 */
	public function registerAutoloaders()
	{

		$loader = new Loader();

		$loader->registerNamespaces(array(
			'Test\Backend\Controllers' => __DIR__ . '/controllers/',
			'Test\Backend\Models' => __DIR__ . '/models/',
		));

		$loader->register();
	}

	/**
	 * Registers the module-only services
	 *
	 * @param Phalcon\DI $di
	 */
	public function registerServices($di)
	{

		/**
		 * Read configuration
		 */
		$config = include __DIR__ . "/config/config.php";

		$di['dispatcher'] = function() {
		    $dispatcher = new Dispatcher();
		    $dispatcher->setDefaultNamespace("Test\Backend\Controllers");
		    return $dispatcher;
		};

		//Register Volt as a service
		$di['voltService'] = function($view, $di) {

		    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

		    $volt->setOptions(array(
		            "compiledPath" => "../cache/compiled-templates/",
		            "compiledExtension" => ".compiled",
		            "compileAlways" => true
		    ));

		    return $volt;
		};

		/**
		 * Setting up the view component
		 */
		$di['view'] = function() {
			$view = new View();
			$view->setViewsDir(__DIR__ . '/views/default/');
			$view->registerEngines(array(
			    ".volt" => 'voltService'
			));
			return $view;
		};

		/**
		 * Database connection is created based in the parameters defined in the configuration file
		 */
		$di['db'] = function() use ($config) {
			return new DbAdapter(array(
				"host" => $config->database->host,
				"username" => $config->database->username,
				"password" => $config->database->password,
				"dbname" => $config->database->dbname
			));
		};

	}

}