<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        var_dump(
            $this->app->request(
                [
                    "controller" => "say",
                    "action"     => "hello",
                ]
            )
        );
    }
}
