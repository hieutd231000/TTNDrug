<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\OrderProducts\OrderProductRepositoryInterface;
use App\Repositories\Orders\OrderRepositoryInterface;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $supplierRepository;
    protected $orderRepository;
    protected $orderProductRepository;
    protected $productionBatchRepository;
    protected $response;

    public function __construct(ProductionBatchRepositoryInterface $productionBatchRepository, OrderRepositoryInterface $orderRepository, OrderProductRepositoryInterface $orderProductRepository, ProductRepositoryInterface $productRepository, SuppierRepositoryInterface $suppierRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->supplierRepository = $suppierRepository;
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->productionBatchRepository = $productionBatchRepository;
        $this->response = $response;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request, $id) {
        //List Order
        $listSupplier = $this->supplierRepository->listAll();
        if($id) {
            $listProductBySupplierId = $this->supplierRepository->getAllProductBySupplierId($id);
            foreach ($listProductBySupplierId as $productBySupplierId) {
                $productBySupplierId[0]->production_batch_id = "production_batch_" . $productBySupplierId[0]->id;
                $productBySupplierId[0]->production_batch = $this->productionBatchRepository->getAllProductionBatchByProductId($productBySupplierId[0]->id);
            }
            $supplierDetail = $this->supplierRepository->find($id);
            return view("admin.page.orders.index", [
                'listSupplier' => $listSupplier,
                'supplierDetail' => $supplierDetail,
                'supplierDetailId' => $id,
                'listProductBySupplierId' => $listProductBySupplierId,
            ]);
        }
        return view("admin.page.orders.index", [
            'listSupplier' => $listSupplier,
            'supplierDetailId' => 0
        ]);
    }

    /**
     * Confirm order
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function confirmOrder(Request $request, $id) {
        $listOrderCode = $this->orderRepository->getAllOrderCode($id);
        $supplierDetail = $this->supplierRepository->find($id);
        return view("admin.page.orders.confirm", [
            'supplierDetail' => $supplierDetail,
            'listOrderCode' => $listOrderCode
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listOrder(Request $request) {
        //List Order
        $listProduct = $this->productRepository->getAll(config("const.paginate"), "DESC");
        $listSupplier = $this->supplierRepository->getAll(config("const.paginate"), "DESC");
//        $listProductNameBySupplierName = $this->supplierRepository->getAllProductNameBySupplierName();
//        $listSupplierName = $this->supplierRepository->getName();
        //List Order Verify
        $listOrderUnverified = $this->orderRepository->getOrderUnVerify();
        $listAllOrder = $this->orderRepository->getAllOrder();
        return view("admin.page.orders.list_order", [
            'listProduct' => $listProduct,
            'listSupplier' => $listSupplier,
//            'proNamebysupName' => $listProductNameBySupplierName,
//            'listSupplierName' => $listSupplierName,
            'listOrderUnverified' => $listOrderUnverified,
            'listAllOrder' => $listAllOrder,
            'rank' => 1,
            'rankOrder' => 1
        ]);
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function store(Request $request) {
        $orderData = $request->except(['listProduct']);
        $orderData["status"] = 0;
        $orderProductData = $request->only(['listProduct']);
        try {
            $newOrder = $this->orderRepository->create($orderData);
            if($newOrder->id) {
                foreach ($orderProductData["listProduct"] as $orderData) {
                    $orderData["product_id"] = $this->productRepository->nameToId($orderData["product_name"]);
                    $orderData["production_batch_id"] = $this->orderProductRepository->nameToId($orderData["production_batch_name"]);
                    $orderData["order_id"] = $newOrder->id;
                    unset($orderData["product_name"]);
                    $this->orderProductRepository->create($orderData);
                }
            }
            return $this->response->success(null, 200, 'Tạo đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Tạo đơn hàng thất bại');
        }
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function verifyOrder(Request $request) {
        $order = $this->orderRepository->find($request["id"]);
        if(empty($order)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->orderRepository->verifyOrder($order->id);
            return $this->response->success(null, 200, 'Xác nhận đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Xác nhận đơn hàng thất bại');
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function unConfirmOrder(Request $request) {
        $order = $this->orderRepository->find($request["id"]);
        if(empty($order)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->orderRepository->unConfirmOrder($order->id);
            return $this->response->success(null, 200, 'Huỷ xác nhận đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Huỷ xác nhận đơn hàng thất bại');
        }
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function receivedOrder(Request $request) {
        $order = $this->orderRepository->find($request["id"]);
        if(empty($order)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->orderRepository->receivedOrder($order->id);
            return $this->response->success(null, 200, 'Nhận đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Nhận đơn hàng thất bại');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function productionBatchIndex(Request $request) {
        $listProductionBatch = $this->productionBatchRepository->getAllOrderByExpriedDate();
        foreach ($listProductionBatch as $productionBatch) {
            $productionBatch->status = $this->productionBatchRepository->statusProductionBatch($productionBatch->expired_time);
        }
        $listAllProduct = $this->productRepository->listAll();
        $listProductionBatchName = $this->productionBatchRepository->getAllProductionBatchName();
        return view("admin.page.orders.production_batch", ["listProductionBatchName" => $listProductionBatchName, "listProductionBatch" => $listProductionBatch, "listAllProduct" => $listAllProduct]);
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function productionBatchIndexStore(Request $request) {
        try {
            $data = $request->all();
            $this->productionBatchRepository->create($data);
            return $this->response->success($data, 200, 'Thêm lô sản xuất thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thêm lô sản xuất thất bại');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function productionBatchIndexDestroy(Request $request) {
        $data = $request->all();
        $productionBatch = $this->productionBatchRepository->find($data["id"]);
        if(empty($productionBatch)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->productionBatchRepository->delete($productionBatch->id);
            return redirect()->back()->with("success", trans("auth.delete.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.delete.failed"));
        }
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function productionBatchIndexEdit(Request $request) {
        $data = $request->all();
        $productionBatch = $this->productionBatchRepository->find($data["id"]);
        if(empty($productionBatch)) {
            return $this->response->notFound('Không tìm thấy lô sản xuất');
        }
        try {
            $this->productionBatchRepository->update($data, $data["id"]);
            return $this->response->success($data, 200, 'Sửa thông tin lô sản xuất thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Sửa thông tin lô sản xuất thất bại');
        }
    }
}
