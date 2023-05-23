<?php

namespace App\Repositories\Products;

use App\Models\Products;
use App\Repositories\Eloquent\EloquentRepository;
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
     * Get all product from products
     *
     * @return void
     */
    public function getAllItem($paginate, $orderBy)
    {
        return DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->select('products.*', 'categories.name AS category_name', 'units.name AS unit_name')
            ->orderBy('id', $orderBy)
            ->paginate($paginate);
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
            ->join('units', 'products.unit_id', '=', 'units.id')
            ->select('products.*', 'categories.name AS category_name', 'units.name AS unit_name')
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
}
