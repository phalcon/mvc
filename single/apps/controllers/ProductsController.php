<?php

class ProductsController extends \Phalcon\Mvc\Controller {
	
	public function indexAction()
	{
		$this->view->setVar('product', Products::findFirst());
	}

	public function testAction()
	{
		$this->view->setRenderLevel(\Phalcon\Mvc\View::LEVEL_NO_RENDER);
	}

}