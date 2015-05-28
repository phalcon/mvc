<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{

	public function indexAction()
	{
		$this->view->disable();
	}
}
