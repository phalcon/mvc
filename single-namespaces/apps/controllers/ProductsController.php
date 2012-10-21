<?php

namespace Single\Controllers;

use Single\Models\Products as Products;

class ProductsController extends \Phalcon\Mvc\Controller {
	
	public function indexAction(){
		$this->view->setVar('product', Products::findFirst());
	}

}