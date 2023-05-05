<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
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
     * View list supplier
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $product = $this->productRepository->getAll(config("const.paginate"), "DESC");
        return view("admin.page.products.index", ['product' => $product]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addSupplierForm(Request $request)
    {
        $listName = $this->productRepository->getName();
        $category = $this->categoryRepository->getAll(config("const.paginate"), "DESC");
        $unit = $this->unitRepository->getAll(config("const.paginate"), "DESC");
        return view("admin.page.products.add", ['listName' => $listName, 'category' => $category, 'unit' => $unit]);
    }

    /**
     * Store new supplier
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
//        dd($request->all());
        dd($request->file("product_image"));
        $file = $request->file("product_image");
        dd($file);
        dd($request->all());
        try {
            $data = $request->all();
            $this->productRepository->create($data);
            return $this->response->success($data, 200, 'Thêm nhà cung cấp thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thêm nhà cung cấp thất bại');
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
        $supplier = $this->productRepository->find($id);
        $listEmail = $this->productRepository->getEmail();
        return view("admin.page.suppliers.edit", ["supplier" => $supplier, 'listEmail' => $listEmail]);
    }

    /**
     * Handle edit user
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handleEdit(Request $request) {
        $supplier = $this->productRepository->find($request["id"]);
        if(empty($supplier)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $supplier = $this->productRepository->update($request->all(), $supplier->id);
            return $this->response->success($supplier, 200, 'Chỉnh sửa thông tin nhà cung cấp thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Chỉnh sửa thông tin nhà cung cấp thất bại');
        }
    }

    /**
     * Delete supplier
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        $data = $request->all();
        $supplier = $this->productRepository->find($data["id"]);
        if(empty($supplier)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->productRepository->delete($supplier->id);
            return redirect()->back()->with("success", trans("auth.delete.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.delete.failed"));
        }
    }
}
