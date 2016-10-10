<?php

use App\Bootstrap;

include dirname(dirname(__FILE__)) . '/bootstrap/autoload.php';

$bootstrap = new Bootstrap(dirname(dirname(__FILE__)));
echo $bootstrap->run();
