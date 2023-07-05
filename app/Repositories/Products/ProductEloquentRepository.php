<?php

namespace App\Repositories\Products;

use App\Models\Products;
use App\Repositories\Eloquent\EloquentRepository;
use http\Env\Request;
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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getProductCode()
    {
        return DB::table("products")
            ->pluck("product_code");
    }

    /**
     * Get all product from products
     *
     * @return void
     */
    public function getAllItem($orderBy)
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS category_name')
            ->orderBy('id', $orderBy)
            ->get();
    }

    /**
     * Get product by id
     *
     * @param $id
     * @return \Illuminate\Support\Collection
     */
    public function getItemById($id)
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS category_name')
            ->where('products.id', $id)
            ->get();
    }

    /**
     * @param $productName
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function nameToId($productName) {
        $product = DB::table('products')
            ->where("product_name", $productName)
            ->first();
        return $product->id;
    }

    /**
     * @param $productId
     * @return mixed
     */
    public function idToName($productId) {
        $product = DB::table('products')
            ->where("id", $productId)
            ->first();
        if($product)
            return $product->product_name;
        else return null;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllProductCode()
    {
        return DB::table("products")
            ->pluck("product_code");
    }

    /**
     * @param $productCode
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function productByProductCode($productCode)
    {
        return DB::table("products")
            ->where("product_code", $productCode)
            ->first();
    }

    public function getListProductInInventory()
    {
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->join("order_products", "order_products.order_id", "=", "orders.id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("products.product_name", "categories.name as category_name", "suppliers.name as supplier_name", "orders.order_time", "orders.order_code", "production_batches.production_batch_name",
                        "order_products.amount", "order_products.price_amount as price", "production_batches.expired_time")
            ->where("orders.status", 2)
            ->where("order_products.amount", '>', 0)
            ->orderBy("orders.order_time", "DESC")
            ->get();
        return $listOrders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListExpiredProductInventory()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y H:i:s', time());
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->join("order_products", "order_products.order_id", "=", "orders.id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("products.product_name", "categories.name as category_name", "suppliers.name as supplier_name", "orders.order_time", "orders.order_code", "production_batches.production_batch_name",
                "order_products.amount", "order_products.price_amount as price", "production_batches.expired_time")
            ->where("production_batches.expired_time", "<=", $date)
            ->where("orders.status", 2)
            ->where("order_products.amount", '>', 0)
            ->orderBy("production_batches.expired_time", "DESC")
            ->get();
        return $listOrders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListNextExpiredProductInventory()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y H:i:s', time());
        $dates = explode(" ", $date);
        $days = explode("/", $dates[0]);
        if($days[1] != "12") {
            if($days[1] == "09" || $days[1] == "10" || $days[1] == "11")
                $days[1] =(string)((int)$days[1] + 1);
            else
                $days[1] = "0".((string)((int)$days[1] + 1));
        } else {
            $days[1] = "01";
            $days[2] = (string)((int)$days[2] + 1);
        }
        $nextDate = $days[0] . "/" . $days[1] . "/". $days[2] . " " . $dates[1];
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->join("order_products", "order_products.order_id", "=", "orders.id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("products.product_name", "categories.name as category_name", "suppliers.name as supplier_name", "orders.order_time", "orders.order_code", "production_batches.production_batch_name",
                "order_products.amount", "order_products.price_amount as price", "production_batches.expired_time")
//            ->where("production_batches.expired_time", "<=", $nextDate)
            ->where("production_batches.expired_time", ">=", $date)
            ->where("orders.status", 2)
            ->where("order_products.amount", '>', 0)
            ->orderBy("production_batches.expired_time", "DESC")
            ->get();
        return $listOrders;
    }

    public function getListOutOfStock()
    {
        $listOutOfStock = DB::table("products")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->select("categories.name as category_name", "products.*")
            ->get();
        return $listOutOfStock;
    }
}
