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
    public function listOrder(Request $request) {
        $listProduct = $this->productRepository->getAll(config("const.paginate"), "DESC");
        $listSupplier = $this->supplierRepository->getAll(config("const.paginate"), "DESC");
        $listProductNameBySupplierName = $this->supplierRepository->getAllProductNameBySupplierName();
        $listSupplierName = $this->supplierRepository->getName();
        return view("admin.page.orders.index", ['listProduct' => $listProduct, 'listSupplier' => $listSupplier, 'proNamebysupName' => $listProductNameBySupplierName, 'listSupplierName' => $listSupplierName]);
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
}
