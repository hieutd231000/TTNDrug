<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryEditRequest;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Categories\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;
    protected $response;


    public function __construct(CategoryRepositoryInterface $categoryRepository, ResponseHelper $response)
    {
        $this->categoryRepository = $categoryRepository;
        $this->response = $response;
    }

    /**
     * View list category
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $category = $this->categoryRepository->getAll(config("const.paginate"), "DESC");
        $rank = $category->firstItem();
        return view("admin.page.categories.index", ['rank' => $rank, 'category' => $category]);
    }

    /**
     * Add new category
     *
     * @param CategoryRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CategoryRequest $request)
    {
        $request->validated();
        $data = $request->all();
        try {
            $this->categoryRepository->create($data);
//            return redirect('/admin/categories')->with('success', trans("Thêm danh mục thành công"));
            return $this->response->success($data, 200, 'Thêm danh mục thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thêm danh mục thất bại');
        }
    }

    /**
     * Delete category
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        $data = $request->all();
        $category = $this->categoryRepository->find($data["id"]);
        if(empty($category)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->categoryRepository->delete($category->id);
            return redirect()->back()->with("success", trans("auth.delete.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.delete.failed"));
        }
    }

    /**
     * Edit category
     *
     * @param CategoryRequest $request
     * @return \App\Helpers\JsonResponse
     */
    public function edit(CategoryEditRequest $request)
    {
        $request->validated();
        $data = $request->all();
        $category = $this->categoryRepository->find($data["id"]);
        if(empty($category)) {
            return $this->response->notFound('Không tìm thấy danh mục');
        }
        try {
            $this->categoryRepository->update($data, $data["id"]);
//            return redirect('/admin/categories')->with('success', trans("Thêm danh mục thành công"));
            return $this->response->success($data, 200, 'Sửa danh mục thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Sửa danh mục thất bại');
        }
    }
}
