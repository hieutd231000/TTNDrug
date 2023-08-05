<style>
    .profile-image {
        padding: 75px 0px;
        text-align: center;
    }
    .profile-current-image {
        padding: 10px 0px;
    }
    .red {
        color: red;
    }
    .green {
        color: green;
    }
    .inputFileCustom {
        color: black;
        display: inline-block;
        background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
        border: 1px solid #999;
        border-radius: 3px;
        padding: 5px 8px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        text-shadow: 1px 1px #fff;
        font-weight: 400 !important;
        font-size: 11pt;
    }
    .cancel-icon {
        left: 150px;
        position: absolute;
        top: 40px;
        color: #817f7f;
        font-size: 14px;
        cursor: pointer;
    }
    .imgPreview {
        object-fit: cover;
        width: 150px;
        height: 150px;
    }
    img {
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
                                    @if(!auth()->user()->avatar)
                                        <img src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg">
                                    @else
                                        <img style="width: 120px; height: 120px" src="{{ URL::asset('image/avatars' . '/'. auth()->user()->avatar)}}">
                                    @endif
                                    @if (auth()->user()->gender == 0)
                                        <h4 class="text-white font-weight-bold mb-0">Mr.{{auth()->user()->lastname}}</h4>
                                    @elseif (auth()->user()->gender == 1)
                                        <h4 class="text-white font-weight-bold mb-0">Ms.{{auth()->user()->lastname}}</h4>
                                    @endif
{{--                                    <div class="row">--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fad fa-facebook"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fas fa-twitter"></i>--}}
{{--                                        </a>--}}
{{--                                        <a href="#">--}}
{{--                                            <i class="fa fa-facebook"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
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
                                        <a href="#avatar" class="nav-link" data-toggle="tab">Hình đại diện</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#password" class="nav-link" data-toggle="tab">Đổi mật khẩu</a>
                                    </li>
                                </ul>
                                {{--tab-content--}}
                                <div class="tab-content">
                                    @if (session('failed'))
                                        <div class="alert alert-edit alert-danger" style="display: inline; padding: 7px">
                                            {{ session('failed') }}
                                        </div>
                                    @elseif(session('success'))
                                        <div class="alert alert-edit alert-primary" style="display: inline; padding: 7px">
                                            {{ session('success') }}
                                        </div>
                                    @endif
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
                                                            <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">SĐT:</p>
                                                            <p class="col-sm-10">{{auth()->user()->phone}}</p>
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-2 text-muted text-sm-right mv-0 mb-sm-3">Giới tính:</p>
                                                            @if (auth()->user()->gender === 0)
                                                                <p class="col-sm-10">
                                                                    Nam
                                                                </p>
                                                            @elseif (auth()->user()->gender === 1)
                                                                <p class="col-sm-10">
                                                                   Nữ
                                                                </p>
                                                            @elseif (auth()->user()->gender === 2)
                                                                <p class="col-sm-10">
                                                                    Khác
                                                                </p>
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <p class="col-sm-2 text-muted text-sm-right mv-0 mb-sm-3">Quyền:</p>
                                                            @if (auth()->user()->role === 0)
                                                                <p class="col-sm-10">
                                                                    Quản trị
                                                                </p>
                                                            @elseif (auth()->user()->role === 1)
                                                                <p class="col-sm-10">
                                                                    Người dùng
                                                                </p>
                                                            @elseif (auth()->user()->role === 2)
                                                                <p class="col-sm-10">
                                                                    Root
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
                                                                                <label>SĐT</label>
                                                                                <input class="form-control" name="phone" type="text" value="{{auth()->user()->phone}}" placeholder="Phone">
                                                                                <div id="help-block-phone" style="color: red">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label>Giới tính</label>
                                                                                <select class="form-control" name="gender">
                                                                                    <option value="" disabled>Giới tính *</option>
                                                                                    <option value="0" {{ auth()->user()->gender == 0 ? 'selected' : '' }}>Nam</option>
                                                                                    <option value="1" {{ auth()->user()->gender == 1 ? 'selected' : '' }}>Nữ</option>
                                                                                    <option value="2" {{ auth()->user()->gender == 2 ? 'selected' : '' }}>Khác</option>
                                                                                </select>
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
                                    <div role="tabpanel" class="tab-pane padding-20" id="avatar">
                                        <h4>Hình đại diện cá nhân</h4>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="profile-current-image">
                                                    @if(!auth()->user()->avatar)
                                                        <img src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg">
                                                    @else
                                                        <img style="width: 120px; height: 120px" src="{{ URL::asset('image/avatars' . '/'. auth()->user()->avatar)}}">
                                                    @endif
                                                </div>
                                                <!-- Edit Avatar Modal -->
                                                <div class="modal fade" id="edit_avatar" role="dialog" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Thay đổi hình đổi diện</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url("admin/users/update-avatar") }}" enctype="multipart/form-data" method="post">
                                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                                                    <div class="row form-row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <input type="file" name="avatar_image" id="avatar_image" accept="image/*" style="display: none">
                                                                                <label for="avatar_image" class="inputFileCustom">
                                                                                    Chọn hình ảnh của bạn
                                                                                </label>
                                                                                <div id="img_preview" class="hidden">
                                                                                    <img id="imgPreview" class="imgPreview" src="#" alt="pic" />
                                                                                    <i class="fas fa-minus-circle cancel-icon"></i>
                                                                                </div>
                                                                                <div id="help-block-avatar" style="color: red">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary btn-block handleChangeAvatar">Lưu thay đổi</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Edit Avatar Modal -->
                                            </div>
                                            <div class="col-sm-12">
                                                <button data-toggle="modal" href="#edit_avatar" class="btn btn-success btn-sm">Chỉnh sửa hình đại diện</button>
                                            </div>
                                        </div>
{{--                                        <form>--}}
{{--                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">--}}
{{--                                            <div class="row clearfix">--}}
{{--                                                <div class="col-md-12">--}}
{{--                                                    <div class="profile-current-image">--}}
{{--                                                        <img src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg">--}}
{{--                                                    </div>--}}
{{--                                                    <div id="help-block-submit" class="margin-bottom-10">--}}
{{--                                                    </div>--}}
{{--                                                    <div class="">--}}
{{--                                                        <button type="submit" class="btn btn-success btn-sm handleSubmit">Chỉnh sửa avatar</button>--}}
{{--                                                        <button type="submit" class="btn btn-secondary btn-sm handleCancel">Huỷ bỏ</button>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </form>--}}
                                    </div>
                                    <div role="tabpanel" class="tab-pane padding-20" id="password">
                                        <form>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
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
                                                    <div id="help-block-submit" class="margin-bottom-10">
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
        $(document).ready(function(){
            $('.alert').fadeIn().delay(1400).fadeOut();
        });
        var listEmail = {!! $listEmail !!};
        var currentEmail = $("input[name='email']").val();
        var currentPass, newPass, confirmPass;
        var blockErrCurrentPass = document.getElementById("help-block-currentPass");
        var blockErrNewPass = document.getElementById("help-block-newPass");
        var blockErrConfirmPass = document.getElementById("help-block-confirmPass");
        var blockErrSubmit = document.getElementById("help-block-submit");

        $(document).ready(function() {
            /**
             * Avatar
             */
            $("#avatar_image").change(function () {
                const file = this.files[0];
                if (file) {
                    document.getElementById("img_preview").classList.remove("hidden");
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#imgPreview")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            $(".cancel-icon").click(function(e){
                document.getElementById("img_preview").classList.add("hidden");
                document.getElementById("imgPreview").src = "";
                $("input[name='avatar_image']").val("");
            });

            $(".handleChangeInfo").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var name = $("input[name='name']").val();
                var id = $("input[name='user_id']").val();
                var email = $("input[name='email']").val();
                var phone = $("input[name='phone']").val();
                var gender = $("select[name='gender']").val();
                var blockErrName = document.getElementById("help-block-name");
                var blockErrEmail = document.getElementById("help-block-email");
                var blockErrPhone = document.getElementById("help-block-phone");
                // Check validate
                if(!phone) {
                    blockErrPhone.innerHTML = "Không được để trống";
                } else if(!checkPhone(phone) || phone.length < 10) {
                    blockErrPhone.innerHTML = "Phone không hợp lệ";
                } else {
                    blockErrPhone.innerHTML = "";
                }
                if(!email) {
                    blockErrEmail.innerHTML = "Không được để trống";
                } else if(!validateEmail(email)) {
                    blockErrEmail.innerHTML = "Email không hợp lệ";
                } else if(checkExistEmail(email)) {
                    blockErrEmail.innerHTML = "Email đã tồn tại";
                } else {
                    blockErrEmail.innerHTML = "";
                }
                if(!name) {
                    blockErrName.innerHTML = "Không được để trống";
                } else {
                    blockErrName.innerHTML = "";
                }
                if(!blockErrEmail.innerHTML && !blockErrName.innerHTML && !blockErrPhone.innerHTML) {
                    $.ajax({
                        url: "/admin/users/edit-info",
                        type: 'POST',
                        data: {_token: _token, name: name, email: email, id: id, phone:phone, gender:gender},
                        success: function (response) {
                            blockErrName.innerHTML = "";
                            blockErrEmail.innerHTML = "";
                            blockErrPhone.innerHTML = "";
                            var alertDiv = document.getElementById("notification");
                            alertDiv.classList.remove("hidden");
                            alertDiv.innerHTML += response["message"];
                            setTimeout(function () {
                                location.reload();
                            }, 400);
                        },
                        error: function (err) {
                            console.log(err);
                            // console.log(err["responseJSON"]["errors"]["name"][0]);
                            // blockErr.innerHTML = err["responseJSON"]["errors"]["name"][0];
                        }
                    });
                }
            });
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                currentPass = $("input[name='currentPassword']").val();
                newPass = $("input[name='newPassword']").val();
                confirmPass = $("input[name='confirmPassword']").val();
                var id = $("input[name='user_id']").val();
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
                        data: {_token:_token, currentPass:currentPass, newPass:newPass, confirmPass:confirmPass, id:id},
                        success: function(response) {
                            var alertDiv = document.getElementById("help-block-submit");
                            alertDiv.classList.remove("red");
                            alertDiv.classList.add("green");
                            blockErrSubmit.innerHTML = response["message"];
                            $("input[name='currentPassword']").val("");
                            $("input[name='newPassword']").val("");
                            $("input[name='confirmPassword']").val("");
                            $('#help-block-submit').fadeIn().delay(2000).fadeOut();
                        },
                        error: function (err) {
                            console.log(err);
                            console.log(err["responseJSON"]["message"]);
                            var alertDiv = document.getElementById("help-block-submit");
                            alertDiv.classList.remove("green");
                            alertDiv.classList.add("red");
                            blockErrSubmit.innerHTML = err["responseJSON"]["message"];
                            $("input[name='currentPassword']").val("");
                            $("input[name='newPassword']").val("");
                            $("input[name='confirmPassword']").val("");
                            $('#help-block-submit').fadeIn().delay(2000).fadeOut();
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
                blockErrSubmit.innerHTML = "";
            });
        });

        /**
         * Validate email
         *
         * @param email
         * @returns {*}
         */
        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };

        /**
         * Check exist
         *
         * @param email
         * @returns {boolean}
         */
        const checkExistEmail = (email) => {
            console.log(listEmail);
            return listEmail.indexOf(email) !== -1 && currentEmail !== email;
        }

        /**
         *
         *
         * @param str
         * @returns {boolean}
         */
        const checkPhone = (str) => {
            return /^\d+$/.test(str);
        }
    </script>
@endsection

