<?php

class ProductsController extends \Phalcon\Mvc\Controller {
	
	public function indexAction(){
		$this->view->setVar('product', Products::findFirst());
	}

}