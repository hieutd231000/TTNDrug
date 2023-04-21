<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Suppliers\SuppierRepositoryInterface;
use Illuminate\Http\Request;

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

    public function addSupplierForm(Request $request)
    {
        return view("admin.page.suppliers.add");
    }
}
