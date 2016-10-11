<?php

namespace App\Providers;

use Phalcon\Config;

/**
 * \App\Providers\ConfigServiceProvider
 *
 * @package App\Providers
 */
class ConfigServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'config';

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
                /** @var \Phalcon\DiInterface  $this */
                $config = [];
                $appPath = $this->getShared('bootstrap')->getApplicationPath();

                if (file_exists($appPath . '/config/application.php')) {
                    /** @noinspection PhpIncludeInspection */
                    $config = include $appPath . '/config/application.php';
                }

                if (is_array($config)) {
                    $config = new Config($config);
                }

                return $config;
            }
        );
    }
}
