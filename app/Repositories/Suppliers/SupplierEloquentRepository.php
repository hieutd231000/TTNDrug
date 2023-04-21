<?php

namespace App\Repositories\Suppliers;

use App\Models\Suppliers;
use App\Repositories\Eloquent\EloquentRepository;

class SupplierEloquentRepository extends EloquentRepository implements SuppierRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Suppliers::class;
    }
}
