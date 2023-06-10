<?php

namespace App\Repositories\ExportPrices;

use App\Models\ExportPrices;
use App\Repositories\Eloquent\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExportPricesEloquentRepository extends EloquentRepository implements ExportPricesRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return ExportPrices::class;
    }

    /**
     * @param $product_id
     * @return mixed
     */
    public function getExportPriceProduct($product_id)
    {
        return DB::table("export_prices")
            ->join("products", "products.id", "=", "export_prices.product_id")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->select("products.product_name", "categories.name as category_name" ,"products.product_code", "export_prices.*")
            ->where("product_id", $product_id)
            ->orderBy("export_prices.id", "DESC")
            ->get();
    }
}
