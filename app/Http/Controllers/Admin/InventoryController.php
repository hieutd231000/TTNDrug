<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Mail\RequestProduct;
use App\Models\Suppliers;
use App\Repositories\Inventories\InventoryRepositoryInterface;
use App\Repositories\Invoices\InvoiceRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductRepositoryInterface;
use App\Repositories\Orders\OrderRepositoryInterface;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Sales\SaleRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class InventoryController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $productionBatchRepository;
    protected $orderProductRepository;
    protected $supplierRepository;
    protected $saleRepository;
    protected $invoiceRepository;
    protected $response;

    public function __construct(SaleRepositoryInterface $saleRepository, InvoiceRepositoryInterface $invoiceRepository, SuppierRepositoryInterface $supplierRepository, ResponseHelper $response, OrderProductRepositoryInterface $orderProductRepository, ProductionBatchRepositoryInterface $productionBatchRepository, ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        $this->productionBatchRepository = $productionBatchRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->saleRepository = $saleRepository;
        $this->invoiceRepository = $invoiceRepository;
        $this->supplierRepository = $supplierRepository;
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
            $productOutOfStock->search_product_name = "sch_outofpro_" . strtolower($productOutOfStock->product_name);
        }
        return view("admin.page.inventories.outofstock", ["listOutOfStock" => $listOutOfStock]);
    }

    public function requestOutOfStock(Request $request) {
        $listRequest = $request->all();
        foreach ($listRequest["supplier_selected"] as $supplier_selected) {
            $supplier_email = $this->supplierRepository->getSupplierEmail($supplier_selected);
            $product_name = $this->productRepository->getProductNameByProductCode($listRequest["product_code"]);
            $suppliers = Suppliers::where('email', $supplier_email)->first();
            if($suppliers === null) {
                return $this->response->unAuthenticated("Email không tồn tại");
            } else {
                try {
                    Mail::to($supplier_email)->send(new RequestProduct($suppliers, $product_name, $listRequest["product_code"], $listRequest["amount"]));
                } catch (\Exception $e) {
                    Log::error($e);
                    return $this->response->error();
                }
            }
        }
        return $this->response->success(null, 200, 'Chúng tôi đã gửi cho bạn thông tin sản phẩm hiện hết hàng');
    }

    public function listExpiredProduct(Request $request) {
        $listExpiredProduct = $this->productRepository->getListExpiredProductInventory();
        $listNextExpiredProduct = $this->productRepository->getListNextExpiredProductInventory();
        return view("admin.page.inventories.expired", ["listExpiredProduct" => $listExpiredProduct, "listNextExpiredProduct" => $listNextExpiredProduct]);
    }

    public function orderedSuccess(Request $request) {
        try {
//            dd($request->all());
            $data1["money"] = $request["totalPrice"];
            $data1["method"] = $request["methodChose"];
            $data1["user_id"] = auth()->user()->id;
            $newInvoice = $this->invoiceRepository->create($data1);
            if($newInvoice->id) {
                foreach ($request->listProductObject as $product) {
                    $data2["product_name"] = $product["product_name"];
                    $data2["invoice_id"] = $newInvoice->id;
                    $data2["amount"] = $product["amount"];
                    $data2["price"] = $product["price"];
                    $data2["total_price"] = $product["total_price"];
                    $this->saleRepository->create($data2);
                    $this->orderProductRepository->orderedSuccess($product["product_name"], $product["production_batch_name"], $product["amount"]);
                }
                return $this->response->success(null, 200, 'Thanh toán đơn hàng thành công');
            }
            return $this->response->error(null, 500, 'Thanh toán đơn hàng thất bại');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thanh toán đơn hàng thất bại');
        }

    }
}
