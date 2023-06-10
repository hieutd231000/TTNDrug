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
}
