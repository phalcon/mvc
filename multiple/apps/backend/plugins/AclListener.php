<?php

namespace Multiple\Backend\Plugins;

use \Phalcon\Events\Event;
use \Phalcon\Mvc\Dispatcher;

class AclListener
{

	protected $_module;

	public function __construct($module)
	{
		$this->_module = $module;
	}

	public function beforeDispatch(Event $event, Dispatcher $dispatcher)
	{
		echo $resource = $this->_module . '-' . $dispatcher->getControllerName(), PHP_EOL; // frontend-dashboard
		echo $access = $dispatcher->getActionName(); // null
	}

}