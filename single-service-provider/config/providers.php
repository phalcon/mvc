<?php

use App\Providers;

return [
    // Application Service Providers
    Providers\EventManagerServiceProvider::class,
    Providers\ConfigServiceProvider::class,
    Providers\DatabaseServiceProvider::class,
    Providers\ModelsMetadataServiceProvider::class,
    Providers\TagServiceProvider::class,
    Providers\EscaperServiceProvider::class,
    Providers\SessionServiceProvider::class,
    Providers\MvcDispatcherServiceProvider::class,
    Providers\VoltTemplateEngineServiceProvider::class,
    Providers\PhpTemplateEngineServiceProvider::class,
    Providers\ViewServiceProvider::class,
    Providers\UrlResolverServiceProvider::class,
    Providers\RouterServiceProvider::class,
    Providers\ResponseServiceProvider::class,

    // Third Party Providers
    // ...
];
