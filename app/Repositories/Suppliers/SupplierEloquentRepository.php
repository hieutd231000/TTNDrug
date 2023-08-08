<?php

namespace App\Repositories\Suppliers;

use App\Models\Suppliers;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class SupplierEloquentRepository extends EloquentRepository implements SuppierRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Suppliers::class;
    }

    /**
     * Get email
     *
     * @return \Illuminate\Support\Collection
     */
    public function getEmail()
    {
        return DB::table("suppliers")
            ->pluck("email");
    }

    /**
     * Get name
     *
     * @return \Illuminate\Support\Collection
     */
    public function getName()
    {
        return DB::table("suppliers")
            ->pluck("name");
    }

    /**
     * Count all product by supplier_id
     *
     * @param supplier_id $
     * @return int
     */
    public function countProduct($supplier_id)
    {
        return DB::table("supplier_products")
            ->where("supplier_id", $supplier_id)
            ->count();
    }

    /**
     * Get all product by supplier_id
     *
     * @param $supplier_id
     * @return \Illuminate\Support\Collection
     */
    public function getAllProductBySupplierId($supplier_id) {
        $listProductId = DB::table("supplier_products")
            ->where("supplier_id", $supplier_id)
            ->get();
        $myArray = [];
        for($i = 0; $i < count($listProductId); $i++) {
            $product = DB::table("products")
                ->where("id", $listProductId[$i]->product_id)
//                ->where("product_name", "like", '%'. $productSearch .'%')
                ->get();
            if(count($product)) {
                $categoryName = DB::table("categories")
                    ->select('categories.name AS category_name')
                    ->where("id", $product[0]->category_id)
                    ->get();
                $product[0]->category_name = $categoryName[0]->category_name;
                array_push($myArray, $product);
            }
        }
        usort($myArray, function($a, $b)
        {
            return strcmp($a[0]->product_name, $b[0]->product_name);
        });
        return $myArray;
    }
    public function getNotAllProductBySupplierId($supplier_id) {
        $listProductId = DB::table("supplier_products")
            ->select("product_id")
            ->where("supplier_id", $supplier_id)
            ->orderBy("product_id")
            ->get();
        $myArray = [];
        $product = DB::table("products")
            ->get();
        for($i = 0; $i < count($product); $i++) {
            for($k = 0; $i < count($listProductId); $k++) {
                $product = DB::table("products")
                    ->where("id", "!=", $listProductId[$i]->product_id)
                    ->get();
                if(count($product)) {
                    $categoryName = DB::table("categories")
                        ->select('categories.name AS category_name')
                        ->where("id", $product[0]->category_id)
                        ->get();
                    $product[0]->category_name = $categoryName[0]->category_name;
                    array_push($myArray, $product);
                }
            }
        }
        usort($myArray, function($a, $b)
        {
            return strcmp($a[0]->product_name, $b[0]->product_name);
        });
        return $myArray;
    }

    public function getAllSearchProductBySupplierId($supplier_id, $productSearch) {
        $listProductId = DB::table("supplier_products")
            ->where("supplier_id", $supplier_id)
            ->get();
        $myArray = [];
        for($i = 0; $i < count($listProductId); $i++) {
            $product = DB::table("products")
                ->where("id", $listProductId[$i]->product_id)
                ->where("product_name", "like", '%'. $productSearch .'%')
                ->get();
            if(count($product)) {
                $categoryName = DB::table("categories")
                    ->select('categories.name AS category_name')
                    ->where("id", $product[0]->category_id)
                    ->get();
                $product[0]->category_name = $categoryName[0]->category_name;
                array_push($myArray, $product);
            }
        }
        return $myArray;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAllProductNameBySupplierName() {
        return DB::table("suppliers")
            ->join("supplier_products", "suppliers.id", "=", "supplier_products.supplier_id")
            ->join("products", "products.id", "=", "supplier_products.product_id")
            ->select("suppliers.name AS supplier_name", "products.product_name")
            ->get();
    }

    public function getSupplierEmail($supplierName) {
        $supplier = DB::table('suppliers')
            ->where("name", $supplierName)
            ->first();
        return $supplier->email;
    }

    /**
     * @param $productName
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function nameToId($supplierName) {
        $supplier = DB::table('suppliers')
            ->where("name", $supplierName)
            ->first();
        return $supplier->id;
    }

    public function countSupplier() {
        return DB::table("suppliers")
            ->get()
            ->count();
    }

    public function countSupplierProduct() {
        return DB::table("supplier_products")
            ->get()
            ->count();
    }

    public function getLatestSupplier() {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentDate = date('Y-m-d', time());
        $suppliers = DB::table("suppliers")
            ->get();
        foreach ($suppliers as $supplier) {
            if(!is_null($supplier->created_at)) {
                $diff = strtotime($currentDate) - strtotime($supplier->created_at);
                $betweenDate = abs(round($diff / 86400));
                $supplier->countDayCreate = (int)$betweenDate;
            }
        }
        $suppliersArr = $suppliers->toArray();
        usort($suppliersArr, function($a, $b)
        {
            return (int)$a->countDayCreate > (int)$b->countDayCreate;
        });
        return collect($suppliersArr)->where("countDayCreate" , "<=", 31);
    }

}
