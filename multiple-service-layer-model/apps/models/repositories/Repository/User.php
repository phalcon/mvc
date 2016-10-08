<?php

namespace Modules\Models\Repositories\Repository;

use Modules\Models\Entities\User as EntityUser;

class User
{
    public function getLast()
    {
        return EntityUser::query()
            ->orderBy('datetime DESC')
            ->execute();
    }
}
