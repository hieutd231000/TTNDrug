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
    .cancel-icon {
        left: 247px;
        position: absolute;
        top: 36px;
        color: #817f7f;
        font-size: 14px;
        cursor: pointer;
    }
    .imgPreview {
        object-fit: cover;
        width: 250px;
        height: 235px;
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
                        <h4 class="m-0">Chỉnh sửa sản phẩm</h4>
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
                <form action="{{ url("admin/products/edit-product") }}" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id_product" value="{{$product->id}}">
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
                                                <input type="text" name="product_name" id="product_name" value="{{old("product_name", session('invalid') ? session('invalid')[1] : $product->product_name)}}" class="form-control" placeholder="Tên sản phẩm *">
                                            </div>
                                            @if (session('invalid'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{ session('invalid')[0] }}
                                                </p>
                                                <br>
                                            @endif
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="category_id" id="category_id">
                                                    <option value="">Danh mục *</option>
                                                    @foreach($category as $key => $data)
                                                        <option value={{$data->id}} {{ old("category_id", $product->category_id) == $data->id ? "selected":"" }}>{{$data->name}}</option>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="product_code" id="product_code" value="{{old("product_code", session('invalidCode') ? session('invalidCode')[1] : $product->product_code)}}" class="form-control" placeholder="Mã sản phẩm *">
                                            </div>
                                            @if (session('invalidCode'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{ session('invalidCode')[0] }}
                                                </p>
                                                <br>
                                            @endif
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="route_of_use" id="route_of_use">
                                                    <option value="">Đường dùng *</option>
                                                    <option value="Tiêm" {{ old("route_of_use", $product->route_of_use) == "Tiêm" ? "selected":"" }}>Tiêm</option>
                                                    <option value="Đường hô hấp" {{ old("route_of_use", $product->route_of_use) == "Đường hô hấp" ? "selected":"" }}>Đường hô hấp</option>
                                                    <option value="Uống" {{ old("route_of_use", $product->route_of_use) == "Uống" ? "selected":"" }}>Uống</option>
                                                    <option value="Đặt trực tràng" {{ old("route_of_use", $product->route_of_use) == "Đặt trực tràng" ? "selected":"" }}>Đặt trực tràng</option>
                                                    <option value="Dùng ngoài" {{ old("route_of_use", $product->route_of_use) == "Dùng ngoài" ? "selected":"" }}>Dùng ngoài</option>
                                                    <option value="Tiêm truyền" {{ old("route_of_use", $product->route_of_use) == "Tiêm truyền" ? "selected":"" }}>Tiêm truyền</option>
                                                    <option value="Nhỏ mắt" {{ old("route_of_use", $product->route_of_use) == "Nhỏ mắt" ? "selected":"" }}>Nhỏ mắt</option>
                                                    <option value="Đặt dưới lưỡi" {{ old("route_of_use", $product->route_of_use) == "Đặt dưới lưỡi" ? "selected":"" }}>Đặt dưới lưỡi</option>
                                                    <option value="Đường hô hấp" {{ old("route_of_use", $product->route_of_use) == "Đường hô hấp" ? "selected":"" }}>Đường hô hấp</option>
                                                </select>
                                            </div>
                                            @if($errors->has('route_of_use'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('route_of_use')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <select class="form-control" name="dosage" id="dosage">
                                                    <option value="">Dạng bào chế *</option>
                                                    <option value="Dung dịch" {{ old("dosage", $product->dosage) == "Dung dịch" ? "selected":"" }}>Dung dịch</option>
                                                    <option value="Khí hóa lỏng" {{ old("dosage", $product->dosage) == "Khí hóa lỏng" ? "selected":"" }}>Khí hóa lỏng</option>
                                                    <option value="Viên" {{ old("dosage", $product->dosage) == "Viên" ? "selected":"" }}>Viên</option>
                                                    <option value="Viên nén" {{ old("dosage", $product->dosage) == "Viên nén" ? "selected":"" }}>Viên nén</option>
                                                    <option value="Viên đạn" {{ old("dosage", $product->dosage) == "Viên đạn" ? "selected":"" }}>Viên đạn</option>
                                                    <option value="Bột pha dung dịch" {{ old("dosage", $product->dosage) == "Bột pha dung dịch" ? "selected":"" }}>Bột pha dung dịch</option>
                                                    <option value="Bột pha tiêm" {{ old("dosage", $product->dosage) == "Bột pha tiêm" ? "selected":"" }}>Bột pha tiêm</option>
                                                    <option value="Ống thụt" {{ old("dosage", $product->dosage) == "Ống thụt" ? "selected":"" }}>Ống thụt</option>
                                                    <option value="Miếng dán" {{ old("dosage", $product->dosage) == "Miếng dán" ? "selected":"" }}>Miếng dán</option>
                                                    <option value="Siro" {{ old("dosage", $product->dosage) == "Siro" ? "selected":"" }}>Siro</option>
                                                    <option value="Hỗn dịch" {{ old("dosage", $product->dosage) == "Hỗn dịch" ? "selected":"" }}>Hỗn dịch</option>
                                                </select>
                                            </div>
                                            @if($errors->has('dosage'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('dosage')}}
                                                </p>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" name="content" id="content" class="form-control" placeholder="Hàm lượng/Nồng độ *" value="{{ old('content', $product->content) }}">
                                            </div>
                                            @if($errors->has('content'))
                                                <p style="height: 0; margin: 0; color: red">
                                                    {{$errors->first('content')}}
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
                                                <textarea name="instruction" id="instruction" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản...">{{ old('instruction',$product->instruction) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-block" style="border-bottom: 0">
                                                <input type="hidden" name="current_image" id="current_image" value="{{$product->product_image}}">
                                                <input type="file" name="product_image" id="product_image" accept="image/*" style="display: none">
                                                <label for="product_image" class="inputFileCustom">
                                                    Chọn hình ảnh mô tả sản phẩm
                                                </label>
                                                @if ($errors->has('current_image'))
                                                    <div id="img_preview" class="hidden">
                                                        <img id="imgPreview" class="imgPreview"  src="" alt="pic" />
                                                        <i class="fas fa-minus-circle cancel-icon"></i>
                                                    </div>
                                                    <p style="height: 0; margin: 0; color: red">
                                                        {{$errors->first('current_image')}}
                                                    </p>
                                                    <br>
                                                @else
                                                    <div id="img_preview">
                                                        <img id="imgPreview" class="imgPreview"  src="{{ URL::asset('image/products').'/'.$product->product_image}}" alt="pic" />
                                                        <i class="fas fa-minus-circle cancel-icon"></i>
                                                    </div>
                                                @endif
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
                                        <button type="submit" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit">Chỉnh sửa</button>
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
        var listName = {!! $listName !!};
        var listProductCode = {!! $listProductCode !!};
        var currentProduct = {!! $product !!};
        $(document).ready(function() {
            $("#product_image").change(function () {
                const file = this.files[0];
                console.log(file['name']);
                if (file) {
                    document.getElementById("img_preview").classList.remove("hidden");
                    $("input[name='current_image']").val(file['name']);
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
                $("input[name='current_image']").val("");
                $("input[name='product_image']").val("");
                $("input[name='product_name']").val("");
                $("select[name='category_id']").val("");
                $("input[name='product_code']").val("");
                $("textarea[name='instruction']").val("");
            });

            $(".cancel-icon").click(function(e){
                document.getElementById("img_preview").classList.add("hidden");
                document.getElementById("imgPreview").src = "";
                $("input[name='current_image']").val("");
                $("input[name='product_image']").val("");
            });
        });
        /**
         * Check exist
         *
         * @param name
         * @returns {boolean}
         */
        const checkExistName = (name) => {
            return listName.indexOf(name) !== -1 && currentProduct["product_name"] !== name;
        }

        /**
         *
         * @param name
         * @returns {boolean}
         */
        const checkExistProductCode = (code) => {
            return listProductCode.indexOf(code) !== -1 && currentProduct["product_code"] !== code;
        }
        /**
         *
         * @param str
         * @returns {boolean}
         */
        const checkPrice = (str) => {
            return /^\d+$/.test(str);
        }
        /**
         *
         * @param length
         * @returns {string}
         */
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
