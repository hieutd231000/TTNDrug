<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Repositories\Infos\InfoRepositoryInterface;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data["fullname"] = $request["firstname"]." ".$request["lastname"];
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
            return $this->response->success($data, 200, 'Thêm nhân viên thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Thêm nhân viên thất bại');
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
            return $this->response->success($data, 200, 'Chỉnh sửa thông tin nhân viên thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Chỉnh sửa thông tin nhân viên thất bại');
        }
    }

    /**
     * Handle edit profile info
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function handleEditInfo(Request $request) {
        $user = $this->userRepository->find($request["id"]);
        if(empty($user)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        try {
            $fullname = explode(" ", $request["name"]);
            $data["email"] = $request["email"];
            $data["gender"] = $request["gender"];
            $data["phone"] = $request["phone"];
            $data["firstname"] = $fullname[0];
            $data["lastname"] = "";
            for($i=1; $i<count($fullname); $i++) {
                $data["lastname"] = $data["lastname"] . $fullname[$i];
                if($i != count($fullname) - 1) {
                    $data["lastname"] = $data["lastname"] . " ";
                }
            }
            $userUpdate = $this->userRepository->update($data, $user->id);
            return $this->response->success($userUpdate, 200, 'Chỉnh sửa thành công');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return $this->response->error(null, 500, 'Chỉnh sửa thất bại');
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function handleUpdateAvatar(Request $request) {
        $user = $this->userRepository->find($request["user_id"]);
        if(empty($user)) {
            return redirect()->back()->with("failed", trans("auth.empty"));
        }
        $file = $request->file("avatar_image");
        if(!$file) {
            return redirect("/user-profile")->with("success", trans("auth.update.avatar.success"));
        }
        if($file->getClientOriginalExtension() != 'png' && $file->getClientOriginalExtension() != 'jpg') {
            return redirect()->back()->with('failed', trans("auth.update.avatar.failed"));
        }
        try {
            if($file) {
                $fileName = $file->getClientOriginalName();
                //Insert to public
                $file->move(public_path("image/avatars"), $fileName);
                //Update db
                $data["avatar"] = $fileName;
                $this->userRepository->update($data, $user->id);
            }
            return redirect("/user-profile")->with("success", trans("auth.update.avatar.success"));

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect()->back()->with("failed", trans("auth.update.avatar.failed"));
        }
    }

    /**
     * View profile user
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function userProfile(Request $request) {
        $listEmail = $this->userRepository->getEmail();
        $currentEmail = Auth::user()->email;
        return view("admin.page.users.profile", ['listEmail' => $listEmail, 'currentEmail' => $currentEmail]);
    }
}
