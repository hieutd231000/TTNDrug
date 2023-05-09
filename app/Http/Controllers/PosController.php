<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Units\UnitRepositoryInterface;
use Illuminate\Http\Request;

class PosController extends Controller
{
    /**
     * @var
     */
    protected $productRepository;
    protected $categoryRepository;
    protected $unitRepository;
    protected $response;

    public function __construct(CategoryRepositoryInterface $categoryRepository, UnitRepositoryInterface $unitRepository, ProductRepositoryInterface $productRepository, ResponseHelper $response)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->unitRepository = $unitRepository;
        $this->response = $response;
    }
    public function index(Request $request) {
        $product = $this->productRepository->getAllItem(config("const.paginate"), "DESC");
        $rank = $product->firstItem();
        return view("user.pos.index", ['rank' => $rank , 'product' => $product]);
    }
}
