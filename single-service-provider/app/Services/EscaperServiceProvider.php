<?php

namespace App\Services;

use Phalcon\Escaper;

/**
 * \App\Services\EscaperServiceProvider
 *
 * @package App\Services
 */
class EscaperServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Escaper Service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Escaper::class);
    }
}
