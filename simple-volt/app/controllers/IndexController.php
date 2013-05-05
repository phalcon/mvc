<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {

    }

    public function testAction()
    {
    	$this->view->hello = "hey, hello!";
    }

}

