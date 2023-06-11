<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\OrderProducts\OrderProductEloquentRepository;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $orderProductRepository;
    protected $categoryRepository;
    protected $response;

    public function __construct(CategoryRepositoryInterface $categoryRepository, OrderProductEloquentRepository $orderProductRepository, ProductRepositoryInterface $productRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->orderProductRepository = $orderProductRepository;
        $this->response = $response;
    }
    public function index(Request $request) {
        $products = $this->productRepository->getAllItem("DESC");
        foreach ($products as $product) {
            $productsPrice = $this->orderProductRepository->getExportPriceProductUpdated($product->id);
            if($productsPrice) {
                $product->current_price = $productsPrice->current_price;
            } else {
                $product->current_price = null;
            }
        }
        return view("user.pos.index", ['rank' => 1 , 'products' => $products]);
    }
}
