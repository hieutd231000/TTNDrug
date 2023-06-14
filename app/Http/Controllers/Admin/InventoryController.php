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

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request) {
        $listProduct = $this->productRepository->getListProductInInventory();
        return view("admin.page.inventories.index", ["listProductInventory" => $listProduct]);
    }

    public function listOutOfStock(Request $request) {

    }

    public function listExpiredProduct(Request $request) {
        $listExpiredProduct = $this->productRepository->getListExpiredProductInventory();
        return view("admin.page.inventories.expired", ["listExpiredProduct" => $listExpiredProduct]);
    }
}
