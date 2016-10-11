<?php

namespace App\Providers;

use Phalcon\Mvc\Model\Metadata\Memory;

/**
 * \App\Providers\ModelsMetadataServiceProvider
 *
 * @package App\Providers
 */
class ModelsMetadataServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'modelsMetadata';

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
                $metadata = new Memory();

                return $metadata;
            }
        );
    }
}
