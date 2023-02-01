<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                Đăng ký
                <span class="title-e2">Đăng ký thành viên mới</span>
            </h5>
            <div class="content">
                <form action="{{ url("/admin/signup") }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="username" placeholder="Họ và tên" aria-label="Username" aria-describedby="basic-addon1" value="{{old('username')}}">
                        @if ($errors->has('username'))
                            <div class="help-block">
                                {{ $errors->first('username') }}
                            </div>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" value="{{old('email')}}">
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
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận" aria-label="Password" aria-describedby="basic-addon1">
                        @if ($errors->has('password_confirmation'))
                            <div class="help-block mb-1">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="confirm_terms" name="confirm_terms">
                        <label for="confirm_terms" style="margin-bottom: 5px">Tôi đã đọc và ghi nhớ <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">điều khoản.</a></label>
                        @if ($errors->has('confirm_terms'))
                            <div class="help-block mb-3">
                                {{ $errors->first('confirm_terms') }}
                            </div>
                        @endif
                        <div class="text-center mb-1">
                            <button type="submit" class="btn btn-sign-in">Đăng ký</button>
                        </div>
                        <div class="text-center">
                            <a href="/admin/login">Bạn đã có tài khoản?</a>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">Điều khoản dịch vụ</h3>
                                </div>
                                <div class="modal-body">
                                    <p> 1. Chào mừng bạn đến với phần mềm quản lý tại Bệnh viện Dream Hospital. Vui lòng đọc kỹ các Điều Khoản Dịch Vụ sau đây trước khi tiếp tục truy cập hoặc sử dụng các dịch vụ của Phần mềm, để bạn biết được các quyền lợi và nghĩa vụ hợp pháp của mình liên quan đến bệnh viện Dream Hospital và các bên thứ ba có liên kết. </p>
                                    <p> 2. Bằng việc sử dụng các dịch vụ hoặc tiếp tục truy cập trang web, bạn cho biết rằng bạn chấp nhận, không rút lại, các điều khoản dịch vụ này. nếu bạn không đồng ý với các điều khoản này, vui lòng không sử dụng các dịch vụ của chúng tôi hay tiếp tục truy cập phần mềm.</p>
                                    <p> 3. Chúng tôi có quyền chỉnh sửa các Điều Khoản Dịch Vụ này vào bất kỳ lúc nào mà không cần thông báo cho người dùng. Việc bạn tiếp tục sử dụng Các Dịch Vụ, Phần mềm, hoặc Tài Khoản Của Bạn sẽ được xem là sự chấp nhận, không rút lại đối với các điều khoản chỉnh sửa đó.</p>
                                    <p> 4. Chúng tôi có quyền thay đổi, điều chỉnh, đình chỉ hoặc ngưng bất kỳ phần nào của Phần mềm này hoặc Các Dịch Vụ vào bất kỳ lúc nào. Chúng tôi có thể ra mắt Các Dịch Vụ nhất định hoặc các tính năng của chúng trong một phiên bản beta, phiên bản này có thể không hoạt động chính xác hoặc theo cùng cách như phiên bản cuối cùng, và chúng tôi sẽ không chịu trách nhiệm pháp lý trong các trường hợp đó. Chúng tôi cũng có thể toàn quyền áp dụng giới hạn đối với các tính năng nhất định hoặc hạn chế quyền truy cập của bạn đối với một phần hoặc toàn bộ Phần mềm hoặc Các Dịch Vụ mà không cần thông báo hoặc phải chịu trách nhiệm pháp lý.</p>
                                    <p> 5. Chúng tôi có quyền từ chối cho phép bạn truy cập Phần mềm hoặc Các Dịch Vụ vì bất kỳ lý do gì.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sign-in" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
