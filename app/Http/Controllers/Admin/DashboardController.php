<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Invoices\InvoiceRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductRepositoryInterface;
use App\Repositories\OrderReceived\OrderReceivedRepositoryInterface;
use App\Repositories\OrderReceivedUsers\OrderReceivedUsersRepositoryInterface;
use App\Repositories\Orders\OrderRepositoryInterface;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Sales\SaleRepositoryInterface;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
    protected $saleRepository;
    protected $invoiceRepository;
    protected $response;

    public function __construct(SaleRepositoryInterface $saleRepository, InvoiceRepositoryInterface  $invoiceRepository, CategoryRepositoryInterface $categoryRepository, OrderReceivedRepositoryInterface $orderReceivedRepository, OrderReceivedUsersRepositoryInterface $orderReceivedUsersRepository, UserRepositoryInterface $userRepository, ProductionBatchRepositoryInterface $productionBatchRepository, OrderRepositoryInterface $orderRepository, OrderProductRepositoryInterface $orderProductRepository, ProductRepositoryInterface $productRepository, SuppierRepositoryInterface $suppierRepository, ResponseHelper $response)
    {
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
        $this->saleRepository = $saleRepository;
        $this->invoiceRepository = $invoiceRepository;
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
        //User notification
//        $userNotification = $this->userRepository->getAllUserNotification();
////        dd($userNotification);
//        View::share("shareNotification", $userNotification);

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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Exception
     */
    public function sale(Request $request)
    {
        //I.Bao cao doanh thu
            $currentYear = date("Y");
            $preYear = strval((int)$currentYear - 1);
            $currentRevenue = $this->invoiceRepository->getRevenue($currentYear);
            $preRevenue = $this->invoiceRepository->getRevenue($preYear);
            if(!$preRevenue) {
                $rateRevenue = 100;
            }
            else $rateRevenue = ceil(($currentRevenue - $preRevenue ) / $preRevenue * 100);

            $currentCost = $this->orderRepository->getCost($currentYear);
            $preCost = $this->orderRepository->getCost($preYear);
            if(!$preCost) {
                $rateCost = 100;
            } else $rateCost = ceil(($currentCost - $preCost) / $preCost * 100);

            $currentProfit = $currentRevenue - $currentCost;
            $preProfit = $preRevenue - $preCost;
            if(!$preProfit) {
                if($currentProfit > 0)
                    $rateProfit = 100;
                else if($currentProfit < 0)
                    $rateProfit = -100;
                else $rateProfit = 0;
            } else if ($currentProfit > $preProfit) {
                $rateProfit = ceil(abs(($currentProfit - $preProfit) / $preProfit * 100));
            } else if ($currentProfit < $preProfit) {
                $rate = ceil(abs(($preProfit - $currentProfit) / $currentProfit * 100));
                $rateProfit = $rate - 2 * $rate;
            } else
                $rateProfit = 0;
            //Goal
            $goalCost = 1000000;
            if(!$currentProfit) {
                $rateGoal = -100;
            } else if ($goalCost > $currentProfit) {
                $rateGoal = ceil(($goalCost - $currentProfit) / $goalCost * 100) * (-1);
            } else if ($goalCost < $currentProfit) {
                $rateGoal = ceil(($currentProfit - $goalCost) / $goalCost * 100);
            } else $rateGoal = 0;

            //Lay doanh thu 10 nam
            $profit10y = $this->invoiceRepository->getProfitIn10Years();

            //Lay tat ca cac ngay trong 10 nam
            // 1. Lay ngay hien tai
            $interval = new \DateInterval('P1D');
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentDate = date('Y-m-d', time());
            $realEnd = new \DateTime($currentDate);
            $realEnd->add($interval);
            // 2. Lay tu ngay 10 nam truoc den ngay hien tai
            $currentDates = explode("-", $currentDate);
            $date10yAgo = strval((int)$currentDates[0] - 10)."-".$currentDates[1]."-".$currentDate[2];
            $realStart = new \DateTime($date10yAgo);
            $period = new \DatePeriod($realStart, $interval, $realEnd);
            // 3. Them vao array
            $arrayDayIn10Y = array();
            foreach($period as $date) {
                $arrayDayIn10Y[] = $date->format('Y-m-d');
            }
         //II. Thong ke don hang, san pham
            $orderUnConfirm = $this->orderRepository->thkorderUnConfirm();
            $orderEdConfirm = $this->orderRepository->thkorderEdConfirm();
            $orderEdReceive = $this->orderRepository->thkorderEdReceive();
            $thkOrder[0] = $orderUnConfirm;
            $thkOrder[1] = $orderEdConfirm;
            $thkOrder[2] = $orderEdReceive;
            //Chi phi theo nam
            $thkExpenseByTime = $this->orderRepository->thkExpenseByTime();
            //Thong ke san pham theo nam va theo quy
            $thkProductSaleByTime = $this->saleRepository->thkProductSaleByTime();
            //Thong ke nha cung cap theo nam va theo quy
            $thkSupplierByTime = $this->saleRepository->thkSupplierByTime();
        return view("admin.page.report.sale", [
            "currentRevenue" => $currentRevenue,
            "rateRevenue" => $rateRevenue,
            "currentCost" => $currentCost,
            "currentProfit" => $currentProfit,
            "rateCost" => $rateCost,
            "rateProfit" => $rateProfit,
            "goalCost" => $goalCost,
            "rateGoal" => $rateGoal,
            "profitByDayIn10Year" => $profit10y,
            "arrayDayIn10Year" => $arrayDayIn10Y,
            "thkOrder" => $thkOrder,
            "thkExpenseByTime" => $thkExpenseByTime,
            "thkProductSaleByTime" => $thkProductSaleByTime,
            "thkSupplierByTime" => $thkSupplierByTime
        ]);
    }

}
