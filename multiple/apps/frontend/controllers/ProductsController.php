<?php

namespace Multiple\Frontend\Controllers;

class ProductsController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		return $this->response->redirect('/login');
	}

}