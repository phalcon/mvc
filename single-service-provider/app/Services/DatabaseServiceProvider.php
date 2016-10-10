<?php

namespace App\Services;

use Phalcon\Db\Adapter\Pdo\Mysql;

/**
 * \App\Services\DatabaseServiceProvider
 *
 * @package App\Services
 */
class DatabaseServiceProvider extends AbstractServiceProvider
{
    /**
     * Initialize the Database Connection.
     * Database connection is created based in the parameters defined in the configuration file.
     *
     * @return void
     */
    public function register()
    {
        $this->di->setShared(
            $this->serviceName,
            function () {
                /** @var \Phalcon\DiInterface $this */
                $connection = new Mysql($this->getShared('config')->database->toArray());

                return $connection;
            }
        );
    }
}
