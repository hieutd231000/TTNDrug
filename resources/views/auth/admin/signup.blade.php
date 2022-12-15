<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
</head>
<style>
    body{
        margin: 5% auto;
        background-image: url("https://thememakker.com/templates/swift/hospital/assets/images/bg-1.jpg");
        background-size: cover;
        background-position: top center;
        max-width: 360px;
        height: 100vh;
        overflow: hidden;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);
    }
    .card-container {
        margin-top: 20px;
    }
    .title {
        display: block;
        color: #01c0c8;
        font-weight: 700;
        font-size: 16px;
        text-transform: uppercase;
        border-left: 5px solid #01c0c8;
        margin: 0 0 25px;
        padding: 10px 0 10px 30px;
    }
    .title-e1 {
        display: block;
        font-size: 14px;
        font-weight: 400;
        color: #424242;
        margin-bottom: 5px;
    }
    .title-e2 {
        font-weight: 400;
        color: #757575;
        display: block;
        font-size: 14px;
        line-height: 18px;
        text-transform: none;
        margin-top: 10px;
    }
    .content {
        padding: 20px;
    }
    .btn-sign-in {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1);
        color: #fff !important;
        cursor: pointer;
    }
    .btn-sign-up {
        background-color: #cbcdcf;
        color: #3a3a3a !important;
    }
</style>
<body class="auth-layout">
<div class="container">
    <div class="card">
        <div class="card-container">
            <h5 class="title">
                <span class="title-e1">Dream Hospital</span>
                Đăng ký
                <span class="title-e2">Đăng ký thành viên mới</span>
            </h5>
            <div class="content">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <i class="fa-user-alt"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Họ và tên" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <i class="fa-user-alt"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Mật khẩu" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Xác nhận" aria-label="Password" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember">Tôi đã đọc và ghi nhớ <a href="">điều khoản.</a></label>
                        <div class="text-center mb-1">
                            <a href="/admin/login" class="btn btn-sign-in">Đăng ký</a>
                        </div>
                        <div class="text-center">
                            <a href="/admin/login">Bạn đã có tài khoản?</a>
                        </div>
                    </div>
                    {{--                        <div class="input-group icon before_span">--}}
                    {{--                            <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>--}}
                    {{--                            <div class="form-line">--}}
                    {{--                                <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="input-group icon before_span">--}}
                    {{--                            <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>--}}
                    {{--                            <div class="form-line">--}}
                    {{--                                <input type="password" class="form-control" name="password" placeholder="Password" required="">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                        <div>--}}
                    {{--                            <div class="">--}}
                    {{--                                <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">--}}
                    {{--                                <label for="rememberme">Remember Me</label>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="text-center">--}}
                    {{--                                <a href="index.html" class="btn btn-raised waves-effect g-bg-cyan">SIGN IN</a>--}}
                    {{--                                <a href="sign-up.html" class="btn btn-raised waves-effect">SIGN UP</a>--}}
                    {{--                            </div>--}}
                    {{--                            <div class="text-center"> <a href="forgot-password.html">Forgot Password?</a></div>--}}
                    {{--                        </div>--}}
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
