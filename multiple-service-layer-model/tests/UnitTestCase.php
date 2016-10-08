<?php

use Phalcon\Test\UnitTestCase as PhalconTestCase;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

abstract class UnitTestCase extends PhalconTestCase
{
    /**
     * @var bool
     */
    private $loaded = false;

    public function setUp()
    {
        parent::setUp();

        // get any DI components here. If you have a config, be sure to pass it to the parent
        $config = include __DIR__ . "/../apps/config/config.php";

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $this->di['db'] = function () use ($config) {
            return new DbAdapter(
                [
                    "host" => $config->database->host,
                    "username" => $config->database->username,
                    "password" => $config->database->password,
                    "dbname" => $config->database->dbname
                ]
            );
        };

        $this->loaded = true;
    }

    /**
     * Check if the test case is setup properly
     * @throws \PHPUnit_Framework_IncompleteTestError
     */
    public function __destruct()
    {
        if (!$this->loaded) {
            throw new \PHPUnit_Framework_IncompleteTestError('Please run parent::setUp().');
        }
    }
}
