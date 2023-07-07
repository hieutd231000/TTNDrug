<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductEloquentRepository;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $orderProductRepository;
    protected $categoryRepository;
    protected $productionBatchRepository;
    protected $response;

    public function __construct(ProductionBatchRepositoryInterface $productionBatchRepository, CategoryRepositoryInterface $categoryRepository, OrderProductEloquentRepository $orderProductRepository, ProductRepositoryInterface $productRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->productionBatchRepository = $productionBatchRepository;
        $this->response = $response;
    }
    public function index(Request $request) {
        $products = $this->productRepository->getAllItem("DESC");
        foreach ($products as $product) {
            $productsPrice = $this->orderProductRepository->getExportPriceProductUpdated($product->id);
            if($productsPrice) {
                $product->current_price = $productsPrice->current_price;
            } else {
                $product->current_price = null;
            }
            $product->search_product_name = "pos_sch_" . $product->product_name;
            $product->production_batch = $this->productionBatchRepository->getAllProductionBatchByProductId($product->id);
            foreach ($product->production_batch as $production_batch) {
                $production_batch->expired_status = $this->productionBatchRepository->statusProductionBatch($production_batch->expired_time);
            }
        }
        $productionBatchAmount = $this->productionBatchRepository->getAmountByProductionBatchId();
//        dd($productionBatchAmount);
//        dd($products);
        return view("user.pos.index", ['rank' => 1 , 'products' => $products, 'productionBatchAmount' => $productionBatchAmount]);
    }
}
