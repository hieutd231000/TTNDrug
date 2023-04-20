<?php

namespace App\Repositories\Categories;

use App\Models\Categories;
use App\Repositories\Eloquent\EloquentRepository;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Categories::class;
    }
}
