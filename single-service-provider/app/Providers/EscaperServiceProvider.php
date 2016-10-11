<?php

namespace App\Providers;

use Phalcon\Escaper;

/**
 * \App\Providers\EscaperServiceProvider
 *
 * @package App\Providers
 */
class EscaperServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'escaper';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Escaper::class);
    }
}
