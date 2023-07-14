<?php

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Mvc\ViewBaseInterface;

/**
 * \App\Providers\VoltTemplateEngineServiceProvider
 *
 * @package App\Providers
 */
class VoltTemplateEngineServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'voltEngine';

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
                /** @var DiInterface $this */
                $config = $this->getShared('config')->volt;

                $volt = new Volt($view, $di);

                $volt->setOptions(
                    [
                        'path'      => $config->cacheDir,
                        'separator' => $config->compiledSeparator
                    ]
                );

                return $volt;
            }
        );
    }
}
