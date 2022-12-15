<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/jqvmap/jqvmap.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("admin/dist/css/adminlte.min.css") }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/daterangepicker/daterangepicker.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/summernote/summernote-bs4.min.css") }}">
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
        font-size: 20px;
        text-transform: uppercase;
        border-left: 5px solid #01c0c8;
        margin: 0 0 15px;
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
        background: linear-gradient(60deg, #09b9ac, #7dd1c1) !important;
        color: #fff !important;
        cursor: pointer;
    }
    .btn-sign-up {
        background-color: #cbcdcf !important;
        color: #3a3a3a !important;
    }
</style>
<body class="auth-layout">
<div class="container">
    <div class="card">
        <div class="card-container">
            <h5 class="title">
                <span class="title-e1">Dream Hospital</span>
                Quên mật khẩu ?
                <span class="title-e2">Nhập email của bạn</span>
            </h5>
            <div class="content">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="mb-3">
                        <div class="text-center mb-1">
                            <a href="" class="btn btn-sign-in">Reset mật khẩu</a>
                        </div>
                        <div class="text-center">
                            <a href="/admin/login">Đăng nhập?</a>
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
