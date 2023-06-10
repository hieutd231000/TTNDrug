<?php

namespace App\Repositories\OrderProducts;

use App\Models\OrderProducts;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class OrderProductEloquentRepository extends EloquentRepository implements OrderProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return OrderProducts::class;
    }

    /**
     * @param $product_id
     * @return \Illuminate\Support\Collection
     */
    public function getImportPriceProductUpdated($product_id)
    {
        return DB::table("order_products")
            ->join("orders", "orders.id", "=", "order_products.order_id")
            ->select("order_products.id", "orders.order_time", "order_products.price_amount")
            ->where("product_id", $product_id)
            ->orderBy("id", "DESC")
            ->first();
    }

    /**
     * @param $product_id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getExportPriceProductUpdated($product_id)
    {
        return DB::table("export_prices")
            ->where("product_id", $product_id)
            ->orderBy("id", "DESC")
            ->first();
    }
}
