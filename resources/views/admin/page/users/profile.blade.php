<style>
    .profile-image {
        padding: 50px 0px;
        text-align: center;
    }
    .profile-image>img {
        border-radius: 50%;
    }
    .profile-body {
        background: rgba(0,0,0,0) url("https://thememakker.com/templates/swift/hospital/assets/images/profile-bg.jpg") repeat scroll center center/cover;
    }
    .btn-message  {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1) !important;
        color: #fff !important;
        cursor: pointer;
    }
    .btn-cancel {
        background-color: #cbcdcf !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        color: #3a3a3a !important;
    }
    .m-t-10 {
        margin-top: 5px;
        margin-bottom: 3px;
    }
    .social-links>li {
        display: inline-block;
        margin: 0 5px;
    }
    .social-links>li>a {
        color: #ffffff !important;
    }
    .box-list>ul {
        padding: 0;
        display: inline-block;
        width: 100%;
        background-color: #f5f5f5;
    }
    .box-list>ul>li:first-child {
        border-left: 1px solid #e0e0e0;
    }
    .box-list>ul>li {
        float: left;
        border-right: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        list-style: none;
        width: 25%;
    }
    .box-list>ul>li:hover{
        background: linear-gradient(45deg, #49cdd0, #ab9ae5);
    }
    .box-list>ul>li:hover>a {
        color: #fff !important;
    }
    .box-list>ul>li>a {
        padding-top: 15px;
        display: block;
        color: #424242;
    }
    .card .header {
        padding: 20px 20px 0 20px;
    }
    .card .body {
        padding: 20px;
    }
    .list-skill {
        list-style: none;
        padding: 0;
    }
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }
    .nav-item {
        cursor: pointer;
    }
    .nav-tabs .nav-link {
        color: #9e9e9e !important;
    }
    .nav-tabs .nav-link.active {
        color: #495057 !important;
        border-color: #fff #fff #fff !important;
        border-bottom: 2px solid #ab9ae5 !important;
    }
    .tab-content {
        padding: 15px 0;
    }
    .no-resize {
        resize: none;
    }
    .form-group .form-line textarea {
        border: none !important;
        border-bottom: 1px solid #bdbdbd !important;
    }
    .form-group .form-line input {
        padding: 0 !important;
        border: none !important;
        border-bottom: 1px solid #bdbdbd !important;
    }
    .btn-custom {
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%);
    }
    .btn-white {
        padding: 8px !important;
    }
    .margin-bottom-15 {
        margin-bottom: 15px;
    }
    .margin-top-40 {
        margin-top: 40px;
    }
    .hidden {
        display: none !important;
    }
    .margin-bottom-10 {
        margin-bottom: 10px;
    }
    .hr {
        margin-top: 16px;
        margin-bottom: 16px;
        border: 0;
        border-top: 1px solid rgba(0,0,0,.1);
    }
    .padding-20 {
        padding: 20px;
    }
    .timeline-box {
        border-left: 1px solid #e0e0e0;
    }
    .timeline-content {
        margin-left: 30px;
        position: relative;
    }
    .timeline-content::after {
        border-radius: 50%;
        background-color: #fff;
        border-color: inherit;
        border-style: solid;
        border-width: 2px;
        content: "";
        height: 11px;
        left: -30px;
        margin-left: -6px;
        position: absolute;
        width: 11px;
        bottom: auto;
        clear: both;
        top: 7px;
    }
    .border-info {
        border-color: #17a2b8 !important;
    }
    .border-warning {
        border-color: #ffc107 !important;
    }
    .border-danger {
        border-color: #dc3545 !important;
    }
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper"><!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <div class="profile-box">
                            <div class="profile-body">
                                <div class="profile-image">
                                    <img src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg">
                                    @if (auth()->user()->gender == 0)
                                        <h4 class="text-white font-weight-bold mb-0">Mr.{{auth()->user()->lastname}}</h4>
                                    @elseif (auth()->user()->gender == 1)
                                        <h4 class="text-white font-weight-bold mb-0">Ms.{{auth()->user()->lastname}}</h4>
                                    @endif
                                    <span class="text-white font-weight-normal">{{auth()->user()->email}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#infor" class="nav-link active" data-toggle="tab">Thông tin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#password" class="nav-link" data-toggle="tab">Đổi mật khẩu</a>
                                    </li>
                                </ul>
                                {{--tab-content--}}
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane padding-20 in active" id="infor">
                                        <h4>Thông tin cá nhân</h4>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Tên:</p>
                                                            <p class="col-sm-10">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email:</p>
                                                            <p class="col-sm-10">{{auth()->user()->email}}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-2 text-muted text-sm-right mv-0 mb-sm-3">Quyền:</p>
                                                            @if (auth()->user()->role === 0)
                                                                <p class="col-sm-10">
                                                                    Admin
                                                                </p>
                                                            @elseif (auth()->user()->role === 1)
                                                                <p class="col-sm-10">
                                                                    User
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Edit Details Modal -->
                                                <div class="modal fade" id="edit_personal_details" role="dialog" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thông tin nhân viên</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form>
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                                    <div class="row form-row">
                                                                        <div class="alert alert-success hidden" id="notification" style="display: inline-block; padding: 9px !important;">
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Họ và tên</label>
                                                                                <input class="form-control" name="name" type="text" value="{{auth()->user()->firstname}} {{auth()->user()->lastname}}" placeholder="Họ tên">
                                                                                <div id="help-block-name" style="color: red">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input class="form-control" name="email" type="text" value="{{auth()->user()->email}}" placeholder="Email">
                                                                                <div id="help-block-email" style="color: red">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Avatar</label>
                                                                                <input type="file" value="" class="form-control" name="avatar">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary btn-block handleChangeInfo">Lưu thay đổi</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Edit Details Modal -->
                                            </div>
                                            <div class="col-sm-12">
                                                <button data-toggle="modal" href="#edit_personal_details" class="btn btn-success btn-sm">Chỉnh sửa thông tin</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane padding-20" id="password">
                                        <form>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <h4>Đổi mật khẩu</h4>
                                            <div class="row clearfix">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" name="currentPassword" id="currentPassword" class="form-control" placeholder="Mật khẩu hiện tại">
                                                        </div>
                                                        <div id="help-block-currentPass" class="margin-bottom-10" style="color: red">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" name="newPassword" id="newPassword" class="form-control" placeholder="Mật khẩu mới">
                                                        </div>
                                                        <div id="help-block-newPass" class="margin-bottom-10" style="color: red">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Xác nhận mật khẩu">
                                                        </div>
                                                        <div id="help-block-confirmPass" class="margin-bottom-10" style="color: red">
                                                        </div>
                                                    </div>
                                                    <div id="help-block-submit" class="margin-bottom-10" style="color: green">
                                                    </div>
                                                    <div class="">
                                                        <button type="submit" class="btn btn-success btn-sm handleSubmit">Lưu thay đổi</button>
                                                        <button type="submit" class="btn btn-secondary btn-sm handleCancel">Huỷ bỏ</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section("custom-js")
    <script>
        /**
         * Hidden alert
         */
        // $(document).ready(function(){
        //     $('.alert').fadeIn().delay(2000).fadeOut();
        // });
        var currentPass, newPass, confirmPass;
        var blockErrCurrentPass = document.getElementById("help-block-currentPass");
        var blockErrNewPass = document.getElementById("help-block-newPass");
        var blockErrConfirmPass = document.getElementById("help-block-confirmPass");
        var blockErrSubmit = document.getElementById("help-block-submit");

        $(document).ready(function() {
            $(".handleChangeInfo").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var name = $("input[name='name']").val();
                var id = $("input[name='user_id']").val();
                var email = $("input[name='email']").val();
                var blockErrName = document.getElementById("help-block-name");
                var blockErrEmail = document.getElementById("help-block-email");
                $.ajax({
                    url: "/admin/users/edit-info",
                    type:'POST',
                    data: {_token:_token, name:name, email:email, id:id},
                    success: function(response) {
                        blockErrName.innerHTML = "";
                        blockErrEmail.innerHTML = "";
                        var alertDiv = document.getElementById("notification");
                        alertDiv.classList.remove("hidden");
                        alertDiv.innerHTML += response["message"];
                        setTimeout(function(){
                            location.reload();
                        }, 400);
                    },
                    error: function (err) {
                        console.log(err);
                        // console.log(err["responseJSON"]["errors"]["name"][0]);
                        // blockErr.innerHTML = err["responseJSON"]["errors"]["name"][0];
                    }
                });

            });
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                currentPass = $("input[name='currentPassword']").val();
                newPass = $("input[name='newPassword']").val();
                confirmPass = $("input[name='confirmPassword']").val();
                // Check validate
                if(!currentPass) {
                    blockErrCurrentPass.innerHTML = "Không được để trống";
                } else {
                    blockErrCurrentPass.innerHTML = "";
                }
                if(!newPass) {
                    blockErrNewPass.innerHTML = "Không được để trống";
                } else if(newPass.length < 6) {
                    blockErrNewPass.innerHTML = "Mật khẩu mới phải có ít nhất 6 kí tự";
                } else {
                    blockErrNewPass.innerHTML = "";
                }
                if(!confirmPass) {
                    blockErrConfirmPass.innerHTML = "Không được để trống";
                } else if(newPass !== confirmPass) {
                    blockErrConfirmPass.innerHTML = "Mật khẩu không khớp";
                } else {
                    blockErrConfirmPass.innerHTML = "";
                }

                // Thành công
                if(!blockErrConfirmPass.innerHTML && !blockErrNewPass.innerHTML && !blockErrCurrentPass.innerHTML) {
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/change-password",
                        type:'POST',
                        data: {_token:_token, currentPass:currentPass, newPass:newPass, confirmPass:confirmPass},
                        success: function(response) {
                            // blockErrSubmit.innerHTML = response["message"];
                            // setTimeout(function(){
                            //     window.location.href = '/admin/suppliers';
                            // }, 700);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            $(".handleCancel").click(function(e){
                e.preventDefault();
                $("input[name='currentPassword']").val("");
                $("input[name='newPassword']").val("");
                $("input[name='confirmPassword']").val("");
                blockErrCurrentPass.innerHTML = "";
                blockErrNewPass.innerHTML = "";
                blockErrConfirmPass.innerHTML = "";
            });
        });
    </script>
@endsection

