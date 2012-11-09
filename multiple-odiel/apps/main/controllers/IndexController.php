<?php

namespace Application\Main\Controllers;

class IndexController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		echo 'Main index';
	}

	public function testAction()
	{
		echo 'Main test';
	}

}
