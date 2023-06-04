<?php
//
//namespace App\Http\Controllers\Admin;
//
//use App\Helpers\ResponseHelper;
//use App\Http\Controllers\Controller;
//use App\Http\Requests\UnitEditRequest;
//use App\Http\Requests\UnitRequest;
//use App\Repositories\Units\UnitRepositoryInterface;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Log;
//
//class UnitController extends Controller
//{
//    /**
//     * @var
//     */
//    protected $unitRepository;
//    protected $response;
//
//    public function __construct(UnitRepositoryInterface $unitRepository, ResponseHelper $response)
//    {
//        $this->unitRepository = $unitRepository;
//        $this->response = $response;
//    }
//
//    /**
//     * View list unit
//     *
//     * @param Request $request
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
//     */
//    public function index(Request $request)
//    {
//        $unit = $this->unitRepository->getAll(config("const.paginate"), "DESC");
//        $rank = $unit->firstItem();
//        return view("admin.page.units.index", ['rank' => $rank, 'unit' => $unit]);
//    }
//
//    /**
//     * Add new unit
//     *
//     * @param UnitRequest $request
//     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
//     */
//    public function store(UnitRequest $request)
//    {
//        $request->validated();
//        $data = $request->all();
//        try {
//            $this->unitRepository->create($data);
//            return $this->response->success($data, 200, 'Thêm đơn vị thành công');
//        } catch (\Exception $exception) {
//            Log::error($exception->getMessage());
//            return $this->response->error(null, 500, 'Thêm đơn vị thất bại');
//        }
//    }
//
//    /**
//     * Delete unit
//     *
//     * @param Request $request
//     * @return \Illuminate\Http\RedirectResponse
//     */
//    public function destroy(Request $request) {
//        $data = $request->all();
//        $unit = $this->unitRepository->find($data["id"]);
//        if(empty($unit)) {
//            return redirect()->back()->with("failed", trans("auth.empty"));
//        }
//        try {
//            $productNum = $this->unitRepository->checkProductByUnitId($unit->id);
//            if($productNum == 0) {
//                $this->unitRepository->delete($unit->id);
//                return redirect()->back()->with("success", trans("auth.delete.success"));
//            } else {
//                return redirect()->back()->with("failed", "Bạn không thể xoá vì tồn tại sản phẩm chứa đơn vị này");
//            }
//        } catch (\Exception $exception) {
//            Log::error($exception->getMessage());
//            return redirect()->back()->with("failed", trans("auth.delete.failed"));
//        }
//    }
//
//    /**
//     * Edit unit
//     *
//     * @param UnitEditRequest $request
//     * @return \App\Helpers\JsonResponse
//     */
//    public function edit(UnitEditRequest $request)
//    {
//        $request->validated();
//        $data = $request->all();
//        $unit = $this->unitRepository->find($data["id"]);
//        if(empty($unit)) {
//            return $this->response->notFound('Không tìm thấy đơn vị');
//        }
//        try {
//            $this->unitRepository->update($data, $data["id"]);
//            return $this->response->success($data, 200, 'Sửa đơn vị thành công');
//        } catch (\Exception $exception) {
//            Log::error($exception->getMessage());
//            return $this->response->error(null, 500, 'Sửa đơn vị thất bại');
//        }
//    }
//}
