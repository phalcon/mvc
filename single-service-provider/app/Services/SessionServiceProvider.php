<?php

namespace App\Services;

use Phalcon\Session\Adapter\Files;

/**
 * \App\Services\SessionServiceProvider
 *
 * @package App\Services
 */
class SessionServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Session Adapter.
     * Start the session the first time some component request the session service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function () {
                $session = new Files();
                $session->start();

                return $session;
            }
        );
    }
}
