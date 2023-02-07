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
    <!-- jQuery -->
    <script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset("admin/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
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
    .help-block-modal{
        height: 10px;
        width: 100%;
        color: red;
        font-size: 14px;
        margin-bottom: 5px;
        margin-top: 2px;
    }
    .hidden {
        display: none;
    }
</style>
<body class="auth-layout">
<div class="container">
    @if(session("success"))
        <div class="alert alert-success">
            {{ session("success") }}
        </div>
    @elseif(session("failed"))
        <div class="alert alert-danger">
            {{ session("failed") }}
        </div>
    @endif
    <div class="card">
        <div class="card-container">
            <h5 class="title">
                <span class="title-e1">Dream Hospital</span>
                Quên mật khẩu ?
                <span class="title-e2">Nhập email của bạn</span>
            </h5>
            <div class="content">
                <form id="formAuthentication">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                        <div class="help-block hidden">
                            <p id="text-error"></p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="text-center mb-1">
                            <button type="submit" class="btn btn-sign-in">Reset mật khẩu</button>
                        </div>
                        <div class="text-center">
                            <a href="/admin/login">Đăng nhập?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="otp-confirm-form">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nhập mã OTP</h5>
                    </div>
                    <div class="modal-body" style="padding-top: 0 !important;">
{{--                        <p id="alert-txt"></p>--}}
                        <label for="otp"></label>
                        <input type="text" class="form-control" id="otp" name="otp" placeholder="Nhập mã OTP bạn nhận được" autofocus>
                        <div class="help-block-modal hidden">
                            <p id="text-error-otp-modal"></p>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: none !important;">
                        <button type="button" id="resetDataModal" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#formAuthentication').submit(function (e) {
            // showLoading();
            var formData = {
                email : $('#email').val(),
                _token: "{{ csrf_token() }}",
            };

            $.ajax({
                type: "POST",
                url : "{{url('/admin/forgot-password')}}",
                data : formData,
                dataType : "json",
                encode: true,
                success: function( result ) {
                    // When AJAX call has success
                    $('#text-error').text("");
                    $('.help-block').addClass("hidden");
                    var myModal = new bootstrap.Modal(document.getElementById('otpModal'), {
                        keyboard: false,
                        backdrop:'static'
                    });
                    myModal.show();
                },
                error: function(result) {
                    // When AJAX call has failed
                    if(result.status === 422) {
                        $('#text-error').text(result.responseJSON.errors["email"]);
                        $('.help-block').removeClass("hidden");
                    } else {
                        $('#text-error').text("Reset password fail")
                    }
                },
            });
            e.preventDefault(e);
        });

        $('#otp-confirm-form').submit(function (e) {
            var formData = {
                email : $('#email').val(),
                otp : $('#otp').val(),
                _token: "{{ csrf_token() }}",
            };

            $.ajax({
                type: "POST",
                url : "{{url('/admin/confirm-otp')}}",
                data : formData,
                dataType : "json",
                encode: true,
                success: function( result ) {
                    window.location.href = "{{url('/admin/reset-password?token_=')}}"+""+result.data;
                },
                error: function(result) {
                    $('.help-block-modal').removeClass("hidden");
                    $('#text-error-otp-modal').text(result.responseJSON.message);
                },
            });
            e.preventDefault(e);
        })

        $( "#resetDataModal" ).click(function() {
            $('.help-block-modal').addClass("hidden");
            $('#otp').val("");
            $('#text-error-otp-modal').text("");
        });
    });

    /**
     * Hidden alert
     */
    $(document).ready(function(){
        $('.alert').fadeIn().delay(1500).fadeOut();
    });
</script>
</body>
</html>
