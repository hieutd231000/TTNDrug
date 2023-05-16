<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $supplierRepository;
    protected $response;

    public function __construct(ProductRepositoryInterface $productRepository, SuppierRepositoryInterface $suppierRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->supplierRepository = $suppierRepository;
        $this->response = $response;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listOrder(Request $request) {
        $listProduct = $this->productRepository->getAll(config("const.paginate"), "DESC");
        $listSupplier = $this->supplierRepository->getAll(config("const.paginate"), "DESC");
        return view("admin.page.orders.index", ['listProduct' => $listProduct, 'listSupplier' => $listSupplier]);
    }

    public function addOrderForm(Request $request) {
        return view("admin.page.orders.add");
    }
}
