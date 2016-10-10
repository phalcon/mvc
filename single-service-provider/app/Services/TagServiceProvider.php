<?php

namespace App\Services;

use Phalcon\Tag;

/**
 * \App\Services\TagServiceProvider
 *
 * @package App\Services
 */
class TagServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Tag Service.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared($this->serviceName, Tag::class);
    }
}
