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

    public function getListExportPriceProduct($product_id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date('Y-m-d', time());
        $exportPrices = DB::table("export_prices")
            ->select("export_prices.*", "products.product_name", "products.product_code", "categories.name as category_name")
            ->join("products", "products.id", "=", "export_prices.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->where("export_prices.product_id", $product_id)
            ->get();
        foreach ($exportPrices as $exportPrice) {
            if(!is_null($exportPrice->price_update_time)) {
                $priceUpdateTime = $exportPrice->price_update_time;
                $priceUpdateTimes = explode(" ", $priceUpdateTime);
                $priceUpdateDates = explode("/", $priceUpdateTimes[1]);
                $endDate = $priceUpdateDates[2]."-".$priceUpdateDates[1]."-".$priceUpdateDates[0]." ".$priceUpdateTimes[0];
                $diff = strtotime($currentDate) - strtotime($endDate);
                $betweenDate = abs(round($diff / 86400));
                $exportPrice->countUpdateDay = (int)$betweenDate;
                $exportPrice->price_update_time = $priceUpdateTimes[1]." ".$priceUpdateTimes[0];
            }
        }

        $exportsArr = $exportPrices->toArray();
        usort($exportsArr, function($a, $b)
        {
            if((int)$a->countUpdateDay == (int)$b->countUpdateDay)
                return (int)$a->id < (int)$b->id;
            return (int)$a->countUpdateDay > (int)$b->countUpdateDay;
        });
        return collect($exportsArr);
    }

    public function getListImportPriceProduct($product_id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date('Y-m-d', time());
        $importPrices = DB::table("order_products")
            ->select("order_products.price_amount as current_price", "order_products.amount", "products.product_name", "products.product_code", "categories.name as category_name", "orders.order_time")
            ->join("orders", "orders.id", "=", "order_products.order_id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->where("order_products.product_id", $product_id)
            ->get();
        foreach ($importPrices as $importPrice) {
            if(!is_null($importPrice->order_time)) {
                $priceUpdateTime = $importPrice->order_time;
                $priceUpdateTimes = explode(" ", $priceUpdateTime);
                $priceUpdateDates = explode("/", $priceUpdateTimes[0]);
                $endDate = $priceUpdateDates[2]."-".$priceUpdateDates[1]."-".$priceUpdateDates[0]." ".$priceUpdateTimes[1];
                $diff = strtotime($currentDate) - strtotime($endDate);
                $betweenDate = abs(round($diff / 86400));
                $importPrice->countUpdateDay = (int)$betweenDate;
            }
        }
        $importsArr = $importPrices->toArray();
        usort($importsArr, function($a, $b)
        {
            return (int)$a->countUpdateDay > (int)$b->countUpdateDay;
        });
        return collect($importsArr);
    }


    /**
     * Get import price product
     *
     * @param $product_id
     * @return \Illuminate\Support\Collection
     */
    public function getImportPriceProduct($product_id)
    {
        return DB::table("order_products")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("orders", "orders.id", "=", "order_products.order_id")
            ->select("products.product_name", "categories.name as category_name" ,"products.product_code", "order_products.*", "orders.order_time")
            ->where("product_id", $product_id)
            ->orderBy("order_products.id", "DESC")
            ->get();
    }

    /**
     * @param $productionBatchName
     * @return mixed
     */
    public function nameToId($productionBatchName) {
        $product = DB::table('production_batches')
            ->where("production_batch_name", $productionBatchName)
            ->first();
        return $product->id;
    }

    public function orderedSuccess($product_name, $production_batch_name, $amount) {
        $total = intval($amount);
        $listProductInventory = DB::table('order_products')
            ->select("order_products.*", "orders.order_code")
            ->join("orders", "orders.id", "=" ,"order_products.order_id")
            ->join("products", "products.id", "=" ,"order_products.product_id")
            ->join("production_batches", "production_batches.id", "=" ,"order_products.production_batch_id")
            ->where("orders.status", 2)
            ->where("products.product_name", $product_name)
            ->where("production_batches.production_batch_name", $production_batch_name)
            ->orderBy("orders.order_code", "ASC")
            ->get();
        foreach ($listProductInventory as $product) {
//            dd(intval($product->amount));
            if(intval($product->amount) > $total) {
                DB::table('order_products')
                    ->where('id', $product->id)
                    ->update(['amount' => intval($product->amount) - $total]);
                break;
            } else if(intval($product->amount) == $total) {
                DB::table('order_products')
                    ->where('id', $product->id)
                    ->delete();
                break;
            } else {
                $total = $total - intval($product->amount);
                DB::table('order_products')
                    ->where('id', $product->id)
                    ->delete();
            }
        }
    }
}
