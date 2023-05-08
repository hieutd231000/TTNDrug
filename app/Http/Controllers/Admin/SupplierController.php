<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SupplierController extends Controller
{
    /**
     * @var
     */
    protected $supplierRepository;
    protected $response;


    public function __construct(SuppierRepositoryInterface $supplierRepository, ResponseHelper $response)
    {
        $this->supplierRepository = $supplierRepository;
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
        $supplier = $this->supplierRepository->getAll(config("const.paginate"), "DESC");
        return view("admin.page.suppliers.index", ['supplier' => $supplier]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addSupplierForm(Request $request)
    {
        $listEmail = $this->supplierRepository->getEmail();
        return view("admin.page.suppliers.add", ['listEmail' => $listEmail]);
    }

    /**
     * Store new supplier
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function store(Request $request) {
        try {
            $data = $request->all();
            $this->supplierRepository->create($data);
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
        $supplier = $this->supplierRepository->find($id);
        $listEmail = $this->supplierRepository->getEmail();
        return view("admin.page.suppliers.edit", ["supplier" => $supplier, 'listEmail' => $listEmail]);
    }

    /**
     * Handle edit user
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handleEdit(Request $request) {
        $supplier = $this->supplierRepository->find($request["id"]);
        if(empty($supplier)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $supplier = $this->supplierRepository->update($request->all(), $supplier->id);
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
        $supplier = $this->supplierRepository->find($data["id"]);
        if(empty($supplier)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $this->supplierRepository->delete($supplier->id);
            return redirect()->back()->with("success", trans("auth.delete.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.delete.failed"));
        }
    }
}