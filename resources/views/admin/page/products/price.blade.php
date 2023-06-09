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
    .alert-edit {
        padding: .5rem 1.25rem !important;
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
                        <h3>Thông tin giá sản phẩm</h3>
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
                                <input type="text" name="product_code" style="width: 30%; margin-right: 2px; border-radius: 0px !important;" class="form-control" id="product_code" placeholder="Nhập mã sản phẩm">
                                <button type="submit" class="btn btn-primary handleSubmit" style="border-radius: 0px !important;">Tìm kiếm</button>
                            </div>
                            <div id="help-block-product" style="color: red">
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!--Add Modal -->
        @isset($supplierDetail)
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplierDetail->id }}">
                                <div class="form-group">
                                    <select name="product_selected" id="product_selected" style="height: 38px; width: 100%">
                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                        @foreach($listAllProduct as $key => $data)
                                            <option value={{$data->id}}>{{$data->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="help-block-product" style="color: red">
                                    </div>
                                    <div id="help-block-success" style="color: green">
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                    <button type="submit" class="btn btn-primary handleSubmit">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
        <!--View Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Danh sách sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <img src="" class="card-img-top" id="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="product-name" id="product-name">Card title</h3>
                                <p class="product-code" id="product-code"></p>
                                <p class="category" id="category"></p>
                                {{--                                <p class="unit" id="unit"></p>--}}
                                {{--                                <p class="price-unit" id="price-unit"></p>--}}
                                <p class="instruction" id="instruction"></p>
                                <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Delete Modal -->
        @isset($supplierDetail)
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplierDetail->id }}">
                                <div class="form-group">
                                    <select data-placeholder="Lựa chọn sản phẩm bạn muốn xoá..." multiple class="chosen-select" style="margin-bottom: 3px" name="product_delete">
                                        <option value=""></option>
                                        @foreach($listProduct as $key => $data)
                                            <option value="{{$data[0]->id}}">{{$data[0]->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="help-block-delete-product" style="color: red">
                                    </div>
                                    <div id="help-block-success-delete" style="color: red">
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                    <button type="submit" class="btn btn-danger handleDelete">Xoá</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection

@section("custom-js")
    <script>
        var imgSrc;
        var listProductCode = {!! $listProductCode !!}
        /**
         * Hidden alert
         //  */
        $(document).ready(function(){
            $('.alert-edit').fadeIn().delay(2000).fadeOut();
        });

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
                    // $.ajax({
                    //     url: "/admin/suppliers/add-product",
                    //     type:'POST',
                    //     data: {_token:_token, product_id:product_id, supplier_id:supplier_id},
                    //     success: function(response) {
                    //         blockErrProduct.innerHTML = "";
                    //         blockSuccess.innerHTML = "Thêm sản phẩm thành công";
                    //         console.log(response["data"]);
                    //         // addProductToTable(response["data"][0], response["data"][1], response["data"][2]);
                    //         setTimeout(function(){
                    //             location.reload();
                    //         }, 600);
                    //     },
                    //     error: function (err) {
                    //         console.log(err);
                    //     }
                    // });
                    // setTimeout(function(){
                    //     $("#addModal").modal("hide");
                    // }, 400);
                }
            });
        });

        const checkExistProductCode = (product_code) => {
            return listProductCode.indexOf(product_code) !== -1;
        }
    </script>

@endsection
