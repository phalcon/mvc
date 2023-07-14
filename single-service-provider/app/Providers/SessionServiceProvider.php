<?php

namespace App\Providers;

use Phalcon\Session\Adapter\Stream as SessionFiles;
use Phalcon\Session\Manager as SessionManager;

/**
 * \App\Providers\SessionServiceProvider
 *
 * @package App\Providers
 */
class SessionServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'session';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function () {
                $session = new SessionManager();
                $files = new SessionFiles([
                    'savePath' => '/tmp',
                ]);

                $session
                    ->setAdapter($files)
                    ->start();
                return $session;
            }
        );
    }
}
