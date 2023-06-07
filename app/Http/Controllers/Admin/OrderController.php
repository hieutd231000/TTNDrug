<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Orders\OrderRepositoryInterface;
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
    protected $response;

    public function __construct(OrderRepositoryInterface $orderRepository, ProductRepositoryInterface $productRepository, SuppierRepositoryInterface $suppierRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->supplierRepository = $suppierRepository;
        $this->orderRepository = $orderRepository;
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
            $supplierDetail = $this->supplierRepository->find($id);
            return view("admin.page.orders.index", [
                'listSupplier' => $listSupplier,
                'supplierDetail' => $supplierDetail,
                'listProductBySupplierId' => $listProductBySupplierId
            ]);
        }
        return view("admin.page.orders.index", [
            'listSupplier' => $listSupplier,
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
        $listSupplier = $this->supplierRepository->listAll();
        $listProductBySupplierId = $this->supplierRepository->getAllProductBySupplierId($id);
        $supplierDetail = $this->supplierRepository->find($id);
        return view("admin.page.orders.confirm", [
            'listSupplier' => $listSupplier,
            'supplierDetail' => $supplierDetail,
            'listProductBySupplierId' => $listProductBySupplierId
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
        $listProductNameBySupplierName = $this->supplierRepository->getAllProductNameBySupplierName();
        $listSupplierName = $this->supplierRepository->getName();
        //List Order Verify
        $listOrderUnverified = $this->orderRepository->getOrderUnVerify();
        $listAllOrder = $this->orderRepository->getAllOrder();
        return view("admin.page.orders.list_order", [
            'listProduct' => $listProduct,
            'listSupplier' => $listSupplier,
            'proNamebysupName' => $listProductNameBySupplierName,
            'listSupplierName' => $listSupplierName,
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
        $data = $request->only(['amount', 'detail', 'order_date']);
        $data["product_id"] = $this->productRepository->nameToId($request["product"]);
        $data["supplier_id"] = $this->supplierRepository->nameToId($request["supplier"]);
        $data["status"] = 0;
        try {
            $this->orderRepository->create($data);
            return $this->response->success($data, 200, 'Tạo đơn hàng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Tạo đơn hàng thất bại');
        }
    }

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
}
