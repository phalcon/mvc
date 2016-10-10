<?php

namespace App\Services;

use Phalcon\DiInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\ViewBaseInterface;

/**
 * \App\Services\VoltTemplateEngineServiceProvider
 *
 * @package App\Services
 */
class VoltTemplateEngineServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Volt Template Engine.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function (ViewBaseInterface $view, DiInterface $di = null) {
                /** @var \Phalcon\DiInterface $this */
                $config = $this->getShared('config')->volt;

                $volt = new Volt($view, $di);

                $volt->setOptions(
                    [
                        'compiledPath'      => $config->cacheDir,
                        'compiledSeparator' => $config->compiledSeparator
                    ]
                );

                return $volt;
            }
        );
    }
}
