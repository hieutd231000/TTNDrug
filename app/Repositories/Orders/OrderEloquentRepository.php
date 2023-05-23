<?php

namespace App\Repositories\Orders;

use App\Models\Orders;
use App\Repositories\Eloquent\EloquentRepository;

class OrderEloquentRepository extends EloquentRepository implements OrderRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Orders::class;
    }
}
