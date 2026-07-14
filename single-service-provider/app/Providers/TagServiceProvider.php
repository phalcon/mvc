<?php

namespace App\Providers;

use Phalcon\Session\Adapter\Stream as SessionFiles;
use Phalcon\Session\Manager as SessionManager;
use Phalcon\Tag;

/**
 * \App\Providers\TagServiceProvider
 *
 * @package App\Services
 */
class TagServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'tag';

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
