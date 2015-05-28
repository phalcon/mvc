<?php

namespace Multiple\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Mysql;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new Loader();

		$loader->registerNamespaces(array(
			'Multiple\Frontend\Controllers' => '../apps/frontend/controllers/',
			'Multiple\Frontend\Models' => '../apps/frontend/models/',
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them general or register in the ModuleDefinition to make them module-specific
	 */
	public function registerServices($di)
	{

		//Registering a dispatcher
		$di->set('dispatcher', function () {
			$dispatcher = new Dispatcher();

			//Attach a event listener to the dispatcher
			$eventManager = new \Phalcon\Events\Manager();
			$eventManager->attach('dispatch', new \Acl('frontend'));

			$dispatcher->setEventsManager($eventManager);
			$dispatcher->setDefaultNamespace("Multiple\Frontend\Controllers\\");
			return $dispatcher;
		});

		//Registering the view component
		$di->set('view', function () {
			$view = new \Phalcon\Mvc\View();
			$view->setViewsDir('../apps/frontend/views/');
			return $view;
		});

		$di->set('db', function () {
			return new Database(array(
				"host" => "localhost",
				"username" => "root",
				"password" => "secret",
				"dbname" => "invo"
			));
		});
	}
}
