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
    .hidden {
        display: none;
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
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">Thêm sản phẩm</h4>
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
                                <h5>Thông tin sản phẩm</h5>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Tên sản phẩm *">
                                            </div>
                                            <div id="help-block-name" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="category" id="category">
                                                    <option value="">Danh mục *</option>
                                                    @foreach($category as $key => $data)
                                                        <option value={{$loop->index}}>{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div id="help-block-category" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="unit" id="unit">
                                                    <option value="">Đơn vị *</option>
                                                    @foreach($unit as $key => $data)
                                                        <option value={{$loop->index}}>{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div id="help-block-unit" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="price_unit" id="price_unit" class="form-control" placeholder="Giá/Đơn vị *">
                                            </div>
                                            <div id="help-block-price_unit" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="price_code" id="price_code" class="form-control" placeholder="Mã sản phẩm *">
                                            </div>
                                            <div id="help-block-price_code" style="color: red">
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
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-block" style="border-bottom: 0">
                                                <input type="file" name="photo" id="photo" accept="image/*" style="display: none">
                                                <label for="photo" class="inputFileCustom">
                                                        Chọn hình ảnh mô tả sản phẩm
                                                </label>
                                                <div id="img_preview" class="hidden">
                                                    <img id="imgPreview" src="#" alt="pic" />
                                                </div>
                                            </div>
                                            <div id="help-block-photo" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div id="help-block-submit" class="margin-bottom-10" style="color: green">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit">Thêm mới</button>
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
        var name, category, unit, introduce, price_unit, price_code, image;
        var blockErrName = document.getElementById("help-block-name");
        var blockErrCategory = document.getElementById("help-block-category");
        var blockErrUnit = document.getElementById("help-block-unit");
        var blockErrPriceUnit = document.getElementById("help-block-price_unit");
        var blockErrPriceCode = document.getElementById("help-block-price_code");
        var blockErrIntroduce = document.getElementById("help-block-introduce");
        var blockErrSubmit = document.getElementById("help-block-submit");

        $(document).ready(function() {
            $("#photo").change(function () {
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

            $(".handleSubmit").click(function(e){
                e.preventDefault();
                name = $("input[name='name']").val();
                category = $("select[name='category']").val();
                unit = $("select[name='unit']").val();
                price_unit = $("input[name='price_unit']").val();
                price_code = $("input[name='price_code']").val();
                introduce = $("textarea[name='introduce']").val();
                // Check validate
                if(!name) {
                    blockErrName.innerHTML = "Không được để trống";
                } else {
                    blockErrName.innerHTML = "";
                }
                if(!category) {
                    blockErrCategory.innerHTML = "Không được để trống";
                } else {
                    blockErrCategory.innerHTML = "";
                }
                if(!unit) {
                    blockErrUnit.innerHTML = "Không được để trống";
                } else {
                    blockErrUnit.innerHTML = "";
                }
                if(!price_unit) {
                    blockErrPriceUnit.innerHTML = "Không được để trống";
                } else {
                    blockErrPriceUnit.innerHTML = "";
                }
                if(!price_code) {
                    blockErrPriceCode.innerHTML = "Không được để trống";
                } else {
                    blockErrPriceCode.innerHTML = "";
                }

                //Thành công
                // if(!blockErrEmail.innerHTML && !blockErrName.innerHTML && !blockErrPhone.innerHTML && !blockErrAddress.innerHTML) {
                //     var _token = $("input[name='_token']").val();
                //     $.ajax({
                //         url: "/admin/suppliers/add-supplier",
                //         type:'POST',
                //         data: {_token:_token, name:name, email:email,
                //             phone:phone , address:address, introduce:introduce
                //         },
                //         success: function(response) {
                //             blockErrSubmit.innerHTML = response["message"];
                //             setTimeout(function(){
                //                 window.location.href = '/admin/suppliers';
                //             }, 700);
                //         },
                //         error: function (err) {
                //             console.log(err);
                //         }
                //     });
                // }
            });
            // $(".handleCancel").click(function(e){
            //     e.preventDefault();
            //     $("input[name='name']").val("");
            //     $("input[name='phone']").val("");
            //     $("input[name='email']").val("");
            //     $("input[name='address']").val("");
            //     $("textarea[name='introduce']").val("");
            //     blockErrName.innerHTML = "";
            //     blockErrEmail.innerHTML = "";
            //     blockErrAddress.innerHTML = "";
            //     blockErrPhone.innerHTML = "";
            //     blockErrIntroduce.innerHTML = "";
            // });
        });

        const randomCode = (length) => {
            let result = '';
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }
    </script>
@endsection
