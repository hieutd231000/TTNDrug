<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Infos\InfoRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;
    protected $infoRepository;
    protected $response;

    /**
     * @param UserRepositoryInterface $userRepository
     * @param InfoRepositoryInterface $infoRepository
     * @param ResponseHelper $response
     */
    public function __construct(UserRepositoryInterface $userRepository, InfoRepositoryInterface $infoRepository ,ResponseHelper $response)
    {
        $this->userRepository = $userRepository;
        $this->response = $response;
        $this->infoRepository = $infoRepository;
    }

    /**
     * View list user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request) {
        return view("admin.page.users.index");
    }

    /**
     * Add new user form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addUserForm(Request $request) {
        $listEmail = $this->userRepository->getEmail();
        return view("admin.page.users.add", ['listEmail' => $listEmail]);
    }

    /**
     * Store new user
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function store(Request $request) {
        $data = $request->except(['fb', 'ig', 'twitter']);
        $data['password'] = Hash::make($data['password']);
        $data1 = $request->except(['firstname', 'lastname', 'dob', 'gender', 'role', 'phone', 'address', 'introduce', 'email', 'password']);
        try {
            $user = $this->userRepository->create($data);
            if($data1["ig"] || $data1["fb"] || $data1["twitter"]) {
                $data1["user_id"] = $user["id"];
                try {
                    $this->infoRepository->create($data1);
                } catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }
            return $this->response->success($data, 200, 'Thêm người dùng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thêm người dùng thất bại');
        }
    }

    public function userProfile(Request $request) {
        return view("admin.page.users.profile");
    }

    public function userCalendar(Request $request) {
        return view("admin.page.users.calendar");
    }
}
