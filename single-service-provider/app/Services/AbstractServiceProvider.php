<?php

namespace App\Services;

use Phalcon\Di;
use Phalcon\DiInterface;
use Phalcon\Mvc\User\Component;

/**
 * \Phosphorum\Services\AbstractServiceProvider
 *
 * @package Phosphorum\Services
 */
abstract class AbstractServiceProvider extends Component implements ServiceProviderInterface
{
    protected $serviceName;

    /**
     * AbstractServiceProvider constructor.
     *
     * @param DiInterface $di      The Dependency Injector.
     * @param string      $name    The Service name.
     */
    public function __construct($name, DiInterface $di = null)
    {
        $this->serviceName = $name;

        $di = $di ?: Di::getDefault();
        $this->setDI($di);
    }
}
