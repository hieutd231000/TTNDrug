<style>
    .body {
        padding: 20px;
    }
    .btn-save {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1) !important;
        color: #fff !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        cursor: pointer;
    }
    .btn-raised {
        border-radius: 2px;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%);
        border: none;
    }
    .btn-cancel {
        background-color: #cbcdcf !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        color: #3a3a3a !important;
    }
    .g-bg-cyan {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1);
        color: #fff !important;
    }
    .card .header {
        padding: 20px 20px 0px 20px;
    }
    .card .body {
        padding: 20px;
    }
    .no-resize {
        resize: none;
    }
    .active {
        border-color: #dee2e6 #dee2e6 #dee2e6 !important;
    }
    .text-bg-light {
        color: #000 !important;
        background-color: #e9e9e9 !important;
    }
    .hidden {
        display: none !important;
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
                        <h4 class="m-0">Danh sách đơn hàng</h4>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        @if (session('failed'))
            <div class="alert alert-danger" style="display: inline-block">
                {{ session('failed') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success" style="display: inline-block">
                {{ session('success') }}
            </div>
        @endif
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid" style="margin-bottom: 25px">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#verifyOrder" class="nav-link active" data-toggle="tab">Xác nhận đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="#listOrder" class="nav-link" data-toggle="tab">Tình trạng đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane padding-20 in active" id="verifyOrder">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Đơn hàng chờ xác nhận</h5>
                                </div>
                                <div class="col-sm-12">
                                    <div class="alert alert-success hidden" id="confirmation" style="display: inline-block; padding: 8px; margin-top: 15px">
                                    </div>
                                </div>
                                @foreach($listOrderUnverified as $data)
                                    <form>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="card-body" style="padding-bottom: 0px">
                                            <div class="card text-center text-bg-light">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">STT</th>
                                                            <th scope="col" style="width: 150px">Tên nhà cung cấp</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Danh sách sản phẩm</th>
                                                            <th scope="col">Lô sản xuất</th>
                                                            <th scope="col">Đơn giá</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col" style="width: 150px">Ngày đặt hàng</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$rank++}}</td>
                                                            <td>{{$data->supplier_name}}</td>
                                                            <td>{{$data->supplier_phone}}</td>
                                                            <td>
                                                                @foreach($data->list_product as $products)
                                                                    <p style="margin-bottom: 10px !important;">{{$products->product_name}}</p>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($data->list_product as $products)
                                                                    <p style="margin-bottom: 10px !important;">{{$products->production_batch_name}}</p>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($data->list_product as $products)
                                                                    <p style="margin-bottom: 10px !important;">{{$products->price_amount}} </p>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($data->list_product as $products)
                                                                    <p style="margin-bottom: 10px !important;">{{$products->amount}}</p>
                                                                @endforeach
                                                            </td>
                                                            <td>{{$data->price_order}} VNĐ</td>
                                                            <td>{{$data->order_time}}</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer btn btn-primary" onclick="verifyOrder({{$data->id}})" style="background-color: #007bff !important;">
                                                    Xác nhận đơn hàng
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane padding-20" id="listOrder">
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
                                            <th scope="col" style="width: 100px;">Lô sản xuất</th>
                                            <th scope="col" style="width: 65px;">Đơn giá</th>
                                            <th scope="col" style="width: 70px;">Số lượng</th>
                                            <th scope="col">Tổng giá</th>
                                            <th scope="col">Ngày đặt hàng</th>
                                            <th scope="col" style="width: 90px">Trạng thái</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listAllOrder as $key => $data)
                                            <tr>
                                                <td>{{$rankOrder ++}}</td>
                                                <td>{{$data->order_code}}</td>
                                                <td>{{$data->supplier_name}}</td>
                                                <td>
                                                    @foreach($data->list_product as $products)
                                                        <p style="margin-bottom: 10px !important;">{{$products->product_name}}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($data->list_product as $products)
                                                        <p style="margin-bottom: 10px !important;">{{$products->production_batch_name}}</p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($data->list_product as $products)
                                                        <p style="margin-bottom: 10px !important;">{{$products->price_amount}} </p>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($data->list_product as $products)
                                                        <p style="margin-bottom: 10px !important;">{{$products->amount}}</p>
                                                    @endforeach
                                                </td>
                                                <td>{{$data->price_order}} VNĐ</td>
                                                <td>{{$data->order_time}}</td>
                                                <td>
                                                    @if($data -> status  === 0)
                                                        <button class="btn btn-sm btn-danger " disabled style="opacity: 1 !important;">Chưa xác nhận</button>
                                                    @elseif($data -> status === 1)
                                                        <button class="btn btn-sm btn-primary" onclick="changeStatusOrder( {{ $data->id }} )">Đã xác nhận</button>
                                                    @elseif($data -> status === 2)
                                                        <button class="btn btn-sm btn-success" disabled style="opacity: 1 !important;">Đã nhận hàng</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="modal fade" id="changeStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="order_id" value="">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thay đổi trạng thái đơn hàng</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="border: none">
                            Lựa chọn trạng thái đơn hàng bạn muốn thay đổi
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger unConfirmOrder">Chưa xác nhận</button>
                            <button type="submit" class="btn btn-success receivedOrder">Đã nhận hàng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
@endsection

@section("custom-js")
    <script>
        /**
         * Datatable
         */
        $(function () {
            $("#listOrderTable").DataTable({
                paging: false,
                ordering: false,
                autoWidth: false,
                responsive: false,
                lengthChange: false,
                info: false,
                searching: false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ đơn hàng trên một trang",
                    "zeroRecords": "Không có đơn hàng",
                    "info": "Hiển thị trang _PAGE_ trên _PAGES_",
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
                .appendTo("#listOrderTable_wrapper .col-md-6:eq(0)");
        });

        $(document).ready(function(){
            $(".unConfirmOrder").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var id = $("input[name='order_id']").val();
                $.ajax({
                    url: "/admin/orders/un-confirm-order",
                    type:'POST',
                    data: {_token:_token, id:id},
                    success: function(response) {
                        setTimeout(function(){
                            location.reload();
                        }, 300);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });

            $(".receivedOrder").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var id = $("input[name='order_id']").val();
                $.ajax({
                    url: "/admin/orders/received-order",
                    type:'POST',
                    data: {_token:_token, id:id},
                    success: function(response) {
                        setTimeout(function(){
                            location.reload();
                        }, 300);
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            });

        });

        const changeStatusOrder = (id) => {
            $("input[name='order_id']").val(id);
            $("#changeStatusModal").modal("show");
            // e.preventDefault();
            // var _token = $("input[name='_token']").val();
            // var id = $("input[name='order_id']").val();
            // $.ajax({
            //     url: "/admin/orders/change-status-order",
            //     type: 'POST',
            //     data: {_token: _token, id: id},
            //     success: function (response) {
            //         // console.log(response);
            //     },
            //     error: function (err) {
            //         console.log(err);
            //     }
            // });
        }

        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }
        const verifyOrder = (id) => {
            var _token = $("input[name='_token']").val();
            $.ajax({
                url: "/admin/orders/verify-order",
                type:'POST',
                data: {_token:_token, id:id, status:1},
                success: function(response) {
                    var alertDiv = document.getElementById("confirmation");
                    alertDiv.classList.remove("hidden");
                    alertDiv.innerHTML += response["message"];
                    setTimeout(function(){
                        location.reload();
                    }, 400);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

    </script>
@endsection
