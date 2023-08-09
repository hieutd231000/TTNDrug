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
        $listOrdersUnVerify = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->select("suppliers.email as supplier_email", "suppliers.phone as supplier_phone", "suppliers.name as supplier_name", "orders.*")
            ->where("orders.created_at", ">", "2023-00-00 00:00:00")
            ->where("orders.status", 0)
            ->orderBy("orders.id", "DESC")
            ->paginate(12);
        foreach ($listOrdersUnVerify as $listOrderUnVerify) {
            $listOrderProducts = DB::table("order_products")
                ->join("products", "products.id", "=", "order_products.product_id")
                ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
                ->select("products.product_name", "production_batches.production_batch_name", "order_products.*")
                ->where("order_products.order_id", $listOrderUnVerify->id)
                ->get();
            $listOrderUnVerify->list_product =  $listOrderProducts;
        }
        return $listOrdersUnVerify;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllOrder()
    {
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->select("suppliers.email as supplier_email", "suppliers.phone as supplier_phone", "suppliers.name as supplier_name", "orders.*")
            ->where("orders.created_at", ">", "2023-00-00 00:00:00")
            ->orderBy("orders.id", "DESC")
            ->paginate(35);
        foreach ($listOrders as $listOrder) {
            $listOrderProducts = DB::table("order_products")
                ->join("products", "products.id", "=", "order_products.product_id")
                ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
                ->select("products.product_name", "production_batches.production_batch_name",  "order_products.*")
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

    /**
     * @param $id
     * @return int
     */
    public function unConfirmOrder($id) {
        return DB::table("orders")
            ->where('id', $id)
            ->update(['status' => 0]);
    }

    /**
     * @param $id
     * @return int
     */
    public function receivedOrder($id) {
        return DB::table("orders")
            ->where('id', $id)
            ->update(['status' => 2]);
    }

    /**
     * @return int
     */
    public function countNewOrder() {
        return DB::table("orders")
            ->where('status', 0)
            ->orWhere('status', 1)
            ->get()
            ->count();
    }

    /**
     * @param $selectYear
     * @return void
     */
    public function getCost($selectYear) {
        $orders = DB::table("orders")
            ->select()
            ->get();
        $sumTotal = 0;
        foreach ($orders as $order) {
            if(!is_null($order->created_at)) {
                $orderTime = explode(" ", $order->created_at);
                $orderDate = explode("-", $orderTime[0]);
                if($orderDate[0] == $selectYear)
                    $sumTotal += (int) $order->price_order;
            }
        }
        return $sumTotal;
    }

    public function countOrder() {
        return DB::table("orders")
            ->count();
    }

    public function thkorderUnConfirm() {
        return DB::table("orders")
            ->where("status", 0)
            ->where("created_at", ">=", "2023-00-00 00:00:00")
            ->count();
    }
    public function thkorderEdConfirm() {
        return DB::table("orders")
            ->where("status", 1)
            ->where("created_at", ">=", "2023-00-00 00:00:00")
            ->count();
    }
    public function thkorderEdReceive() {
        return DB::table("orders")
            ->where("status", 2)
            ->where("created_at", ">=", "2023-00-00 00:00:00")
            ->count();
    }

    /**
     * @return void
     */
    public function thkExpenseByTime() {
        $currentYear = date("Y");
        $countExpenseByTime = [];
        $listOrder = DB::table("orders")
            ->select("id", "price_order", "created_at")
            ->get();
        for($i = 0; $i < 10; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listOrder as $order) {
                if(!is_null($order->created_at)) {
                    $getCreateTimes = explode(" ", $order->created_at);
                    $getCreateTime = explode("-", $getCreateTimes[0]);
                    if($getCreateTime[0] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += (int)$order->price_order;
                    }
                }
            }
            array_push($countExpenseByTime, ['currentYear' => strval((int)$currentYear - $i), 'countExpendByTime' => $countByMonth]);
        }
        return $countExpenseByTime;
    }
}
