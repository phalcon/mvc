<?php

use App\Services;

return [
    // Application Service Providers
    'eventsManager'  => Services\EventManagerServiceProvider::class,
    'config'         => Services\ConfigServiceProvider::class,
    'database'       => Services\DatabaseServiceProvider::class,
    'modelsMetadata' => Services\ModelsMetadataServiceProvider::class,
    'tag'            => Services\TagServiceProvider::class,
    'escaper'        => Services\EscaperServiceProvider::class,
    'session'        => Services\SessionServiceProvider::class,
    'dispatcher'     => Services\MvcDispatcherServiceProvider::class,
    'voltEngine'     => Services\VoltTemplateEngineServiceProvider::class,
    'phpEngine'      => Services\PhpTemplateEngineServiceProvider::class,
    'view'           => Services\ViewServiceProvider::class,
    'url'            => Services\UrlResolverServiceProvider::class,
    'router'         => Services\RouterServiceProvider::class,
    'response'       => Services\ResponseServiceProvider::class,

    // Third Party Providers
    // ...
];
