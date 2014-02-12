<?php
/**
 * Register application modules
 */

$application->registerModules(array(
    'frontend' => array(
        'className' => 'Modules\Modules\Frontend\Module',
        'path' => __DIR__ . '/../modules/frontend/Module.php'
    ), 
    'dashboard' => array(
        'className' => 'Modules\Modules\Dashboard\Module',
        'path' => __DIR__ . '/../modules/dashboard/Module.php'
    )
));
