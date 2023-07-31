<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoryRepositoryInterface;
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
    protected $categoryRepository;
    protected $userRepository;
    protected $supplierRepository;
    protected $orderRepository;
    protected $orderProductRepository;
    protected $orderReceivedRepository;
    protected $orderReceivedUserRepository;
    protected $productionBatchRepository;
    protected $response;

    public function __construct(CategoryRepositoryInterface $categoryRepository, OrderReceivedRepositoryInterface $orderReceivedRepository, OrderReceivedUsersRepositoryInterface $orderReceivedUsersRepository, UserRepositoryInterface $userRepository, ProductionBatchRepositoryInterface $productionBatchRepository, OrderRepositoryInterface $orderRepository, OrderProductRepositoryInterface $orderProductRepository, ProductRepositoryInterface $productRepository, SuppierRepositoryInterface $suppierRepository, ResponseHelper $response)
    {
        $this->categoryRepository = $categoryRepository;
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
        $countCurrentCategory = $this->categoryRepository->countCategory();
        $countCurrentSupplierProduct = $this->supplierRepository->countSupplierProduct();
        $countCurrentNewOrder = $this->orderRepository->countNewOrder();
        $countCurrentUser = $this->userRepository->countUser();
        $countCurrentAdmin = $this->userRepository->countAdmin();
        //Nguoi dung moi nhat, nha cung cap moi nhat
        $getLatestUser = $this->userRepository->getLatestUser();
        $getLatestSupplier = $this->supplierRepository->getLatestSupplier();
        //Thong ke
        $thkUser = $this->userRepository->thkUserByTime();
        $thkAdmin = $this->userRepository->thkAdminByTime();
        $thkSupplier = $this->userRepository->thkSupplierByTime();
        $thkProduct = $this->productRepository->thkProductByTime();
        $thkProductionBatch = $this->productionBatchRepository->thkProductBatchByTime();
        $thkProductionExBatch = $this->productionBatchRepository->thkProductExBatchByTime();
        //San pham
        $countCurrentProductionBatch = $this->productionBatchRepository->countProductionBatch();
        $countCurrentOutOfProduct = 0;
        $listOutOfProduct = $this->productRepository->getListOutOfStock();
        foreach ($listOutOfProduct as $outOfProduct) {
            if(!$outOfProduct->checkAmount)
                $countCurrentOutOfProduct ++;
        }
        $countCurrentExpiredProduct = 0;
        $listExpiredProduct = $this->productRepository->getListExpiredProductInventory();
        foreach ($listExpiredProduct as $expiredProduct) {
            if($expiredProduct->check_expired_time)
                $countCurrentExpiredProduct ++;
        }
        return view("admin.page.dashboard", [
            "countCurrentProduct" => $countCurrentProduct,
            "countCurrentCategory" => $countCurrentCategory,
            "countCurrentSupplier" => $countCurrentSupplier,
            "countCurrentSupplierProduct" => $countCurrentSupplierProduct,
            "countCurrentNewOrder" => $countCurrentNewOrder,
            "countCurrentUser" => $countCurrentUser,
            "countCurrentAdmin" => $countCurrentAdmin,

            "getLatestUser" => $getLatestUser,
            "getLatestSupplier" => $getLatestSupplier,

            "thkUser" => $thkUser,
            "thkAdmin" => $thkAdmin,
            "thkSupplier" => $thkSupplier,
            "thkProduct" => $thkProduct,
            "thkProductionBatch" => $thkProductionBatch,
            "thkProductionExBatch" => $thkProductionExBatch,

            "countCurrentProductionBatch" => $countCurrentProductionBatch,
            "countCurrentOutOfProduct" => $countCurrentOutOfProduct,
            "countCurrentExpiredProduct" => $countCurrentExpiredProduct,

        ]);
    }
}
