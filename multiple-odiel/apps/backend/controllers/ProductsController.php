<?php

namespace Multiple\Backend\Controllers;

use Multiple\Backend\Models\Products as Products;

class ProductsController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$this->view->setVar('product', Products::findFirst());
	}

}