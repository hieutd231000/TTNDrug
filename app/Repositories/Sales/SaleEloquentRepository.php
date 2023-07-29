<?php

namespace App\Repositories\Sales;

use App\Models\Sales;
use App\Repositories\Eloquent\EloquentRepository;

class SaleEloquentRepository extends EloquentRepository implements SaleRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Sales::class;
    }
}
