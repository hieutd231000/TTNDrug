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
        $users = $this->userRepository->getAll(config("const.paginate"), "DESC");
        foreach ($users as $user) {
            if($user["dob"] != null) {
                $date = explode("/", $user["dob"]);
                $user["yearBirth"] = (int)$date[2];
            }
        }
        return view("admin.page.users.index", ['users' => $users]);
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

    /**
     * Delete user
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        $data = $request->all();
        $user = $this->userRepository->find($data["id"]);
        if(empty($user)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $info = $this->infoRepository->getInfoUserId($user->id);
            if($info) {
                try {
                    $this->infoRepository->delete($info->id);
                } catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                    return redirect()->back()->with("failed", trans("auth.delete.failed"));
                }
            }
            $this->userRepository->delete($user->id);
            return redirect()->back()->with("success", trans("auth.delete.success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.delete.failed"));
        }
    }

    /**
     * Edit user
     *
     * @param Request $request
     * @param $id
     * @return void
     */
    public function edit(Request $request, $id) {
        $user = $this->userRepository->find($id);
        $info = $this->infoRepository->getInfoUserId($user->id);
        $listEmail = $this->userRepository->getEmail();
        if($info) {
            return view("admin.page.users.edit", ["user" => $user, 'listEmail' => $listEmail, 'info' => $info]);
        }
        return view("admin.page.users.edit", ["user" => $user, 'listEmail' => $listEmail]);
    }

    /**
     * Handle edit user
     *
     * @param Request $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function handleEdit(Request $request) {
        $user = $this->userRepository->find($request["id"]);
        if(empty($user)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        $data = $request->except(['fb', 'ig', 'twitter']);
        $data1 = $request->except(['firstname', 'lastname', 'dob', 'gender', 'role', 'phone', 'address', 'introduce', 'email', 'password']);
        try {
            $user = $this->userRepository->update($data, $user->id);
            if($data1["ig"] || $data1["fb"] || $data1["twitter"]) {
                $data1["user_id"] = $user["id"];
                try {
                    $this->infoRepository->update($data1, $user->id);
                } catch (\Exception $exception) {
                    Log::error($exception->getMessage());
                }
            }
            return $this->response->success($data, 200, 'Update thông tin người dùng thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Update thông tin người dùng thất bại');
        }
    }

    public function userProfile(Request $request) {
        return view("admin.page.users.profile");
    }

    public function userCalendar(Request $request) {
        return view("admin.page.users.calendar");
    }
}
