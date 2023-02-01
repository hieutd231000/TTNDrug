<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Repositories\Users\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function loginAdminForm(Request $request) {
        return view("auth.admin.login");
    }

    public function processAdminLogin(LoginRequest $request) {
        $request->validated();
        // dd($request['remember_me'])

        if (Auth::attempt(request(['email', 'password']))) {
            return redirect("/admin/dashboard");
        } else {
            return redirect("/admin/login")->with('error', trans("auth.login_failed"));;
        }
    }

    public function signupAdminForm(Request $request) {
        return view("auth.admin.signup");
    }

    public function processAdminSignup(SignupRequest $request)
    {
        $request->validated();

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        try {
            $this->userRepository->create($data);
            return redirect('/admin/login');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/admin/signup')->with('error', trans("auth.signup_failed"));
        }
    }

    public function forgotPasswordForm(Request $request) {
        return view("auth.admin.forgot_password");
    }


}
