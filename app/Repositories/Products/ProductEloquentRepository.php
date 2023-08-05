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

    public function getProductNameByProductCode($product_code)
    {
        $product = DB::table('products')
            ->where("product_code", $product_code)
            ->first();
        return $product->product_name;
    }

    public function getProductCodeByProductId($id)
    {
        $product = DB::table('products')
            ->where("id", $id)
            ->first();
        return $product->product_code;
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

    public function getItemByName($name)
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS category_name')
            ->where('products.product_name', $name)
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
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y H:i:s', time());
        $currentDates = explode(" ", $date);
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->join("order_products", "order_products.order_id", "=", "orders.id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("products.product_name", "products.product_code", "categories.name as category_name", "suppliers.name as supplier_name", "orders.order_time", "orders.order_code", "production_batches.production_batch_name",
                        "order_products.amount", "order_products.price_amount as price", "production_batches.expired_time")
            ->where("orders.status", 2)
            ->where("order_products.amount", '>', 0)
//            ->orderBy("orders.order_time", "DESC")
            ->get();
        foreach ($listOrders as $listOrder) {
            $expiredTimes = explode(" ", $listOrder->expired_time);
            $currentDays = explode("/", $currentDates[0]);
            $expiredDays = explode("/", $expiredTimes[0]);
            //CheckCurrentDay
            if($expiredDays[2] > $currentDays[2]) {
                $listOrder->check_expired_time = 0;
            } else if($expiredDays[2] == $currentDays[2]) {
                if($expiredDays[1] > $currentDays[1]) {
                    $listOrder->check_expired_time = 0;
                } else if($expiredDays[1] == $currentDays[1]) {
                    if($expiredDays[0] > $currentDays[0]) {
                        $listOrder->check_expired_time = 0;
                    } else if($expiredDays[0] == $currentDays[0]) {
                        $listOrder->check_expired_time = 1;
                    } else {
                        $listOrder->check_expired_time = 1;
                    }
                } else {
                    $listOrder->check_expired_time = 1;
                }
            } else {
                $listOrder->check_expired_time = 1;
            }
        }
        return $listOrders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListExpiredProductInventory()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y H:i:s', time());
        $currentDates = explode(" ", $date);
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->join("order_products", "order_products.order_id", "=", "orders.id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("products.product_name", "products.product_code", "categories.name as category_name", "suppliers.name as supplier_name", "orders.order_time", "orders.order_code", "production_batches.production_batch_name",
                "order_products.amount", "order_products.price_amount as price", "production_batches.expired_time")
//            ->where("production_batches.expired_time", "<=", $date)
            ->where("orders.status", 2)
            ->where("order_products.amount", '>', 0)
            ->orderBy("production_batches.expired_time", "DESC")
            ->get();
        foreach ($listOrders as $listOrder) {
            $expiredTimes = explode(" ", $listOrder->expired_time);
            $currentDays = explode("/", $currentDates[0]);
            $expiredDays = explode("/", $expiredTimes[0]);
            //CheckCurrentDay
            if($expiredDays[2] > $currentDays[2]) {
                $listOrder->check_expired_time = 0;
            } else if($expiredDays[2] == $currentDays[2]) {
                if($expiredDays[1] > $currentDays[1]) {
                    $listOrder->check_expired_time = 0;
                } else if($expiredDays[1] == $currentDays[1]) {
                    if($expiredDays[0] > $currentDays[0]) {
                        $listOrder->check_expired_time = 0;
                    } else if($expiredDays[0] == $currentDays[0]) {
                        $listOrder->check_expired_time = 1;
                    } else {
                        $listOrder->check_expired_time = 1;
                    }
                } else {
                    $listOrder->check_expired_time = 1;
                }
            } else {
                $listOrder->check_expired_time = 1;
            }
        }
        return $listOrders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListNextExpiredProductInventory()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('d/m/Y H:i:s', time());
        $currentDates = explode(" ", $date);
        $days = explode("/", $currentDates[0]);
        if($days[1] != "12") {
            if($days[1] == "09" || $days[1] == "10" || $days[1] == "11")
                $days[1] =(string)((int)$days[1] + 1);
            else
                $days[1] = "0".((string)((int)$days[1] + 1));
        } else {
            $days[1] = "01";
            $days[2] = (string)((int)$days[2] + 1);
        }
        $nextDate = $days[0] . "/" . $days[1] . "/". $days[2];
        $listOrders = DB::table("orders")
            ->join("suppliers", "suppliers.id", "=", "orders.supplier_id")
            ->join("order_products", "order_products.order_id", "=", "orders.id")
            ->join("products", "products.id", "=", "order_products.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("production_batches", "production_batches.id", "=", "order_products.production_batch_id")
            ->select("products.product_name", "products.product_code", "categories.name as category_name", "suppliers.name as supplier_name", "orders.order_time", "orders.order_code", "production_batches.production_batch_name",
                "order_products.amount", "order_products.price_amount as price", "production_batches.expired_time")
//            ->whereTime("production_batches.expired_time", "<=", $nextDate)
//            ->whereTime("production_batches.expired_time", ">=", $date)
            ->where("orders.status", 2)
            ->where("order_products.amount", '>', 0)
            ->orderBy("production_batches.expired_time", "DESC")
            ->get();
        foreach ($listOrders as $listOrder) {
            $expiredTimes = explode(" ", $listOrder->expired_time);
            // dd($currentDates[0]);
            // dd($nextDate);
            // dd($expiredTimes[0]);
            $currentDays = explode("/", $currentDates[0]);
            $expiredDays = explode("/", $expiredTimes[0]);
            $nextDays = explode("/", $nextDate);

            //CheckCurrentDay
            if($expiredDays[2] > $currentDays[2]) {
                //CheckNextDay
                if($expiredDays[2] < $nextDays[2]) {
                    $listOrder->check_next_expired_time = 0;
                } else if($expiredDays[2] == $nextDays[2]) {
                    if($expiredDays[1] < $nextDays[1]) {
                        $listOrder->check_next_expired_time = 0;
                    } else if($expiredDays[1] == $nextDays[1]) {
                        if($expiredDays[0] < $nextDays[0]) {
                            $listOrder->check_next_expired_time = 0;
                        } else if($expiredDays[0] == $nextDays[0]) {
                            $listOrder->check_next_expired_time = 1;
                        } else {
                            $listOrder->check_next_expired_time = 1;
                        }
                    } else {
                        $listOrder->check_next_expired_time = 1;
                    }
                } else {
                    $listOrder->check_next_expired_time = 1;
                }
                //EndCheckNextDay
            } else if($expiredDays[2] == $currentDays[2]) {
                if($expiredDays[1] > $currentDays[1]) {
                    //CheckNextDay
                    if($expiredDays[2] < $nextDays[2]) {
                        $listOrder->check_next_expired_time = 0;
                    } else if($expiredDays[2] == $nextDays[2]) {
                        if($expiredDays[1] < $nextDays[1]) {
                            $listOrder->check_next_expired_time = 0;
                        } else if($expiredDays[1] == $nextDays[1]) {
                            if($expiredDays[0] < $nextDays[0]) {
                                $listOrder->check_next_expired_time = 0;
                            } else if($expiredDays[0] == $nextDays[0]) {
                                $listOrder->check_next_expired_time = 1;
                            } else {
                                $listOrder->check_next_expired_time = 1;
                            }
                        } else {
                            $listOrder->check_next_expired_time = 1;
                        }
                    } else {
                        $listOrder->check_next_expired_time = 1;
                    }
                    //EndCheckNextDay
                } else if($expiredDays[1] == $currentDays[1]) {
                    if($expiredDays[0] > $currentDays[0]) {
                        //CheckNextDay
                        if($expiredDays[2] < $nextDays[2]) {
                            $listOrder->check_next_expired_time = 0;
                        } else if($expiredDays[2] == $nextDays[2]) {
                            if($expiredDays[1] < $nextDays[1]) {
                                $listOrder->check_next_expired_time = 0;
                            } else if($expiredDays[1] == $nextDays[1]) {
                                if($expiredDays[0] < $nextDays[0]) {
                                    $listOrder->check_next_expired_time = 0;
                                } else if($expiredDays[0] == $nextDays[0]) {
                                    $listOrder->check_next_expired_time = 1;
                                } else {
                                    $listOrder->check_next_expired_time = 1;
                                }
                            } else {
                                $listOrder->check_next_expired_time = 1;
                            }
                        } else {
                            $listOrder->check_next_expired_time = 1;
                        }
                        //EndCheckNextDay
                    } else if($expiredDays[0] == $currentDays[0]) {
                        $listOrder->check_next_expired_time = 1;
                    } else {
                        $listOrder->check_next_expired_time = 1;
                    }
                } else {
                    $listOrder->check_next_expired_time = 1;
                }
            } else {
                $listOrder->check_next_expired_time = 1;
            }
        }
        return $listOrders;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getListOutOfStock()
    {
        $listProduct = DB::table("products")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->select("categories.name as category_name", "products.*")
            ->get();
        foreach ($listProduct as $product) {
            $product->listSupplier = DB::table("supplier_products")
                ->join("suppliers", "suppliers.id", "=", "supplier_products.supplier_id")
                ->join("products", "products.id", "=", "supplier_products.product_id")
                ->select("suppliers.name as supplier_name", "supplier_products.*", "products.product_name")
                ->where("supplier_products.product_id", $product->id)
                ->get();
            $checkAmount = DB::table("order_products")
                ->join("orders", "orders.id", "=", "order_products.order_id")
                ->where("order_products.product_id", $product->id)
                ->where("orders.status", 2)
                ->get();
            if(count($checkAmount)) {
                $product->checkAmount = 1;
            } else {
                $product->checkAmount = 0;
            }
        }
        return $listProduct;
    }

    /**
     * @return int
     */
    public function countProduct() {
        return DB::table("products")
            ->get()
            ->count();
    }

    public function thkProductByTime() {
        $currentYear = date("Y");
        $countProductByTime = [];
        $listUser = DB::table("products")
            ->select("id", "created_at")
            ->get();
        for($i = 0; $i < 10; $i++) {
            $countByMonth = array_fill(0, 12, 0);
            foreach ($listUser as $user) {
                if(!is_null($user->created_at)) {
                    $getCreateTimes = explode(" ", $user->created_at);
                    $getCreateTime = explode("-", $getCreateTimes[0]);
                    if($getCreateTime[0] == strval((int)$currentYear - $i)) {
                        $countByMonth[(int)$getCreateTime[1] - 1] += 1;
                    }
                }
            }
            array_push($countProductByTime, ['currentYear' => strval((int)$currentYear - $i), 'countProductByTime' => $countByMonth]);
        }
        return $countProductByTime;
    }
}
