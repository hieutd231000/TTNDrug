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
    .margin-bottom-10 {
        margin-bottom: 10px;
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
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">Thêm nhà cung cấp</h4>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h5 style="display: inline">Thông tin nhà cung cấp</h5>
                            <a class="btn btn-primary btn-sm float-right" href="/suppliers">Quay lại</a>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-block">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Tên *">
                                        </div>
                                        <div id="help-block-name" style="color: red">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-block">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email *">
                                        </div>
                                        <div id="help-block-email" style="color: red">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-block">
                                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone *">
                                        </div>
                                        <div id="help-block-phone" style="color: red">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-block">
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Địa chỉ *">
                                        </div>
                                        <div id="help-block-address" style="color: red">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-block">
                                            <textarea name="introduce" id="introduce" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="help-block-submit" class="margin-bottom-10" style="color: green">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary margin-right-3 handleSubmit">Thêm mới</button>
                                    <button type="submit" class="btn btn-cancel handleCancel">Huỷ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section("custom-js")
    <script>
        var listEmail = {!! $listEmail !!};
        var listName = {!! $listName !!};
        var name, phone, address, introduce, email;
        var blockErrName = document.getElementById("help-block-name");
        var blockErrPhone = document.getElementById("help-block-phone");
        var blockErrEmail = document.getElementById("help-block-email");
        var blockErrAddress = document.getElementById("help-block-address");
        var blockErrIntroduce = document.getElementById("help-block-introduce");
        var blockErrSubmit = document.getElementById("help-block-submit");

        $(document).ready(function() {
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                name = $("input[name='name']").val();
                phone = $("input[name='phone']").val();
                address = $("input[name='address']").val();
                introduce = $("textarea[name='introduce']").val();
                email = $("input[name='email']").val();
                // Check validate
                if(!name) {
                    blockErrName.innerHTML = "Không được để trống";
                } else if(checkExistName(name)) {
                    blockErrName.innerHTML = "Name đã tồn tại";
                } else {
                    blockErrName.innerHTML = "";
                }
                if(!address) {
                    blockErrAddress.innerHTML = "Không được để trống";
                } else {
                    blockErrAddress.innerHTML = "";
                }
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
                //Thành công
                if(!blockErrEmail.innerHTML && !blockErrName.innerHTML && !blockErrPhone.innerHTML && !blockErrAddress.innerHTML) {
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/admin/suppliers/add-supplier",
                        type:'POST',
                        data: {_token:_token, name:name, email:email,
                              phone:phone , address:address, introduce:introduce
                        },
                        success: function(response) {
                            blockErrSubmit.innerHTML = response["message"];
                            setTimeout(function(){
                                window.location.href = '/admin/suppliers';
                            }, 400);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
                });
            $(".handleCancel").click(function(e){
                e.preventDefault();
                $("input[name='name']").val("");
                $("input[name='phone']").val("");
                $("input[name='email']").val("");
                $("input[name='address']").val("");
                $("textarea[name='introduce']").val("");
                blockErrName.innerHTML = "";
                blockErrEmail.innerHTML = "";
                blockErrAddress.innerHTML = "";
                blockErrPhone.innerHTML = "";
                blockErrIntroduce.innerHTML = "";
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
            return listEmail.indexOf(email) !== -1;
        }

        /**
         *
         * @param name
         * @returns {boolean}
         */
        const checkExistName = (name) => {
            console.log(listName);
            return listName.indexOf(name) !== -1;
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
