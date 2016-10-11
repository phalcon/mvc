<?php

namespace App\Providers;

use Phalcon\Mvc\Url;

/**
 * \App\Providers\UrlResolverServiceProvider
 *
 * @package App\Providers
 */
class UrlResolverServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'url';

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
                $url = new Url();

                /** @var \Phalcon\DiInterface $this */
                $url->setBaseUri($this->getShared('application')->baseUri);

                return $url;
            }
        );
    }
}
