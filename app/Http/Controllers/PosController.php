<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $categoryRepository;
    protected $response;

    public function __construct(CategoryRepositoryInterface $categoryRepository, ProductRepositoryInterface $productRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->response = $response;
    }
    public function index(Request $request) {
        $product = $this->productRepository->getAllItem("DESC");
        return view("user.pos.index", ['rank' => 1 , 'product' => $product]);
    }
}
