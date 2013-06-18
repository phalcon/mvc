<?php

use Phalcon\Loader,
	Phalcon\DiInterface,
	Phalcon\DI\FactoryDefault,
	Phalcon\Mvc\View,
	Phalcon\Http\ResponseInterface,
	Phalcon\Mvc\Application as MVCApplication;

class HMVCApplication extends MVCApplication
{

	/**
	 * HMVCApplication Constructor
	 *
	 * @param Phalcon\DiInterface
	 */
	public function __construct(DiInterface $di)
	{

		$loader = new Loader();

		//Application Loader
		$loader->registerDirs(
			array('../app/controllers/')
		)->register();

		//Register the view service
		$di['view'] = function() {
			$view = new View();
			$view->setViewsDir('../app/views/');
			return $view;
		};

		//Register the app itself as a service
		$di['app'] = $this;

		//Sets the parent Id
		parent::setDI($di);
	}

	/**
	 * Does a HMVC request in the application
	 *
	 * @param array $location
	 * @param array $data
	 * @return mixed
	 */
	public function request($location, $data=null)
	{
		$dispatcher = clone $this->getDI()->get('dispatcher');

		if (isset($location['controller'])) {
			$dispatcher->setControllerName($location['controller']);
		} else {
			$dispatcher->setControllerName('index');
		}

		if (isset($location['action'])) {
			$dispatcher->setActionName($location['action']);
		} else {
			$dispatcher->setActionName('index');
		}

		if (isset($location['params'])) {
			if(is_array($location['params'])) {
				$dispatcher->setParams($location['params']);
			} else {
				$dispatcher->setParams((array) $location['params']);
			}
		} else {
			$dispatcher->setParams(array());
		}

		$dispatcher->dispatch();

		$response = $dispatcher->getReturnedValue();
		if ($response instanceof ResponseInterface) {
			return $response->getContent();
		}

		return $response;
	}

}


$app = new HMVCApplication(new FactoryDefault());

echo $app->handle()->getContent();
