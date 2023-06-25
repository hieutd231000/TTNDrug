<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Inventories\InventoryRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductRepositoryInterface;
use App\Repositories\Orders\OrderRepositoryInterface;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $productionBatchRepository;

    public function __construct(ProductionBatchRepositoryInterface $productionBatchRepository, ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->productionBatchRepository = $productionBatchRepository;
    }

    public function index(Request $request) {
        $listProduct = $this->productRepository->getListProductInInventory();
        foreach ($listProduct as $product) {
            $product->expired_status = $this->productionBatchRepository->statusProductionBatch($product->expired_time);
            if((int)$product->amount < 10) {
                $product->out_of_status = 0;
            } else
                $product->out_of_status = 1;
        }
        return view("admin.page.inventories.index", ["listProductInventory" => $listProduct]);
    }

    public function listOutOfStock(Request $request) {
        $listOutOfStock = $this->productRepository->getListOutOfStock();
        return view("admin.page.inventories.outofstock", ["listOutOfStock" => $listOutOfStock]);
    }

    public function listExpiredProduct(Request $request) {
        $listExpiredProduct = $this->productRepository->getListExpiredProductInventory();
        $listNextExpiredProduct = $this->productRepository->getListNextExpiredProductInventory();
        return view("admin.page.inventories.expired", ["listExpiredProduct" => $listExpiredProduct, "listNextExpiredProduct" => $listNextExpiredProduct]);
    }
}
