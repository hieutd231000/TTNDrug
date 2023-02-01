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
    .help-block{
        height: 10px;
        width: 100%;
        color: red;
        font-size: 14px;
        margin-bottom: 5px;
        margin-top: 2px;
    }
</style>
<body class="auth-layout">
    <div class="container">
        <div class="card">
            <div class="card-container">
                <h5 class="title">
                    <span class="title-e1">Dream Hospital</span>
                    Đăng nhập
                    <span class="title-e2">Đăng nhập để bắt đầu phiên làm việc của bạn</span>
                </h5>
                <div class="content">
                    <form action="{{ url("/admin/login") }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" name="email" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
                            @if ($errors->has('email'))
                                <div class="help-block">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu" aria-label="Password" aria-describedby="basic-addon1">
                            @if ($errors->has('password'))
                                <div class="help-block">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="help-block">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" id="remember_me" name="remember_me">
                            <label for="remember_me">Ghi nhớ cho lần đăng nhập tiếp theo</label>
                            <div class="text-center mb-1">
                                <button type="submit" class="btn btn-sign-in">Đăng nhập</button>
                                <a href="/admin/signup" class="btn btn-sign-up">Đăng ký</a>
                            </div>
                            <div class="text-center">
                                <a href="/admin/forgot-password">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</body>
</html>
