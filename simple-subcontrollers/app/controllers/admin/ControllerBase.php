<?php

namespace MyApp\Controllers\Admin;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{

	public function afterExecuteRoute()
	{
		$this->view->setViewsDir($this->view->getViewsDir() . 'admin/');
	}

}
