<?php

namespace Multiple\Frontend;

class Module
{

	public function registerAutoloaders()
	{

		$loader = new \Phalcon\Loader();

		$loader->registerNamespaces(array(
			'Multiple\Frontend\Controllers' => '../apps/modules/frontend/controllers/',
			'Multiple\Frontend\Models' => '../apps/modules/frontend/models/',
		));

		$loader->register();
	}

	/**
	 * Register the services here to make them module-specific
	 */
	public function registerServices($di)
	{

		//Registering a dispatcher
		$di->set('dispatcher', function () {
			$dispatcher = new \Phalcon\Mvc\Dispatcher();
			$dispatcher->setDefaultNamespace("Multiple\Frontend\Controllers\\");
			return $dispatcher;
		});

		$di->set('db', function () {
			return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
				"host" => "localhost",
				"username" => "root",
				"password" => "secret",
				"dbname" => "invo"
			));
		});

	}

}