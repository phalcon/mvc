<?php

namespace App\Services;

/**
 * \App\Services\PhpTemplateEngineServiceProvider
 *
 * @package App\Services
 */
class RouterServiceProvider extends AbstractServiceProvider
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
            function () {
                /** @var \Phalcon\DiInterface  $this */
                $appPath = $this->getShared('bootstrap')->getApplicationPath();

                return require $appPath . '/app/Http/routes.php';
            }
        );
    }
}
