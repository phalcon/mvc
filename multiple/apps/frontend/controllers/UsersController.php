<?php

namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class UsersController extends Controller
{

    public function indexAction()
    {
        echo '<br>', __METHOD__;
    }
}
