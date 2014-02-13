<?php
namespace Modules\Modules\Frontend\Controllers;

use \Modules\Models\Services\Services as Services;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        try {
        	$this->view->users = Services::getService('User')->getLast();
            
        } catch (\Exception $e) {
        	$this->flash->error($e->getMessage());
        }
    }	
}

