<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\CustomerInvoices\CustomerInvoiceRepositoryInterface;
use App\Repositories\Customers\CustomerRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductEloquentRepository;
use App\Repositories\ProductionBatches\ProductionBatchRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;

class PosController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $orderProductRepository;
    protected $categoryRepository;
    protected $productionBatchRepository;
    protected $customerRepository;
    protected $customerInvoiceRepository;
    protected $response;

    public function __construct(CustomerRepositoryInterface $customerRepository, CustomerInvoiceRepositoryInterface $customerInvoiceRepository, ProductionBatchRepositoryInterface $productionBatchRepository, CategoryRepositoryInterface $categoryRepository, OrderProductEloquentRepository $orderProductRepository, ProductRepositoryInterface $productRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->productionBatchRepository = $productionBatchRepository;
        $this->customerRepository = $customerRepository;
        $this->customerInvoiceRepository = $customerInvoiceRepository;
        $this->response = $response;
    }
    public function index(Request $request) {
        $products = $this->productRepository->getAllItem("DESC");
        foreach ($products as $product) {
            $listExportPriceProduct = $this->orderProductRepository->getListExportPriceProduct($product->id);
            $productsPrice = $listExportPriceProduct[0];
            if($productsPrice) {
                $product->current_price = $productsPrice->current_price;
            } else {
                $product->current_price = null;
            }
            $product->production_batch = $this->productionBatchRepository->getAllProductionBatchByProductId($product->id);
            foreach ($product->production_batch as $production_batch) {
                $production_batch->expired_status = $this->productionBatchRepository->statusProductionBatch($production_batch->expired_time);
            }
        }
        $productionBatchAmount = $this->productionBatchRepository->getAmountByProductionBatchId();
        return view("user.pos.index", ['rank' => 1 , 'products' => $products, 'productionBatchAmount' => $productionBatchAmount]);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function search(Request $request) {
        if($request->ajax()) {
            $output = '';
            $products = $this->productRepository->searchProductByLike($request->valueSearch);
            foreach ($products as $product) {
                $listExportPriceProduct = $this->orderProductRepository->getListExportPriceProduct($product->id);
                $productsPrice = $listExportPriceProduct[0];
                if($productsPrice) {
                    $product->current_price = $productsPrice->current_price;
//                    $product->current_price_search = $productsPrice->current_price . "_" . $product->product_name;
                } else {
                    $product->current_price = null;
                }
                $product->production_batch = $this->productionBatchRepository->getAllProductionBatchByProductId($product->id);
                foreach ($product->production_batch as $production_batch) {
                    $production_batch->expired_status = $this->productionBatchRepository->statusProductionBatch($production_batch->expired_time);
                }
            }
            //Handle Search
            if($products) {
                foreach ($products as $key => $data) {
                    $output.= '<div class="card swiper-slide">
                                    <div class="image-content">
                                        <span class="overlay"></span>
                                        <div class="card-image">
                                            <img id="card-img" class="card-img" src="'. URL::asset('image/products').'/'.$data->product_image.'"/>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <input type="hidden" name="productId" value="'.$data->id.'">
                                        <input type="hidden" name="categoryName" value="'.$data->category_name.'">
                                        <input type="hidden" name="productCode" value="'.$data->product_code.'">
                                        <h4 class="productName">'.$data->product_name.'</h4>
                                        <select name="production_batch_selected" style="width: 60%; margin-top: 8px; height: 30px; margin-bottom: 6px;">
                                            <option value="" disabled selected>Lô sản xuất</option>';
                    $output2 = '';
                    foreach($data->production_batch as $key_production_batch => $data_production_batch){
                        if($data_production_batch->expired_status) {
                            $output2.= '<option value='.$data_production_batch->id.'>'.$data_production_batch->production_batch_name.'</option>';
                        }
                    };
                    $output2.='</select>';
                    if($data->current_price) {
                        $output2.= '<input type="hidden" name="currentPrice" value="'.$data->current_price.'">
                                    <p style="margin-bottom: 8px; color: red; font-weight: 600">Giá: '.$data->current_price.' VNĐ</p>
                                        <div style="display: flex">
                                            <input type="text" style="width: 70px; text-align: center; font-size: 14px" name="amount" placeholder="Nhập SL">
                                        </div>
                                    <button class="btn btn-success" onclick="addProductToCart(this)" style="margin-top: 10px; font-size: 14px">Thêm vào giỏ hàng</button>
                                    <p class="errNotification" style="color: red; height: 40px"></p>';
                    } else {
                        $output2.= '<span style="margin-bottom: 8px; color: red">Chưa cập nhật giá bán</span>';
                    }
                    $output2.= '    </div>
                                </div>';
                    $output.= $output2;
                }
                return $this->response->success($output, 200, 'Tìm kiếm thành công');
            }
            return $this->response->error(null, 500, 'Tìm kiếm thất bại');
        }
        return $this->response->error(null, 500, 'Tìm kiếm thất bại');
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function searchCustomer(Request $request) {
        $customer = $this->customerRepository->search($request["valueSearch"]);
        return $this->response->success($customer, 200, "Tìm kiếm khách hàng thành công");
    }

    /**
     * Add customer
     *
     * @param Request $request
     * @return void
     */
    public function addCustomer(Request $request) {
        try {
            $data = $request->all();
            $data["point"] = 0;
            $newCustomer = $this->customerRepository->create($data);
            return $this->response->success($newCustomer, 200, "Thêm khách hàng thành công");
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thêm khách hàng thất bại');
        }
    }

    /**
     * Edit customer
     *
     * @param Request $request
     * @return void
     */
    public function editCustomer(Request $request, $id) {
        try {
            if($id) {
                $data = $request->all();
                $this->customerRepository->update($data, $id);
                return $this->response->success(null, 200, "Cập nhật thông tin khách hàng thành công");
            }
            return $this->response->error(null, 500, 'Cập nhật thông tin khách hàng thất bại');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Cập nhật thông tin khách hàng thất bại');
        }
    }
}
