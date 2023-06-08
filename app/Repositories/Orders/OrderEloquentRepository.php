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
            ->select("products.product_name", "suppliers.email as supplier_email", "suppliers.phone as supplier_phone", "suppliers.name as supplier_name", "orders.*")
            ->where("orders.status", 0)
            ->get();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllOrder()
    {
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->select("suppliers.email as supplier_email", "suppliers.phone as supplier_phone", "suppliers.name as supplier_name", "orders.*")
            ->get();
        foreach ($listOrders as $listOrder) {
            $listOrderProducts = DB::table("order_products")
                ->join("products", "products.id", "=", "order_products.product_id")
                ->select("products.product_name", "order_products.*")
                ->where("order_products.order_id", $listOrder->id)
                ->get();
            $listOrder->list_product =  $listOrderProducts;
        }
        return $listOrders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllOrderCode()
    {
        return DB::table("orders")
            ->pluck("order_code");
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
