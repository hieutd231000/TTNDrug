<?php

namespace App\Repositories\Infos;

use App\Models\info;
use App\Repositories\Eloquent\EloquentRepository;

class InfoEloquentRepository extends EloquentRepository implements InfoRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return info::class;
    }
}
