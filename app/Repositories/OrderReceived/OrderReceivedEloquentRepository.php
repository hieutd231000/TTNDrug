<?php

namespace App\Repositories\OrderReceived;

use App\Models\OrderReceived;
use App\Repositories\Eloquent\EloquentRepository;

class OrderReceivedEloquentRepository extends EloquentRepository implements OrderReceivedRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderReceived::class;
    }
}
