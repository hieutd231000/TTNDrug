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
use Illuminate\Support\Facades\Log;

class InventoryController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $productionBatchRepository;
    protected $orderProductRepository;
    protected $response;

    public function __construct(ResponseHelper $response, OrderProductRepositoryInterface $orderProductRepository, ProductionBatchRepositoryInterface $productionBatchRepository, ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->productionBatchRepository = $productionBatchRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->response = $response;
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
        foreach ($listOutOfStock as $productOutOfStock) {
            $productOutOfStock->search_product_name = "sch_outofpro_" . $productOutOfStock->product_name;
        }
        return view("admin.page.inventories.outofstock", ["listOutOfStock" => $listOutOfStock]);
    }

    public function listExpiredProduct(Request $request) {
        $listExpiredProduct = $this->productRepository->getListExpiredProductInventory();
        $listNextExpiredProduct = $this->productRepository->getListNextExpiredProductInventory();
        return view("admin.page.inventories.expired", ["listExpiredProduct" => $listExpiredProduct, "listNextExpiredProduct" => $listNextExpiredProduct]);
    }

    public function orderedSuccess(Request $request) {
        try {
            foreach ($request->listProductObject as $product) {
                $this->orderProductRepository->orderedSuccess($product["product_name"], $product["production_batch_name"], $product["amount"]);
            }
            return $this->response->success(null, 200, 'Thanh toán đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thanh toán đơn hàng thất bại');
        }

    }
}
