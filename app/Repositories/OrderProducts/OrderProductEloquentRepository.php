<?php

namespace App\Repositories\OrderProducts;

use App\Models\OrderProducts;
use App\Repositories\Eloquent\EloquentRepository;

class OrderProductEloquentRepository extends EloquentRepository implements OrderProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderProducts::class;
    }
}
