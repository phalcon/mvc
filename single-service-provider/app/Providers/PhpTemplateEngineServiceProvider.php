<?php

namespace App\Providers;

use Phalcon\DiInterface;
use Phalcon\Mvc\ViewBaseInterface;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

/**
 * \App\Providers\PhpTemplateEngineServiceProvider
 *
 * @package App\Providers
 */
class PhpTemplateEngineServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'phpEngine';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function (ViewBaseInterface $view, DiInterface $di = null) {
                $engine = new PhpEngine($view, $di);

                return $engine;
            }
        );
    }
}
