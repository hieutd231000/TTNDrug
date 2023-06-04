<?php

namespace App\Repositories\Categories;

use App\Models\Categories;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Categories::class;
    }

    /**
     * @param $categoryId
     * @return \Illuminate\Support\Collection
     */
    public function checkProductByCategoryId($categoryId) {
        return DB::table("products")
            ->where("category_id", $categoryId)
            ->count();
    }
}
