<?php

namespace App\Repositories\SupplierProducts;

use App\Models\SupplierProducts;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class SupplierProductEloquentRepository extends EloquentRepository implements SupplierProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return SupplierProducts::class;
    }

    /**
     * Get product detail
     *
     * @param $product_id
     * @return array
     */
    public function getProductDetail($product_id) {
        $product = DB::table("products")
            ->where("id",$product_id)
            ->get();
        $myArray = [];
        array_push($myArray, $product[0]->product_name);
        $productDetail = DB::table("categories")
            ->where("id", $product[0]->category_id)
            ->get();
        array_push($myArray, $productDetail[0]->name);
        array_push($myArray, $product[0]->product_code);
        return $myArray;
    }

    /**
     * @param $supplier_id
     * @return \Illuminate\Support\Collection
     */
    public function listAllProductBySupplierId($supplier_id) {
        return DB::table("supplier_products")
            ->select("product_id")
            ->where("supplier_id", $supplier_id)
            ->get();
    }

    /**
     * @param $product_id
     * @param $supplier_id
     * @return int
     */
    public function deleteProductBySupplierID($product_id, $supplier_id) {
        return DB::table("supplier_products")
            ->where("product_id", $product_id)
            ->where("supplier_id", $supplier_id)
            ->delete();
    }
}
