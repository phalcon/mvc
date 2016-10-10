<?php

namespace App\Services;

use Phalcon\Mvc\Model\Metadata\Memory;

/**
 * \App\Services\ModelsMetadataServiceProvider
 *
 * @package App\Services
 */
class ModelsMetadataServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Metadata Adapter.
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
