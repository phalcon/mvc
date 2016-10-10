<?php

namespace App\Services;

use Phalcon\DiInterface;
use Phalcon\Mvc\ViewBaseInterface;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;

/**
 * \App\Services\PhpTemplateEngineServiceProvider
 *
 * @package App\Services
 */
class PhpTemplateEngineServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Php Template Engine.
     * Generate Template files uses PHP itself as the template engine.
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
