<?php

return new \Phalcon\Config(array(
	'database' => array(
		'adapter'  => 'Mysql',
		'host'     => 'localhost',
		'username' => 'root',
		'password' => '',
		'name'     => 'test',
	),
	'application' => array(
		'modelsDir'      => __DIR__ . '/../models/',
		'baseUri'        => '/micro-factory-default/',
	),
	'models' => array(
		'metadata' => array(
			'adapter' => 'Memory'
		)
	)
));

