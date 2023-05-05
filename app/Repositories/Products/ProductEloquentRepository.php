<?php

namespace App\Repositories\Products;

use App\Models\Products;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Products::class;
    }

    /**
     * Get name
     *
     * @return \Illuminate\Support\Collection
     */
    public function getName()
    {
        return DB::table("products")
            ->pluck("product_name");
    }
}
