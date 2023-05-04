<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\SignupRequest;
use App\Mail\ResetPassword;
use App\Models\PasswordReset;
use App\Models\PasswordResetOtp;
use App\Models\User;
use App\Repositories\Users\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;
    protected $response;

    /**
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, ResponseHelper $response)
    {
        $this->userRepository = $userRepository;
        $this->response = $response;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function loginAdminForm(Request $request) {
        return view("auth.admin.login");
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function processAdminLogin(LoginRequest $request) {
        $request->validated();
        // dd($request['remember_me'])
        if (Auth::attempt(request(['email', 'password']))) {
            return redirect('/admin/dashboard');
        } else {
            return back()->with('error', trans("auth.login_failed"));;
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function processAdminLogout(Request $request) {
        auth()->logout();
        return redirect('/login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function signupAdminForm(Request $request) {
        return view("auth.admin.signup");
    }

    /**
     * @param SignupRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function processAdminSignup(SignupRequest $request)
    {
        $request->validated();

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        try {
            $this->userRepository->create($data);
            return redirect('/login')->with('success', trans("auth.signup_success"));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect('/signup')->with('error', trans("auth.signup_failed"));
        }
    }

    /**
     * View forgot password form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function forgotPasswordForm(Request $request) {
        return view("auth.admin.forgot_password");
    }

    /**
     * @param ForgotPasswordRequest $request
     * @return \App\Helpers\JsonResponse
     */
    public function postForgotPassword(ForgotPasswordRequest $request) {
        $email = $request['email'];
        $user = User::where('email', $email)->first();
        if($user === null) {
            return $this->response->unAuthenticated("Email không tồn tại");
        } else {
            try {
                $otp = rand(11111111, 99999999);
                $dataOtp = [
                    'email' => $email,
                    'otp' => $otp,
                    'expired_at' => Carbon::now()->addMinutes(2),
                ];
                DB::table('password_reset_otps')->insert($dataOtp);
                Mail::to($email)->send(new ResetPassword($user, $otp));
                return $this->response->success(null, 200, 'Chúng tôi đã gửi cho bạn mã otp để reset password');
            } catch (\Exception $e) {
                Log::error($e);
                return $this->response->error();
            }
        }
    }

    /**
     * @param Request $request
     * @return \App\Helpers\JsonResponse
     */
    public function confirmOtp(Request $request)
    {
        $now = Carbon::now();
        $email = $request['email'];
        if($request['otp'] === null) {
            return $this->response->error(null, 500, "Không được để trống trường này");
        }
        $otp =$request['otp'];
        $confirmOtp = PasswordResetOtp::where('email', $email)->where('otp', $otp)->where('expired_at', '>', $now)->first();
        if ($confirmOtp === null) {
            return $this->response->unAuthenticated('Otp không chính xác');
        } else {
            try {
                $token = Str::random(60);
                DB::table('password_resets')->insert([
                    'email' => $email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
                $confirmOtp->delete();
                return $this->response->success($token);
            } catch (\Exception $e) {
                Log::error($e);
                return $this->response->error();
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function resetPasswordForm(Request $request) {
        return view("auth.admin.reset_password");
    }

    /**
     * @param ResetPasswordRequest $request
     * @return \App\Helpers\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postResetPassword(ResetPasswordRequest $request)
    {
//        if (Auth::check()) {
//            return redirect()->back()->with('status', 'Logged');
//        }
        $token = $request["token_"];
        $resetToken = PasswordReset::where('token', $token)->first();
        if ($resetToken === null) {
            return redirect('/forgot-password')->with('failed', 'Mời bạn thử lại.');
        }
        if (Carbon::now() > Carbon::parse($resetToken->created_at)->addMinutes(720)) {
            return redirect('/forgot-password')->with('failed', 'Password reset token không hợp lệ.');
        }
        $user = User::where('email', $resetToken->email)->first();
        if ($user === null) {
            return redirect('/forgot-password')->with('failed', 'Tài khoản không tồn tài.');
        }
        try {
            $data['password'] = Hash::make($request['password']);
            DB::table("users")->update($data);
            return redirect('/login')->with('success', 'Đổi mật khẩu thành công.');
        } catch (\Exception $e) {
            Log::error($e);
            return $this->response->error();
        }
    }

    /**
     * Test reset password
     */
    public function resetPasswordFormInput(Request $request) {
        try {
            $data["password"] = Hash::make($request['password']);
            return redirect('/login')->with('success', 'Thanh cong');
        } catch (\Exception $e) {
            Log::error($e);
            return $this->response->error();
        }
    }

    public function handleResetPassword(Request $request, $id) {
        $user = User::where("id", $id);
        if(isset($user)) {
            return redirect()->back();
        } else {
            try {
                $data["name"] = $request->name;
            } catch (\Exception $e) {
                Log::error($e);
                return $this->response->error();
            }
        }
    }

    public function changePassword(Request $request) {
        dd($request->all());
    }

    /**
     * Test
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function loginForm(Request $request) {
        return response('Hello World', 200)->header('Content-Type', 'text/plain');
    }
 }
