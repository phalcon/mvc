<?php

namespace App\Providers;

use Phalcon\Tag;

/**
 * \App\Providers\TagServiceProvider
 *
 * @package App\Services
 */
class TagServiceProvider extends AbstractServiceProvider
{
    /**
     * The Service name.
     * @var string
     */
    protected $serviceName = 'tag';

    /**
     * Register application service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Tag::class);
    }
}
