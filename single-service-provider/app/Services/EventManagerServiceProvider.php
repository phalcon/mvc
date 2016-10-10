<?php

namespace App\Services;

use Phalcon\Events\Manager;

/**
 * \App\Services\EventManagerServiceProvider
 *
 * @package App\Services
 */
class EventManagerServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Events Manager.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function () {
                $em = new Manager();
                $em->enablePriorities(true);

                return $em;
            }
        );
    }
}
