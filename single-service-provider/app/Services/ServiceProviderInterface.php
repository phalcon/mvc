<?php

namespace App\Services;

use Phalcon\Di\InjectionAwareInterface;

/**
 * \App\Services\ServiceProviderInterface
 *
 * @package App\Services
 */
interface ServiceProviderInterface extends InjectionAwareInterface
{
    /**
     * Registers a service in the services container.
     *
     * @return mixed
     */
    public function register();
}
