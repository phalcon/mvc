<?php

namespace App\Services;

use Phalcon\Mvc\Url;

/**
 * \App\Services\UrlResolverServiceProvider
 *
 * @package App\Services
 */
class UrlResolverServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Url Resolver.
     * The URL component is used to generate all kind of urls in the application
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
