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

    public function getAllOrderByExpriedDate()
    {
        return DB::table("production_batches")
            ->join("products", "products.id", "=", "production_batches.product_id")
            ->select("products.product_name", "production_batches.*")
            ->orderBy("production_batches.expired_time", "DESC")
            ->paginate(8);
    }

    public function statusProductionBatch($expired_time) {
        $expireDates = explode(" ", $expired_time);
        $expireDate = explode("/", $expireDates[0]);
        $currentDate = explode("/", date("d/m/Y",time()));
        if(intval($expireDate[2]) < intval($currentDate[2])) {
            return 0;
        } else if(intval($expireDate[1]) < intval($currentDate[1])) {
            return 0;
        } else if(intval($expireDate[0]) <= intval($currentDate[0])) {
            return 0;
        } else {
            return 1;
        }
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
//            ->join("order_products", "order_products.production_batch_id", "=", "production_batches.id")
            ->select("production_batches.*")
//            ->groupBy('order_products.product_id')
            ->where("production_batches.product_id", $product_id)
            ->get();
    }

    /**
     * @param $production_batch_id
     * @return int
     */
    public function getAmountByProductionBatchId() {
        return DB::table("order_products")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("production_batches.production_batch_name", "order_products.production_batch_id", "order_products.product_id", DB::raw('SUM(order_products.amount) AS total_amount'))
            ->groupBy("order_products.production_batch_id", "order_products.product_id", "production_batches.production_batch_name")
            ->get();
    }
}
