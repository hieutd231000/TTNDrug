<?php

namespace App\Repositories\Units;

use App\Models\Units;
use App\Repositories\Eloquent\EloquentRepository;

class UnitEloquentRepository extends EloquentRepository implements UnitRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Units::class;
    }
}
