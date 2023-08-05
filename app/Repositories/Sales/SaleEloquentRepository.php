<?php

namespace App\Repositories\Sales;

use App\Models\Sales;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class SaleEloquentRepository extends EloquentRepository implements SaleRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Sales::class;
    }

    /**
     * @return void
     */
    public function thkProductSaleByTime()
    {
        // Quy 1: 1->3, Quy 2: 4->6, Quy 3: 7->9, Quy 4: 10->12
        date_default_timezone_set('Europe/Isle_of_Man');
        $currentDate = date('Y-m-d', time());
        $currentDates = explode("-", $currentDate);
        $sales = DB::table("sales")
            ->select("sales.*", "products.id as product_id")
            ->join("products", "products.product_name", "=", "sales.product_name")
            ->get();
        $countProductSaleByTime = [];
        for($i = 0; $i < 10; $i ++) {
            $currentYear = (int)$currentDates[0] - $i;
            $countSaleQuy1 = []; $countSaleQuy2 = []; $countSaleQuy3 = []; $countSaleQuy4 = []; $countSaleYear = [];
            foreach ($sales as $sale) {
                $createDate = explode(" ", $sale->created_at);
                $createDays = explode("-", $createDate[0]);
                if($createDays[0] == $currentYear) {
                    if((int)$createDays[1] >= 1 && (int)$createDays[1] <= 3) {
                        if(!isset($countSaleQuy1[$sale->product_name])) {
                            $countSaleQuy1[$sale->product_name][0] = 0;
                            $countSaleQuy1[$sale->product_name][1] = 0;
                            $countSaleQuy1[$sale->product_name][2] = $sale->product_id;
                        }
                        if(!isset($countSaleYear[$sale->product_name])) {
                            $countSaleYear[$sale->product_name][0] = 0;
                            $countSaleYear[$sale->product_name][1] = 0;
                            $countSaleYear[$sale->product_name][2] = $sale->product_id;
                        }
                        $countSaleQuy1[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleQuy1[$sale->product_name][1] += (int)$sale->total_price;
                        $countSaleYear[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleYear[$sale->product_name][1] += (int)$sale->total_price;
                    } else if((int)$createDays[1] >= 4 && (int)$createDays[1] <= 6) {
                        if(!isset($countSaleQuy2[$sale->product_name])) {
                            $countSaleQuy2[$sale->product_name][0] = 0;
                            $countSaleQuy2[$sale->product_name][1] = 0;
                            $countSaleQuy2[$sale->product_name][2] = $sale->product_id;
                        }
                        if(!isset($countSaleYear[$sale->product_name])) {
                            $countSaleYear[$sale->product_name][0] = 0;
                            $countSaleYear[$sale->product_name][1] = 0;
                            $countSaleYear[$sale->product_name][2] = $sale->product_id;
                        }
                        $countSaleQuy2[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleQuy2[$sale->product_name][1] += (int)$sale->total_price;
                        $countSaleYear[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleYear[$sale->product_name][1] += (int)$sale->total_price;
                    } else if((int)$createDays[1] >= 7 && (int)$createDays[1] <= 9) {
                        if(!isset($countSaleQuy3[$sale->product_name])) {
                            $countSaleQuy3[$sale->product_name][0] = 0;
                            $countSaleQuy3[$sale->product_name][1] = 0;
                            $countSaleQuy3[$sale->product_name][2] = $sale->product_id;
                        }
                        if(!isset($countSaleYear[$sale->product_name])) {
                            $countSaleYear[$sale->product_name][0] = 0;
                            $countSaleYear[$sale->product_name][1] = 0;
                            $countSaleYear[$sale->product_name][2] = $sale->product_id;
                        }
                        $countSaleQuy3[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleQuy3[$sale->product_name][1] += (int)$sale->total_price;
                        $countSaleYear[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleYear[$sale->product_name][1] += (int)$sale->total_price;
                    } else if((int)$createDays[1] >= 10 && (int)$createDays[1] <= 12) {
                        if(!isset($countSaleQuy4[$sale->product_name])) {
                            $countSaleQuy4[$sale->product_name][0] = 0;
                            $countSaleQuy4[$sale->product_name][1] = 0;
                            $countSaleQuy4[$sale->product_name][2] = $sale->product_id;
                        }
                        if(!isset($countSaleYear[$sale->product_name])) {
                            $countSaleYear[$sale->product_name][0] = 0;
                            $countSaleYear[$sale->product_name][1] = 0;
                            $countSaleYear[$sale->product_name][2] = $sale->product_id;
                        }
                        $countSaleQuy4[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleQuy4[$sale->product_name][1] += (int)$sale->total_price;
                        $countSaleYear[$sale->product_name][0] += (int)$sale->amount;
                        $countSaleYear[$sale->product_name][1] += (int)$sale->total_price;
                    }
                }
            }
            array_push($countProductSaleByTime, ['currentYear' => strval($currentYear), 'getSaleByYear' => [$countSaleQuy1, $countSaleQuy2, $countSaleQuy3, $countSaleQuy4, $countSaleYear]]);
        }
        return $countProductSaleByTime;
    }

    public function thkSupplierByTime()
    {
        // Quy 1: 1->3, Quy 2: 4->6, Quy 3: 7->9, Quy 4: 10->12
        date_default_timezone_set('Europe/Isle_of_Man');
        $currentDate = date('Y-m-d', time());
        $currentDates = explode("-", $currentDate);
        $orders = DB::table("orders")
            ->select("orders.*", "suppliers.name as supplier_name")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->get();
        $countProductSuppierByTime = [];
        for($i = 0; $i < 10; $i ++) {
            $currentYear = (int)$currentDates[0] - $i;
            $countSaleQuy1 = []; $countSaleQuy2 = []; $countSaleQuy3 = []; $countSaleQuy4 = []; $countSaleYear = [];
            foreach ($orders as $order) {
                $createDate = explode(" ", $order->created_at);
                $createDays = explode("-", $createDate[0]);
                if($createDays[0] == $currentYear) {
                    if((int)$createDays[1] >= 1 && (int)$createDays[1] <= 3) {
                        if(!isset($countSaleQuy1[$order->supplier_name])) {
                            $countSaleQuy1[$order->supplier_name][0] = 0;
                            $countSaleQuy1[$order->supplier_name][1] = 0;
                            $countSaleQuy1[$order->supplier_name][2] = $order->supplier_id;
                        }
                        if(!isset($countSaleYear[$order->supplier_name])) {
                            $countSaleYear[$order->supplier_name][0] = 0;
                            $countSaleYear[$order->supplier_name][1] = 0;
                            $countSaleYear[$order->supplier_name][2] = $order->supplier_id;
                        }
                        $countSaleQuy1[$order->supplier_name][0] += 1;
                        $countSaleQuy1[$order->supplier_name][1] += (int)$order->price_order;
                        $countSaleYear[$order->supplier_name][0] += 1;
                        $countSaleYear[$order->supplier_name][1] += (int)$order->price_order;
                    } else if((int)$createDays[1] >= 4 && (int)$createDays[1] <= 6) {
                        if(!isset($countSaleQuy2[$order->supplier_name])) {
                            $countSaleQuy2[$order->supplier_name][0] = 0;
                            $countSaleQuy2[$order->supplier_name][1] = 0;
                            $countSaleQuy2[$order->supplier_name][2] = $order->supplier_id;
                        }
                        if(!isset($countSaleYear[$order->supplier_name])) {
                            $countSaleYear[$order->supplier_name][0] = 0;
                            $countSaleYear[$order->supplier_name][1] = 0;
                            $countSaleYear[$order->supplier_name][2] = $order->supplier_id;
                        }
                        $countSaleQuy2[$order->supplier_name][0] += 1;
                        $countSaleQuy2[$order->supplier_name][1] += (int)$order->price_order;
                        $countSaleYear[$order->supplier_name][0] += 1;
                        $countSaleYear[$order->supplier_name][1] += (int)$order->price_order;
                    } else if((int)$createDays[1] >= 7 && (int)$createDays[1] <= 9) {
                        if(!isset($countSaleQuy3[$order->supplier_name])) {
                            $countSaleQuy3[$order->supplier_name][0] = 0;
                            $countSaleQuy3[$order->supplier_name][1] = 0;
                            $countSaleQuy3[$order->supplier_name][2] = $order->supplier_id;
                        }
                        if(!isset($countSaleYear[$order->supplier_name])) {
                            $countSaleYear[$order->supplier_name][0] = 0;
                            $countSaleYear[$order->supplier_name][1] = 0;
                            $countSaleYear[$order->supplier_name][2] = $order->supplier_id;
                        }
                        $countSaleQuy3[$order->supplier_name][0] += 1;
                        $countSaleQuy3[$order->supplier_name][1] += (int)$order->price_order;
                        $countSaleYear[$order->supplier_name][0] += 1;
                        $countSaleYear[$order->supplier_name][1] += (int)$order->price_order;
                    } else if((int)$createDays[1] >= 10 && (int)$createDays[1] <= 12) {
                        if(!isset($countSaleQuy4[$order->supplier_name])) {
                            $countSaleQuy4[$order->supplier_name][0] = 0;
                            $countSaleQuy4[$order->supplier_name][1] = 0;
                            $countSaleQuy4[$order->supplier_name][2] = $order->supplier_id;
                        }
                        if(!isset($countSaleYear[$order->supplier_name])) {
                            $countSaleYear[$order->supplier_name][0] = 0;
                            $countSaleYear[$order->supplier_name][1] = 0;
                            $countSaleYear[$order->supplier_name][2] = $order->supplier_id;
                        }
                        $countSaleQuy4[$order->supplier_name][0] += 1;
                        $countSaleQuy4[$order->supplier_name][1] += (int)$order->price_order;
                        $countSaleYear[$order->supplier_name][0] += 1;
                        $countSaleYear[$order->supplier_name][1] += (int)$order->price_order;
                    }
                }
            }
            array_push($countProductSuppierByTime, ['currentYear' => strval($currentYear), 'getProductSupplierByYear' => [$countSaleQuy1, $countSaleQuy2, $countSaleQuy3, $countSaleQuy4, $countSaleYear]]);
        }
        return $countProductSuppierByTime;
    }
}
