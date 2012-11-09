<?php

namespace Application\Main\Controllers;

class TestController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		echo 'test/index/';
	}

	public function testAction()
	{
		echo 'test/test/';
	}

}
