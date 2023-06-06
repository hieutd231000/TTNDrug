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
                        <h3>Sản phẩm</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard" style="color: black">Thống kê</a></li>
                            <li class="breadcrumb-item"><a href="/admin/products" style="color: black">Sản phẩm</a></li>
                            <li class="breadcrumb-item"><a href="/admin/products">Danh sách sản phẩm</a></li>
                        </ol>
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
                        <a href="/admin/products/add-product" class="btn btn-raised g-bg-cyan float-right mt-2">Thêm sản phẩm</a>
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
                <div class="row clearfix margin-20">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="products" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Danh mục</th>
                                            <th>Đường dùng</th>
                                            <th>Dạng bào chế</th>
                                            <th>Hàm lượng</th>
                                            <th style="width: 140px">Xem/Sửa/Xoá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product as $key => $data)
                                        <tr>
                                            <td>{{ $rank++ }}</td>
                                            <td>{{$data->product_name}}</td>
                                            <td>{{$data->category_name}}</td>
                                            <td>{{$data->route_of_use}}</td>
                                            <td>{{$data->dosage}}</td>
                                            <td>{{$data->content}}</td>
                                            <td>
                                                <a data-id="1" id="viewBtn">
                                                    <button class="btn btn-sm btn-info" onclick="confirmView( {{ $data->id }} )"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="/admin/products/{{$data->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                <a data-id="2" id="deleteBtn">
                                                    <button class="btn btn-sm btn-danger" onclick="confirmDelete( {{ $data->id }} )" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
{{--                            <div class="d-flex justify-content-end" style="margin-right: 3%">--}}
{{--                                {!! $product->appends($_GET)->links("pagination::bootstrap-4") !!}--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
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
                                <h3 class="product-name" id="product-name" style="margin-bottom: 20px">Card title</h3>
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
         * Datatable
         */
        $(function () {
            $("#products").DataTable({
                buttons: ["copy", "excel", "pdf", "print"],
                paging: true,
                ordering: false,
                autoWidth: true,
                responsive: true,
                lengthChange: true,
                info: true,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ sản phẩm trên một trang",
                    "zeroRecords": "Không có sản phẩm",
                    "info": "Hiển thị _START_ đến _END_ sản phẩm trên tổng số _TOTAL_ sản phẩm",
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
        function confirmView(id) {
            $.ajax({
                url: "/admin/products/detail",
                type:'GET',
                data: { id:id },
                success: function(response) {
                    console.log(response["data"]);
                    if(response["code"] === 200) {
                        document.getElementById("card-img-top").src = '{{ URL::asset('image/products') }}' + '/' + response["data"][0]["product_image"];
                        document.getElementById("product-name").innerHTML = response["data"][0]["product_name"];
                        document.getElementById("product-code").innerHTML = "<span class='text-muted'><i>Mã sản phẩm: </i></span>" + response["data"][0]["product_code"];
                        document.getElementById("category").innerHTML = "<span class='text-muted'><i>Danh mục: </i></span>" + response["data"][0]["category_name"];
                        document.getElementById("route_of_use").innerHTML = "<span class='text-muted'><i>Đường dùng: </i></span>" + response["data"][0]["route_of_use"];
                        document.getElementById("dosage").innerHTML = "<span class='text-muted'><i>Dạng bào chế: </i></span>" + response["data"][0]["dosage"];
                        document.getElementById("content").innerHTML = "<span class='text-muted'><i>Hàm lượng: </i></span>" + response["data"][0]["content"];
                        if(response["data"][0]["instruction"]) {
                            document.getElementById("instruction").innerHTML = "<span style='color: red'>Hướng dẫn sử dụng: </span>" + response["data"][0]["instruction"];
                        } else {
                            document.getElementById("instruction").innerHTML = "";
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            $("#viewModal").modal("show");
        }

        /**
         * Confirm delete category
         * @param id
         */
        function confirmDelete(id) {
            $("#id_product").val(id);
            $("#deleteModal").modal("show");
        }
    </script>
@endsection
