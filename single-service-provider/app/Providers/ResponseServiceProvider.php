<?php

namespace App\Providers;

use Phalcon\Http\Response;

/**
 * \App\Providers\ResponseServiceProvider
 *
 * @package App\Providers
 */
class ResponseServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'response';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Response::class);
    }
}
