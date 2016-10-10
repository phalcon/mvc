<?php

namespace App\Services;

use Phalcon\Config;

/**
 * \App\Services\ConfigServiceProvider
 *
 * @package App\Services
 */
class ConfigServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Configuration.
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
