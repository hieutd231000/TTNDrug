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
        display: none;
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
                        <h3>Lô dược phẩm hết hạn</h3>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" style="margin-bottom: 25px">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#expiredProduct" class="nav-link active" data-toggle="tab">Hết hạn</a>
                        </li>
                        <li class="nav-item">
                            <a href="#preExpiredProduct" class="nav-link" data-toggle="tab">Sắp hết hạn</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane padding-20 in active" id="expiredProduct">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Dược phẩm đã hết hạn</h5>
                                </div>
                                <div class="col-sm-12">
                                    @foreach($listExpiredProduct as $key => $data)
                                        @if($data->check_expired_time)
                                            <form>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="card-body" style="padding-bottom: 0px">
                                                    <div class="card text-center" style="color: #000 !important; background-color: #e9e9e9 !important;">
                                                        <div class="card-body">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Mã dược phẩm</th>
                                                                    <th scope="col" style="width: 130px">Tên dược phẩm</th>
                                                                    <th scope="col">Danh mục</th>
                                                                    <th scope="col">Lô sản xuất</th>
                                                                    <th scope="col">Tên nhà cung cấp</th>
                                                                    <th scope="col">Đơn giá</th>
                                                                    <th scope="col">Số lượng</th>
                                                                    <th scope="col" style="width: 110px">Ngày đặt hàng</th>
                                                                    <th scope="col" style="width: 110px">Ngày hết hạn</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{$data->product_code}}</td>
                                                                    <td>{{$data->product_name}}</td>
                                                                    <td>{{$data->category_name}}</td>
                                                                    <td>{{$data->production_batch_name}}</td>
                                                                    <td>{{$data->supplier_name}}</td>
                                                                    <td>{{$data->price}}</td>
                                                                    <td>{{$data->amount}}</td>
                                                                    <td>
                                                                        <button class="btn btn-primary" style="font-weight: bold">
                                                                            {{$data->order_time}}
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-danger" style="font-weight: bold">
                                                                            {{$data->expired_time}}
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    @endforeach
                                </div>
{{--                                <div class="d-flex justify-content-end" style="margin-right: 3%">--}}
{{--                                    {!! $listExpiredProduct->appends($_GET)->links("pagination::bootstrap-4") !!}--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane padding-20" id="preExpiredProduct">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Dược phẩm sắp hết hạn</h5>
                                </div>
                                <div class="col-sm-12">
                                    @foreach($listNextExpiredProduct as $key => $data)
                                        @if(!$data->check_next_expired_time)
                                            <form>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div class="card-body" style="padding-bottom: 0px">
                                                    <div class="card text-center" style="color: #000 !important; background-color: #e9e9e9 !important;">
                                                        <div class="card-body">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">Mã dược phẩm</th>
                                                                    <th scope="col" style="width: 130px">Tên dược phẩm</th>
                                                                    <th scope="col">Danh mục</th>
                                                                    <th scope="col">Lô sản xuất</th>
                                                                    <th scope="col">Tên nhà cung cấp</th>
                                                                    <th scope="col">Đơn giá</th>
                                                                    <th scope="col">Số lượng</th>
                                                                    <th scope="col" style="width: 110px">Ngày đặt hàng</th>
                                                                    <th scope="col" style="width: 110px">Ngày hết hạn</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>{{$data->product_code}}</td>
                                                                    <td>{{$data->product_name}}</td>
                                                                    <td>{{$data->category_name}}</td>
                                                                    <td>{{$data->production_batch_name}}</td>
                                                                    <td>{{$data->supplier_name}}</td>
                                                                    <td>{{$data->price}}</td>
                                                                    <td>{{$data->amount}}</td>
                                                                    <td>
                                                                        <button class="btn btn-primary" style="font-weight: bold">
                                                                            {{$data->order_time}}
                                                                        </button>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-danger" style="font-weight: bold">
                                                                            {{$data->expired_time}}
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    @endforeach
                                </div>
{{--                                <div class="d-flex justify-content-end" style="margin-right: 3%">--}}
{{--                                    {!! $listNextExpiredProduct->appends($_GET)->links("pagination::bootstrap-4") !!}--}}
{{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>

                {{--Thêm order--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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
         * Datatable
         */
        $(function () {
            $("#products").DataTable({
                buttons: ["copy", "excel", "pdf", "print"],
                paging: true,
                ordering: true,
                autoWidth: true,
                responsive: true,
                lengthChange: true,
                info: true,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ dược phẩm trên một trang",
                    "zeroRecords": "Không có dược phẩm",
                    "info": "Hiển thị _START_ đến _END_ dược phẩm trên tổng số _TOTAL_ dược phẩm",
                    "search": "Tìm kiếm:",
                    "infoEmpty": "",
                    "paginate": {
                        "next":       "Sau",
                        "previous":   "Trước"
                    },
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            })
                .buttons()
                .container()
                .appendTo("#products_wrapper .col-md-6:eq(0)");
        });

        $('#myInput').on( 'keyup', function () {
            table.search( this.value ).draw();
        } );

        /**
         * Confirm delete category
         * @param id
         */
        {{--function confirmView(id) {--}}
        {{--    $.ajax({--}}
        {{--        url: "/admin/products/detail",--}}
        {{--        type:'GET',--}}
        {{--        data: { id:id },--}}
        {{--        success: function(response) {--}}
        {{--            console.log(response["data"]);--}}
        {{--            if(response["code"] === 200) {--}}
        {{--                document.getElementById("card-img-top").src = '{{ URL::asset('image/products') }}' + '/' + response["data"][0]["product_image"];--}}
        {{--                document.getElementById("product-name").innerHTML = response["data"][0]["product_name"];--}}
        {{--                document.getElementById("product-code").innerHTML = "<span class='text-muted'><i>Mã sản phẩm: </i></span>" + response["data"][0]["product_code"];--}}
        {{--                document.getElementById("category").innerHTML = "<span class='text-muted'><i>Danh mục: </i></span>" + response["data"][0]["category_name"];--}}
        {{--                document.getElementById("route_of_use").innerHTML = "<span class='text-muted'><i>Đường dùng: </i></span>" + response["data"][0]["route_of_use"];--}}
        {{--                document.getElementById("dosage").innerHTML = "<span class='text-muted'><i>Dạng bào chế: </i></span>" + response["data"][0]["dosage"];--}}
        {{--                document.getElementById("content").innerHTML = "<span class='text-muted'><i>Hàm lượng: </i></span>" + response["data"][0]["content"];--}}
        {{--                if(response["data"][0]["instruction"]) {--}}
        {{--                    document.getElementById("instruction").innerHTML = "<span style='color: red'>Hướng dẫn sử dụng: </span>" + response["data"][0]["instruction"];--}}
        {{--                } else {--}}
        {{--                    document.getElementById("instruction").innerHTML = "";--}}
        {{--                }--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function (err) {--}}
        {{--            console.log(err);--}}
        {{--        }--}}
        {{--    });--}}
        {{--    $("#viewModal").modal("show");--}}
        {{--}--}}

        {{--/**--}}
        {{-- * Confirm delete category--}}
        {{-- * @param id--}}
        {{-- */--}}
        {{--function confirmDelete(id) {--}}
        {{--    $("#id_product").val(id);--}}
        {{--    $("#deleteModal").modal("show");--}}
        {{--}--}}
    </script>
@endsection
