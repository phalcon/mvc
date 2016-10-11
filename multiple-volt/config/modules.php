<?php

use Multiple\Frontend\Module as FrontendModule;

/**
 * Register application modules
 */
$application->registerModules(
    [
        "frontend" => [
            "className" => FrontendModule::class,
            "path"      => __DIR__ . "/../apps/frontend/Module.php",
        ]
    ]
);
