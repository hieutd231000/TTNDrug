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
}
