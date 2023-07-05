<?php

namespace App\Repositories\OrderReceivedUsers;

use App\Models\OrderReceivedUsers;
use App\Repositories\Eloquent\EloquentRepository;

class OrderReceivedUsersEloquentRepository extends EloquentRepository implements OrderReceivedUsersRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderReceivedUsers::class;
    }
}
