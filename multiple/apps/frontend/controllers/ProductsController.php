<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        return $this->response->redirect('login');
    }
}
