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
            ->get();
    }

    public function statusProductionBatch($expired_time) {
        $expireDates = explode(" ", $expired_time);
        $expireDate = explode("/", $expireDates[0]);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y', time());
        $currentDate = explode("/", $date);
        if(intval($expireDate[2]) > intval($currentDate[2])) {
            return 1;
        } else if(intval($expireDate[2]) == intval($currentDate[2])) {
            if(intval($expireDate[1]) > intval($currentDate[1])) {
                return 1;
            } else if(intval($expireDate[1]) == intval($currentDate[1])) {
                if(intval($expireDate[0]) > intval($currentDate[0])) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 0;
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
            ->join("orders", "orders.id", "=", "order_products.order_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("production_batches.production_batch_name", "order_products.production_batch_id", "order_products.product_id", DB::raw('SUM(order_products.amount) AS total_amount'))
            ->groupBy("order_products.production_batch_id", "order_products.product_id", "production_batches.production_batch_name")
            ->where("orders.status", 2)
            ->get();
    }

    public function countProductionBatch() {
        return DB::table("production_batches")
            ->get()
            ->count();
    }

    /**
     * @return array
     */
    public function thkProductBatchByTime() {
        $currentYear = date("Y");
        $countItemByTime = [];
        $listItems = DB::table("production_batches")
            ->select("id", "created_at")
            ->get();
        for($i = 0; $i < 10; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listItems as $item) {
                if(!is_null($item->created_at)) {
                    $getCreateTimes = explode(" ", $item->created_at);
                    $getCreateTime = explode("-", $getCreateTimes[0]);
                    if($getCreateTime[0] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += 1;
                    }
                }
            }
            array_push($countItemByTime, ['currentYear' => strval((int)$currentYear - $i), 'countProductionBatchByTime' => $countByMonth]);
        }
        return $countItemByTime;
    }

    public function thkProductExBatchByTime() {
        $currentYear = date("Y");
        $countItemByTime = [];
        $listItems = DB::table("production_batches")
            ->select("id", "expired_time")
            ->get();
        for($i = 0; $i < 10; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listItems as $item) {
                if(!is_null($item->expired_time )) {
                    $getCreateTimes = explode(" ", $item->expired_time);
                    $getCreateTime = explode("/", $getCreateTimes[0]);
                    if($getCreateTime[2] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += 1;
                    }
                }
            }
            array_push($countItemByTime, ['currentYear' => strval((int)$currentYear - $i), 'countProductionBatchByTime' => $countByMonth]);
        }
        return $countItemByTime;
    }
}
