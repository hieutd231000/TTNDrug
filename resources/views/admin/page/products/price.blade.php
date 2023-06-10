<style>
    .card .body {
        padding: 10px 20px 20px 20px;
    }
    .card .header {
        padding: 20px 20px 15px 20px;
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
    .margin-20 {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .hidden {
        display: none;
    }
    .inline {
        display: inline;
    }
    .product-detail {
        margin-left: 5px;
        cursor: pointer;
    }
    .card-img-top {
        object-fit: cover;
        width: 250px;
        height: 235px;
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
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header" style="padding-bottom: 0px !important;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h3>Nhập mã sản phẩm</h3>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px">
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group" style="display: flex; margin-bottom: 6px">
                                <input type="text" name="product_code" style="width: 30%; margin-right: 2px; border-radius: 0px !important;" class="form-control" id="product_code" placeholder="Mã sản phẩm">
                                <button type="submit" class="btn btn-primary handleSubmit" style="border-radius: 0px !important;">Tìm kiếm</button>
                            </div>
                            <div id="help-block-product" style="color: red">
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div>
            </div>
            @isset($productDetail)
                <div class="container-fluid" style="margin-bottom: 25px">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#productPriceInfo" class="nav-link active" data-toggle="tab">Giá sản phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a href="#importPriceTable" class="nav-link" data-toggle="tab">Bảng giá nhập</a>
                            </li>
                            <li class="nav-item">
                                <a href="#exportPriceTable" class="nav-link" data-toggle="tab">Bảng giá bán</a>
                            </li>
                        </ul>
                </div>
                <div class="container-fluid">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane padding-20 in active" id="productPriceInfo">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row clearfix">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class="row">
                                                    <img src="{{ URL::asset('image/products').'/'.$productDetail->product_image}}" class="card-img-top" id="card-img-top" alt="...">
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Tên sản phẩm:</p>
                                                    <p class="col-sm-9">{{$productDetail->product_name}}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Mã sản phẩm:</p>
                                                    <p class="col-sm-9">{{$productDetail->product_code}}</p>
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Giá nhập thuốc:</p>
                                                    @if(!$importPriceProductUpdated)
                                                        <p class="col-sm-9">Chưa cập nhật</p>
                                                    @else
                                                        <p class="col-sm-9">{{$importPriceProductUpdated->price_amount}} VNĐ ( Cập nhật lúc: {{$importPriceProductUpdated->order_time}} )</p>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Giá bán ra:</p>
                                                    @if(!$exportPriceProductUpdated)
                                                        <p class="col-sm-9">Chưa cập nhật</p>
                                                    @else
                                                        <p class="col-sm-9">{{$exportPriceProductUpdated->current_price}} VNĐ ( Cập nhật lúc: {{$exportPriceProductUpdated->price_update_time}} )</p>
                                                    @endif
                                                </div>
                                                <div class="col-sm-12" style="margin-left: 40px; margin-top: 5px;">
                                                    <button data-toggle="modal" href="#edit_personal_details" class="btn btn-success">Cập nhật giá bán</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="edit_personal_details" role="dialog" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cập nhật giá sản phẩm</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="product_id" value="{{$productDetail->id}}">
                                                <div class="row">
                                                    <div class="hidden alert alert-success" style="padding: 5px !important;" id="notification">
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input class="form-control" name="price" type="text" value="" placeholder="Nhập giá sản phẩm">
                                                            <div id="help-block-price" style="color: red">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-block handleChangePrice">Cập nhật</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane padding-20" id="importPriceTable">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Danh sách đơn hàng</h5>
                                    </div>
                                    <div class="col-sm-12" style="padding: 15px">
                                        <table id="listOrderTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col" style="width: 95px;">Mã đơn hàng</th>
                                                <th scope="col" style="width: 140px;">Tên nhà cung cấp</th>
                                                <th scope="col" style="width: 100px;">Sản phẩm</th>
                                                <th scope="col" style="width: 65px;">Đơn giá</th>
                                                <th scope="col" style="width: 70px;">Số lượng</th>
                                                <th scope="col">Tổng giá</th>
                                                <th scope="col">Ngày đặt hàng</th>
                                                <th scope="col">Trạng thái</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane padding-20" id="exportPriceTable">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Lịch sử giá bán sản phẩm</h5>
                                    </div>
                                    <div class="col-sm-12" style="padding: 15px">
                                        <table id="listOrderTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên sản phẩm</th>
                                                <th scope="col">Mã sản phẩm</th>
                                                <th scope="col">Danh mục</th>
                                                <th scope="col">Giá</th>
                                                <th scope="col">Ngày cập nhật</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @if(!count($listExportPriceProduct))
                                                    <tr>
                                                        <td colspan="6" style="text-align: center">Không có đơn giá</td>
                                                    </tr>
                                                @else
                                                    @foreach($listExportPriceProduct as $key => $exportPriceProduct)
                                                        <tr>
                                                            <td>{{$key + 1}}</td>
                                                            <td>{{$exportPriceProduct->product_name}}</td>
                                                            <td>{{$exportPriceProduct->product_code}}</td>
                                                            <td>{{$exportPriceProduct->category_name}}</td>
                                                            <td>{{$exportPriceProduct->current_price}} VNĐ</td>
                                                            <td>{{$exportPriceProduct->price_update_time}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--Thêm order--}}
                </div><!-- /.container-fluid -->
            @endisset
        </section>
        <!-- /.content -->

    </div>
@endsection

@section("custom-js")
    <script>
        var imgSrc;
        var listProductCode = {!! $listProductCode !!};
        /**
         * Hidden alert
         //  */
        // $(document).ready(function(){
        //     $('.alert').fadeIn().delay(2000).fadeOut();
        // });

        $(document).ready(function() {
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var product_code = $("input[name='product_code']").val();
                var blockErrProduct = document.getElementById("help-block-product");
                blockErrProduct.innerHTML = "";
                // Check validate
                if(!product_code) {
                    blockErrProduct.innerHTML = "Mời bạn nhập mã sản phẩm";
                } else if(!checkExistProductCode(product_code)) {
                    blockErrProduct.innerHTML = "Mã sản phẩm này không tồn tại";
                } else {
                    blockErrProduct.innerHTML = "";
                }
                if(!blockErrProduct.innerHTML) {
                    $.ajax({
                        url: "/admin/products/get-product-id",
                        type:'GET',
                        data: {_token:_token, product_code:product_code},
                        success: function(response) {
                            console.log(response["data"]);
                            window.location.href = "/admin/products/" + response["data"] + "/price-product";
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            $(".handleChangePrice").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var price = $("input[name='price']").val();
                var product_id = $("input[name='product_id']").val();
                var blockErrPrice = document.getElementById("help-block-price");
                // Check validate
                if(!price) {
                    blockErrPrice.innerHTML = "Không được để trống";
                } else if(!checkPrice(price)) {
                    blockErrPrice.innerHTML = "Giá không hợp lệ";
                } else if(parseInt(price) < 1000) {
                    blockErrPrice.innerHTML = "Giá phải lớn hơn 1000 VNĐ";
                } else {
                    blockErrPrice.innerHTML = "";
                }
                if(!blockErrPrice.innerHTML) {
                    $.ajax({
                        url: "/admin/products/update-price",
                        type: 'POST',
                        data: {_token: _token, current_price: price, product_id: product_id},
                        success: function (response) {
                            blockErrPrice.innerHTML = "";
                            var alertDiv = document.getElementById("notification");
                            alertDiv.classList.remove("hidden");
                            alertDiv.innerHTML += response["message"];
                            setTimeout(function () {
                                location.reload();
                            }, 400);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });

        });

        /**
         *
         * @param product_code
         * @returns {boolean}
         */
        const checkExistProductCode = (product_code) => {
            return listProductCode.indexOf(product_code) !== -1;
        }

        /**
         *
         *
         * @param str
         * @returns {boolean}
         */
        const checkPrice = (str) => {
            return /^\d+$/.test(str);
        }
    </script>

@endsection
