<?php

namespace App\Services;

use Phalcon\Http\Response;

/**
 * \App\Services\ResponseServiceProvider
 *
 * @package App\Services
 */
class ResponseServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Response Service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Response::class);
    }
}
