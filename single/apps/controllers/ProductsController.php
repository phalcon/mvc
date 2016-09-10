<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        $this->view->product = Products::findFirst();
    }

    public function testAction()
    {
        $this->view->setRenderLevel(
            View::LEVEL_NO_RENDER
        );
    }
}
