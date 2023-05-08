<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductRequest;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
use App\Repositories\Units\UnitRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
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

    /**
     * View list product
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $product = $this->productRepository->getAllItem(config("const.paginate"), "DESC");
        $rank = $product->firstItem();
        return view("admin.page.products.index", ['rank' => $rank , 'product' => $product]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addProductForm(Request $request)
    {
        $listName = $this->productRepository->getName();
        $category = $this->categoryRepository->getAll(config("const.paginate"), "DESC");
        $unit = $this->unitRepository->getAll(config("const.paginate"), "DESC");
        return view("admin.page.products.add", ['listName' => $listName, 'category' => $category, 'unit' => $unit]);
    }

    /**
     * Store new product
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function store(ProductRequest $request) {
        $file = $request->file("product_image");
        if($file->getClientOriginalExtension() != 'png' && $file->getClientOriginalExtension() != 'jpg') {
            return redirect()->back()->with('failed', trans("auth.add.failed"));
        }
        try {
            $fileName = $file->getClientOriginalName();
            //Insert to public
            $file->move(public_path("image/products"), $fileName);
            //Insert to db
            $data = $request->all();
            $data["product_image"] = $fileName;
            $this->productRepository->create($data);
            return redirect("admin/products")->with("success", trans("auth.add.success"));

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.add.failed"));
        }
    }

    /**
     * Edit supplier form
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function edit(Request $request, $id) {
        $product = $this->productRepository->find($id);
        $listName = $this->productRepository->getName();
        $category = $this->categoryRepository->getAll(config("const.paginate"), "DESC");
        $unit = $this->unitRepository->getAll(config("const.paginate"), "DESC");
        return view("admin.page.products.edit", ["product" => $product, 'listName' => $listName, 'category' => $category, 'unit' => $unit]);
    }

    /**
     * Handle edit user
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handleEdit(ProductEditRequest $request) {
        $product = $this->productRepository->find($request["id"]);
        $listName = $this->productRepository->getName();
        if(empty($product)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        } else if($product->product_name != $request["product_name"]) {
            foreach ($listName as $data) {
                if($data == $request["product_name"]) {
                    $invalid = ["Tên sản phảm này đã được sử dụng", $data];
                    return redirect()->back()->with("invalid", $invalid);
                }
            }
        }
        try {
            $file = $request->file("product_image");
            if(!$file) {
                if($request["current_image"] == $product->product_image) {
                    $data = $request->all();
                    $this->productRepository->update($data, $product->id);
                    return redirect("/admin/products")->with("success", trans("auth.edit.success"));
                }
            }
            if($file->getClientOriginalExtension() != 'png' && $file->getClientOriginalExtension() != 'jpg') {
                return redirect()->back()->with('failed', trans("auth.add.failed"));
            }
            $fileName = $file->getClientOriginalName();
            //Insert to public
            $file->move(public_path("image/products"), $fileName);
            //Update to db
            $data = $request->all();
            $data["product_image"] = $fileName;
            $this->productRepository->update($data, $product->id);
            return redirect("/admin/products")->with("success", trans("auth.edit.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect("/admin/products")->with("failed", trans("auth.edit.failed"));
        }
    }

    /**
     * Delete product
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        $data = $request->all();
        $product = $this->productRepository->find($data["id"]);
        if(empty($product)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->productRepository->delete($product->id);
            return redirect()->back()->with("success", trans("auth.delete.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.delete.failed"));
        }
    }

    /**
     * Get detail product
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function detail(Request $request) {
        $product = $this->productRepository->getItemById($request["id"]);
        if(empty($product)) {
            return $this->response->error(null, 500, 'Thất bại');
        }
        return $this->response->success($product, 200, 'Thành công');
    }
}
