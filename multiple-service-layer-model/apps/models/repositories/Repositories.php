<?php 
namespace Modules\Models\Repositories;

use Modules\Models\Repositories\Exceptions;

abstract class Repositories
{
    public static function getRepository($name)
    {
    	$className = "\\Modules\\Models\\Repositories\\Repository\\{$name}";
		
        if ( ! class_exists($className)) {
            throw new Exceptions\InvalidRepositoryException("Repository {$className} doesn't exists.");
        }
        
        return new $className();
    }
}
