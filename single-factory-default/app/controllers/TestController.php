<?php

class TestController extends ControllerBase
{

    public function indexAction()
    {
	echo "hello";
	var_dump(array(1, 2, 3, 4));
	var_export(new stdclass());	
    }

}

