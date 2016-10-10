<?php

namespace App\Services;

use Phalcon\Mvc\Dispatcher;

/**
 * \App\Services\MvcDispatcherServiceProvider
 *
 * @package App\Services
 */
class MvcDispatcherServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Mvc Dispatcher.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function () {
                $dispatcher = new Dispatcher();
                $dispatcher->setDefaultNamespace('App\Http\Controllers');

                return $dispatcher;
            }
        );
    }
}
