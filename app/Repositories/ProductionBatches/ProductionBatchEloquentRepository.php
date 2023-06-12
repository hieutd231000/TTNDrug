<?php

namespace App\Repositories\ProductionBatches;

use App\Models\ProductionBatches;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ProductionBatchEloquentRepository extends EloquentRepository implements ProductionBatchRepositoryInterface
{
    public function getModel()
    {
        return ProductionBatches::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllProductionBatchName()
    {
        return DB::table("production_batches")
            ->pluck("production_batch_name");
    }

    /**
     * @param $product_id
     * @return \Illuminate\Support\Collection
     */
    public function getAllProductionBatchByProductId($product_id) {
        return DB::table("production_batches")
            ->where("product_id", $product_id)
            ->get();
    }
}
