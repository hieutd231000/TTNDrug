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
            @if (session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @elseif(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="container-fluid">
                <form action="{{ url("admin/products/add-product") }}" enctype="multipart/form-data" method="post">
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
                                                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Tên sản phẩm *" value="{{ old("product_name") }}">
                                            </div>
                                            @if($errors->has('product_name'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('product_name')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="">Danh mục *</option>
                                                    @foreach($category as $key => $data)
                                                        <option value={{$data->id}} {{ old("category_id") == $data->id ? "selected":"" }}>{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('category_id'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('category_id')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="unit_id" id="unit_id">
                                                    <option value="">Đơn vị *</option>
                                                    @foreach($unit as $key => $data)
                                                        <option value={{$data->id}} {{ old("unit_id") == $data->id ? "selected":"" }}>{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->has('unit_id'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('unit_id')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="price_unit" id="price_unit" class="form-control" placeholder="Giá/Đơn vị (VNĐ) *" value="{{ old("price_unit") }}">
                                            </div>
                                            @if($errors->has('price_unit'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('price_unit')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Mã sản phẩm *" value="{{ old("product_code") }}">
                                            </div>
                                            @if($errors->has('product_code'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('product_code')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <textarea name="instruction" id="instruction" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản...">{{ old("instruction") }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-block" style="border-bottom: 0">
                                                <input type="file" name="product_image" id="product_image" accept="image/*" style="display: none">
                                                <label for="product_image" class="inputFileCustom">
                                                        Chọn hình ảnh mô tả sản phẩm
                                                </label>
                                                <div id="img_preview" class="hidden">
                                                    <img id="imgPreview" src="#" alt="pic" />
                                                </div>
                                                @if($errors->has('product_image'))
                                                    <p style="height: 0; margin: 0; color: red">
                                                        {{$errors->first('product_image')}}
                                                    </p>
                                                    <br>
                                                @endif
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
                                        <button type="button" class="btn btn-cancel handleCancel">Huỷ</button>
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
        /**
         * Hidden alert
         */
        $(document).ready(function(){
            $('.alert').fadeIn().delay(2000).fadeOut();
        });
        $(document).ready(function() {
            $("#product_image").change(function () {
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

            $(".handleCancel").click(function(e){
                e.preventDefault();
                document.getElementById("img_preview").classList.add("hidden");
                document.getElementById("imgPreview").src = "";
                $("input[name='product_image']").val("");
                $("input[name='product_name']").val("");
                $("select[name='category_id']").val("");
                $("select[name='unit_id']").val("");
                $("input[name='price_unit']").val("");
                $("input[name='product_code']").val("");
                $("textarea[name='instruction']").val("");
            });
        });

        /**
         *
         *
         * @param str
         * @returns {boolean}
         */
        const checkPrice = (str) => {
            return /^\d+$/.test(str);
        }

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
