<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

	public function indexAction()
	{
		var_dump($this->app->request(array(
			'controller' => 'say',
			'action' => 'hello'
		)));
	}

}