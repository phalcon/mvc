<?php

namespace App\Providers;

use Phalcon\Mvc\View;

/**
 * \App\Providers\ViewServiceProvider
 *
 * @package App\Providers
 */
class ViewServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'view';

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
                /** @var \Phalcon\DiInterface $this */
                $config = $this->getShared('config')->application;

                $view = new View();

                $view->registerEngines(
                    [
                        '.volt' => $this->getShared('voltEngine', [$view, $this]),
                        '.php'  => $this->getShared('phpEngine', [$view, $this]),
                    ]
                );

                $view->setViewsDir($config->viewsDir);

                return $view;
            }
        );
    }
}
