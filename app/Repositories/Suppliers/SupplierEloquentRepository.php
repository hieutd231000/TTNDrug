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
                ->get();
            array_push($myArray, $product);
        }
        return $myArray;
    }
}
