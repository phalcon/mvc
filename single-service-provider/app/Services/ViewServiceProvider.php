<?php

namespace App\Services;

use Phalcon\Mvc\View;

/**
 * \App\Services\ViewServiceProvider
 *
 * @package App\Services
 */
class ViewServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the View.
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

                /** @var \Phalcon\DiInterface $this */
                $view->registerEngines(
                    [
                        '.volt' => $this->getShared('voltEngine', [$view, $this]),
                        '.php'  => $this->getShared('phpEngine', [$view, $this]),
                    ]
                );

                $view->setViewsDir($config->viewsDir);
                //$view->setRenderLevel(View::LEVEL_AFTER_TEMPLATE);

                return $view;
            }
        );
    }
}
