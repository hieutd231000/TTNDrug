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
                        <h3>Thông tin nhà cung cấp</h3>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <form>
                            <div class="select">
                                <select id="standard-select" style="height: 38px; width: 300px">
                                    <option value="null">Chọn nhà cung cấp</option>
                                    @foreach($supplier as $key => $data)
                                        <option value={{$data->id}}>{{$data->name}}</option>
                                    @endforeach
                                </select>
                                <span class="focus"></span>
                                <input class="btn btn-primary handleSearch" type="submit" value="Chọn" style="margin-bottom: 5px">
                            </div>
                        </form>
                    </div><!-- /.col -->
                </div>
                @if (session('failed'))
                    <div class="alert alert-edit alert-danger" style="display: inline">
                        {{ session('failed') }}
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-edit alert-success" style="display: inline">
                        {{ session('success') }}
                    </div>
                @endif
                @isset ($supplierDetail)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px">
                        <div class="card">
                            <div class="header">
                                <h5>Thông tin cơ bản</h5>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Tên nhà cung cấp:</p>
                                    <p class="col-sm-10">{{$supplierDetail->name}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email:</p>
                                    <p class="col-sm-10">{{$supplierDetail->email}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Số điện thoại:</p>
                                    <p class="col-sm-10">{{$supplierDetail->phone}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Địa chỉ:</p>
                                    <p class="col-sm-10">{{$supplierDetail->address}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Số lượng sản phẩm:</p>
                                    <p class="col-sm-10">{{$totalProduct}}
                                        <a class="product-detail" onclick="viewAllProduct({{$supplierDetail->id}})">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </p>
                                </div>
                                @if ($supplierDetail->introduce)
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Giới thiệu:</p>
                                        <p class="col-sm-10">{{$supplierDetail->introduce}}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endisset
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!--View Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
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
                                <p class="unit" id="unit"></p>
                                <p class="price-unit" id="price-unit"></p>
                                <p class="instruction" id="instruction"></p>
                                <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ url("/admin/products/delete") }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id_product" value="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá sản phẩm này?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="border: none">
                            Một khi xoá thì bạn sẽ không thể phục hồi !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-danger">Đồng ý</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("custom-js")
    <script>
        var imgSrc;
        /**
         * Hidden alert
         */
        $(document).ready(function(){
            $('.alert-edit').fadeIn().delay(2000).fadeOut();
        });

        /**
         * Confirm delete category
         * @param id
         */
        function viewAllProduct(id) {
            $.ajax({
                url: "/admin/suppliers/get-product",
                type:'GET',
                data: { id:id },
                success: function(response) {
                    console.log(response["data"]);
                    if(response["code"] === 200) {
                        console.log(response["data"]);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            $("#viewModal").modal("show");
        }
    </script>
@endsection
