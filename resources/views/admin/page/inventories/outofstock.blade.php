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
    .margin-20 {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .hidden {
        display: none !important;
    }
    .alert-edit {
        padding: .5rem 1.25rem !important;
    }
    .card-img-top {
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h3>Sản phẩm hết hàng</h3>
                        {{--                        <ol class="breadcrumb">--}}
                        {{--                            <li class="breadcrumb-item"><a href="/admin/dashboard" style="color: black">Thống kê</a></li>--}}
                        {{--                            <li class="breadcrumb-item"><a href="/admin/products" style="color: black">Sản phẩm</a></li>--}}
                        {{--                            <li class="breadcrumb-item"><a href="/admin/products">Danh sách sản phẩm</a></li>--}}
                        {{--                        </ol>--}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Sản phẩm đã hết hàng</h5>
                        </div>
                        <div class="col-sm-12">
                            <div class="alert alert-success hidden" id="confirmation" style="padding: 8px; margin-top: 15px">
                            </div>
                        </div>
                        <form>
                            <div class="card-body" style="padding-bottom: 0px">
                                <input class="form-control" type="text" id="productNameSearch" name="productNameSearch" placeholder="Tìm kiếm tên sản phẩm" aria-label="Search">
                            </div>
                        </form>
                        @foreach($listOutOfStock as $key => $data)
                            <form id="{{$data->search_product_name}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card-body" style="padding-bottom: 0px">
                                    <div class="card text-center" style="color: #000 !important; background-color: #e9e9e9 !important;">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Mã sản phẩm</th>
                                                    <th scope="col">DS nhà cung cấp</th>
                                                    <th scope="col" style="width: 130px">Tên sản phẩm</th>
                                                    <th scope="col">Danh mục</th>
                                                    <th scope="col">Đường dùng</th>
                                                    <th scope="col">Dạng bào chế</th>
                                                    <th scope="col">Hàm lượng</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$data->product_code}}</td>
                                                    <td>
                                                        @if(count($data->listSupplier))
                                                            @foreach($data->listSupplier as $supplier)
                                                                <p>{{$supplier->supplier_name}}</p>
                                                            @endforeach
                                                        @else
                                                            <p style="color: red; font-weight: bold">Không có</p>
                                                        @endif

                                                    </td>
                                                    <td>{{$data->product_name}}</td>
                                                    <td>{{$data->category_name}}</td>
                                                    <td>{{$data->route_of_use}}</td>
                                                    <td>{{$data->dosage}}</td>
                                                    <td>{{$data->content}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @if(count($data->listSupplier))
                                            <div class="card-footer btn btn-primary" onclick="confirmOrder( {{ $data->id }} )" style="background-color: #007bff !important;">
                                                Gửi yêu cầu
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        {{--confirm modal--}}
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Bạn yêu cầu đặt thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <img src="" class="card-img-top" id="card-img-top" alt="...">
                            <div class="card-body">
{{--                                <h3 class="product-name" id="product-name" style="margin-bottom: 20px">Card title</h3>--}}
                                <p class="product-code" id="product-code"></p>
                                <p class="category" id="category"></p>
                                <p class="route_of_use" id="route_of_use"></p>
                                <p class="dosage" id="dosage"></p>
                                <p class="content" id="content"></p>
                                <p class="instruction" id="instruction"></p>
                                <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
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
         * Handle when search box
         */
        document.getElementById("productNameSearch").addEventListener('keyup', function(){
            const allProduct = document.querySelectorAll('[id^="sch_outofpro"]');
            for(let product of allProduct) {
                const product_search = product.id.split('_');
                if(product_search[2].includes(this.value)) {
                    console.log(product);
                    product.classList.remove("hidden");
                } else {
                    product.classList.add("hidden");
                    document.querySelector(".content-wrapper").style.minHeight = "auto";
                    document.querySelector(".content-wrapper").style.minHeight = null;
                }
            }
        });

        function confirmOrder(id) {
            $("#confirmModal").modal("show");
        }
    </script>
@endsection
