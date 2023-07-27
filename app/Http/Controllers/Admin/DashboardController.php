<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\OrderProducts\OrderProductRepositoryInterface;
use App\Repositories\OrderReceived\OrderReceivedRepositoryInterface;
use App\Repositories\OrderReceivedUsers\OrderReceivedUsersRepositoryInterface;
use App\Repositories\Orders\OrderRepositoryInterface;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $userRepository;
    protected $supplierRepository;
    protected $orderRepository;
    protected $orderProductRepository;
    protected $orderReceivedRepository;
    protected $orderReceivedUserRepository;
    protected $productionBatchRepository;
    protected $response;

    public function __construct(OrderReceivedRepositoryInterface $orderReceivedRepository, OrderReceivedUsersRepositoryInterface $orderReceivedUsersRepository, UserRepositoryInterface $userRepository, ProductionBatchRepositoryInterface $productionBatchRepository, OrderRepositoryInterface $orderRepository, OrderProductRepositoryInterface $orderProductRepository, ProductRepositoryInterface $productRepository, SuppierRepositoryInterface $suppierRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->supplierRepository = $suppierRepository;
        $this->orderRepository = $orderRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->orderReceivedRepository = $orderReceivedRepository;
        $this->orderReceivedUserRepository = $orderReceivedUsersRepository;
        $this->productionBatchRepository = $productionBatchRepository;
        $this->userRepository = $userRepository;
        $this->response = $response;
    }


    /**
     * View dashboard function
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard(Request $request)
    {
        $countCurrentProduct = $this->productRepository->countProduct();
        $countCurrentSupplier = $this->supplierRepository->countSupplier();
        $countCurrentNewOrder = $this->orderRepository->countNewOrder();
        $countCurrentUser = $this->userRepository->countUser();
        return view("admin.page.dashboard", [
            "countCurrentProduct" => $countCurrentProduct,
            "countCurrentSupplier" => $countCurrentSupplier,
            "countCurrentNewOrder" => $countCurrentNewOrder,
            "countCurrentUser" => $countCurrentUser,
        ]);
    }
}
