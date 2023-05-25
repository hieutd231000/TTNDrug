<?php

namespace App\Repositories\Orders;

use App\Models\Orders;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class OrderEloquentRepository extends EloquentRepository implements OrderRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Orders::class;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getOrderUnVerify()
    {
        return DB::table("orders")
            ->join("products", "products.id", "=", "orders.product_id")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->select("products.product_name", "products.price_unit", "suppliers.email as supplier_email", "suppliers.phone as supplier_phone", "suppliers.name as supplier_name", "orders.*")
            ->where("orders.status", 0)
            ->get();
    }

    /**
     * @param $id
     * @return int
     */
    public function verifyOrder($id) {
        return DB::table("orders")
            ->where('id', $id)
            ->update(['status' => 1]);
    }
}
