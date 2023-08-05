<style>
    .body {
        padding: 20px;
    }
    .member-card {
        text-align: center;
    }
    .text-link {
        display: block;
        color: #007bff !important;
    }
    .btn-raised {
        border-radius: 2px;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%);
        border: none;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: .875rem;
        line-height: 1.5;
    }
    .m-t-10 {
        margin-top: 10px;
        margin-bottom: 3px;
    }
    .social-links>li {
        display: inline-block;
        margin: 0 5px;
    }
    .g-bg-cyan {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1);
        color: #fff !important;
    }
    .margin-bottom-20 {
        margin-bottom: 20px;
    }
    .card .header {
        padding: 20px 20px 15px 20px;
    }
    .card .body {
        padding: 20px;
    }
    .form-block {
        border-bottom: 1px solid #bdbdbd;
    }
    .form-block .form-control {
        border: none !important;
        padding-left: 0 !important;
    }
    .no-resize {
        resize: none;
    }
    .btn-save {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1) !important;
        color: #fff !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        cursor: pointer;
    }
    .btn-cancel {
        background-color: #cbcdcf !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        color: #3a3a3a !important;
    }
    .margin-right-3 {
        margin-right: 3px;
    }
    .card .header {
        padding: 20px 20px 0 20px !important;
    }
    .alert {
        display: inline-block;
        margin-bottom: 0 !important;
        padding: .5rem 1rem !important;
    }
    .hidden {
        display: none;
    }
    .color-red {
        color: red;
    }
    .color-green {
        color: green;
    }
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">Sửa thông tin</h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="margin-bottom-20">
                    <form>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h5>Thông tin cá nhân <span style="color: red">*</span></h5>
                                    <div class="alert alert-success hidden" id="notiIntro">
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{$user->firstname}}" name="firstname" id="firstname" class="form-control" placeholder="Họ *">
                                                </div>
                                                <div id="help-block-firstname" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{$user->lastname}}" name="lastname" id="lastname" class="form-control" placeholder="Tên *">
                                                </div>
                                                <div id="help-block-lastname" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" class="form-control" value="{{$user->dob}}" name="dob" placeholder="Ngày sinh" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <select class="form-control" name="gender">
                                                        <option value="">Giới tính *</option>
                                                        <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Nam</option>
                                                        <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nữ</option>
                                                        <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Khác</option>
                                                    </select>
                                                </div>
                                                <div id="help-block-gender" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    @if(auth()->user()->role == 2)
                                                        <select class="form-control" name="role">
                                                            <option value="" disabled>Quyền *</option>
                                                            <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Quản trị</option>
                                                            <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Nhân viên</option>
                                                        </select>
                                                    @else
                                                        @if($user->role == 0)
                                                            <input type="text" class="form-control" value="Quản trị" disabled>
                                                        @else
                                                            <input type="text" class="form-control" value="Nhân viên" disabled>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div id="help-block-role" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{$user->phone}}" name="phone" id="phone" class="form-control" placeholder="Số điện thoại *">
                                                </div>
                                                <div id="help-block-phone" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{$user->address}}" name="address" id="address" class="form-control" placeholder="Địa chỉ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <textarea name="introduce" id="introduce" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản về bản thân...">{{$user->introduce}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-save margin-right-3 submitIntro">Lưu</button>
                                            <button type="submit" class="btn btn-cancel cancelIntro">Huỷ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="header">--}}
{{--                                    <h5>Thông tin tài khoản <span style="color: red">*</span></h5>--}}
{{--                                    <div class="alert alert-success hidden" id="notiAccount">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="body">--}}
{{--                                    <div class="row clearfix">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <div class="form-block">--}}
{{--                                                    <input type="text" value="{{$user->email}}" name="email" id="email" class="form-control" placeholder="Email *">--}}
{{--                                                </div>--}}
{{--                                                <div id="help-block-email" style="color: red">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row clearfix">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <button type="submit" class="btn btn-save margin-right-3 submitAccount">Lưu</button>--}}
{{--                                            <button type="submit" class="btn btn-cancel cancelAccount">Huỷ</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h5>Thông tin mạng xã hội</h5>
                                    <div class="alert alert-success hidden" id="notiInfo">
                                    </div>
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{ !empty($info) ? $info->fb : '' }}" name="fb" id="fb" class="form-control" placeholder="Facebook">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{ !empty($info) ? $info->ig : '' }}" name="ig" id="ig" class="form-control" placeholder="Instagram">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" value="{{ !empty($info) ? $info->twitter : '' }}" name="twitter" id="twitter" class="form-control" placeholder="Twitter">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-save margin-right-3 submitInfo">Lưu</button>
                                            <button type="submit" class="btn btn-cancel cancelInfo">Huỷ</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div id="help-block-submit">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary handleSubmit" style="font-size: 18px">Chỉnh sửa</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section("custom-js")
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        var listEmail = {!! $listEmail !!};
        var currentUser = {!! $user !!};
        var firstname, lastname, dob, gender, role, phone, address, introduce, email;
        var fb = null, ig = null, twitter = null;
        var checkInfo = 1, checkAccount = 1;
        var blockErrFirstname = document.getElementById("help-block-firstname");
        var blockErrLastname = document.getElementById("help-block-lastname");
        var blockErrGender = document.getElementById("help-block-gender");
        var blockErrRole = document.getElementById("help-block-role");
        var blockErrPhone = document.getElementById("help-block-phone");
        var blockErrEmail = document.getElementById("help-block-email");
        var blockErrSubmit = document.getElementById("help-block-submit");
        var alertIntro = document.getElementById("notiIntro");
        var alertAccount = document.getElementById("notiAccount");
        var alertInfo = document.getElementById("notiInfo");
        /**
         * Handle submit userintroduce
         */
        $(document).ready(function() {
            $(".submitIntro").click(function(e){
                e.preventDefault();
                firstname = $("input[name='firstname']").val();
                lastname = $("input[name='lastname']").val();
                dob = $("input[name='dob']").val();
                gender = $("select[name='gender']").val();
                role = $("select[name='role']").val();
                phone = $("input[name='phone']").val();
                address = $("input[name='address']").val();
                introduce = $("textarea[name='introduce']").val();
                // Check validate
                if(!firstname) {
                    blockErrFirstname.innerHTML = "Không được để trống";
                } else {
                    blockErrFirstname.innerHTML = "";
                }
                if(!lastname) {
                    blockErrLastname.innerHTML = "Không được để trống";
                } else {
                    blockErrLastname.innerHTML = "";
                }
                if(!gender) {
                    blockErrGender.innerHTML = "Không được để trống";
                } else {
                    blockErrGender.innerHTML = "";
                }
                if(!role) {
                    blockErrRole.innerHTML = "Không được để trống";
                } else {
                    blockErrRole.innerHTML = "";
                }
                if(!phone) {
                    blockErrPhone.innerHTML = "Không được để trống";
                } else {
                    blockErrPhone.innerHTML = "";
                }
                if(!blockErrFirstname.innerHTML && !blockErrLastname.innerHTML && !blockErrGender.innerHTML && !blockErrPhone.innerHTML && !blockErrRole.innerHTML) {
                    console.log("thanh cong");
                    checkInfo = 1;
                    alertIntro.classList.remove("hidden");
                    alertIntro.innerHTML = "Lưu thành công";
                    $('#notiIntro').fadeIn().delay(2000).fadeOut();
                } else {
                    console.log("that bai");
                    checkInfo = 0;
                    alertIntro.classList.add("hidden");
                    alertIntro.innerHTML = "";
                }
            });
            $(".cancelIntro").click(function(e){
                e.preventDefault();
                $("input[name='firstname']").val("");
                $("input[name='lastname']").val("");
                $("input[name='dob']").val("");
                $("select[name='gender']").val("");
                $("select[name='role']").val("");
                $("input[name='phone']").val("");
                $("input[name='address']").val("");
                $("textarea[name='introduce']").val("");
                blockErrFirstname.innerHTML = "";
                blockErrLastname.innerHTML = "";
                blockErrGender.innerHTML = "";
                blockErrPhone.innerHTML = "";
                blockErrRole.innerHTML = "";

            });
            $(".submitAccount").click(function(e){
                e.preventDefault();
                email = $("input[name='email']").val();
                // Check validate
                if(!email) {
                    blockErrEmail.innerHTML = "Không được để trống";
                } else if(!validateEmail(email)) {
                    blockErrEmail.innerHTML = "Email không hợp lệ";
                } else if(checkExistEmail(email)) {
                    blockErrEmail.innerHTML = "Email đã tồn tại";
                } else {
                    blockErrEmail.innerHTML = "";
                }
                if(!blockErrEmail.innerHTML) {
                    console.log("thanh cong");
                    checkAccount = 1;
                    alertAccount.classList.remove("hidden");
                    alertAccount.innerHTML = "Lưu thành công";
                    $('#notiAccount').fadeIn().delay(2000).fadeOut();
                } else {
                    console.log("that bai");
                    checkAccount = 0;
                    alertAccount.classList.add("hidden");
                    alertAccount.innerHTML = "";
                }
            });
            $(".cancelAccount").click(function(e){
                e.preventDefault();
                $("input[name='email']").val("");
                blockErrEmail.innerHTML = "";
            });
            $(".submitInfo").click(function(e){
                e.preventDefault();
                fb = $("input[name='fb']").val();
                ig = $("input[name='ig']").val();
                twitter = $("input[name='twitter']").val();
                alertInfo.classList.remove("hidden");
                alertInfo.innerHTML = "Lưu thành công";
                $('#notiInfo').fadeIn().delay(2000).fadeOut();
            });
            $(".cancelInfo").click(function(e){
                e.preventDefault();
                $("input[name='fb']").val("");
                $("input[name='ig']").val("");
                $("input[name='twitter']").val("");
            });
            //Submit form
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                if(checkAccount && checkInfo) {
                    blockErrSubmit.innerHTML = "";
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/admin/users/edit-user",
                        type:'POST',
                        data: {_token:_token, id:currentUser["id"], firstname:firstname, lastname:lastname, dob:dob
                            , gender:gender , role:role , phone:phone , address:address
                            , introduce:introduce , email:email
                            , fb:fb , ig:ig, twitter: twitter
                        },
                        success: function(response) {
                            blockErrSubmit.classList.remove("color-red");
                            blockErrSubmit.classList.add("color-green");
                            blockErrSubmit.innerHTML = response["message"];
                            setTimeout(function(){
                                window.location.href = '/admin/users';
                            }, 500);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                } else {
                    blockErrSubmit.classList.add("color-red");
                    blockErrSubmit.innerHTML = "Thông tin bạn nhập chưa chính xác";
                }
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
            return listEmail.indexOf(email) !== -1 && currentUser["email"] !== email;
        }
    </script>
@endsection
