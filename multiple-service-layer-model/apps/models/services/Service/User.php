<?php
namespace Modules\Models\Services\Service;

use Modules\Models\Repositories\Repositories;

class User
{
	public function getLast()
	{
		return Repositories::getRepository('User')->getLast();
	}
}
