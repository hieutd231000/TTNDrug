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
                        <h4 class="m-0">Danh sách nhập hàng</h4>
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
                                                            <th scope="col">Mã đơn hàng</th>
                                                            <th scope="col" style="width: 150px">Tên nhà cung cấp</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Danh sách dược phẩm</th>
                                                            <th scope="col">Lô sản xuất</th>
                                                            <th scope="col">Đơn giá</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col" style="width: 150px">Ngày nhập hàng</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$data->order_code}}</td>
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
                        <div class="d-flex justify-content-end" style="margin-right: 3%">
                            {!! $listOrderUnverified->appends($_GET)->links("pagination::bootstrap-4") !!}
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
                                            <th scope="col" style="width: 100px;">Dược phẩm</th>
                                            <th scope="col" style="width: 100px;">Lô sản xuất</th>
                                            <th scope="col" style="width: 65px;">Đơn giá</th>
                                            <th scope="col" style="width: 70px;">Số lượng</th>
                                            <th scope="col">Tổng giá</th>
                                            <th scope="col">Ngày nhập hàng</th>
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
                                <div class="d-flex justify-content-end" style="margin-right: 3%">
                                    {!! $listAllOrder->appends($_GET)->links("pagination::bootstrap-4") !!}
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
        <div class="modal fade" id="receivedOrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thông tin nhận hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="order_received_id" value="">
                            <div class="form-group">
                                <div class="form-block" style="margin-bottom: 3px !important;">
                                    <input type="text" class="form-control" value="{{ old("order_time") }}" name="order_time" placeholder="Thời gian nhận hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker" autocomplete="off"/>
                                </div>
                                <div id="help-block-order_time" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <select data-placeholder="Lựa chọn người nhận hàng..." multiple class="chosen-select" style="margin-bottom: 3px" name="user_choice">
                                    <option value=""></option>
                                    @foreach($listUser as $key => $data)
                                        <option value="{{$data->id}}">{{$data->fullname}}</option>
                                    @endforeach
                                </select>
                                <div id="help-block-user-choice" style="color: red">
                                </div>
                                <div id="help-block-success-order-received" style="color: green">
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-primary handleReceivedOrderModal">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("custom-js")
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format:'DD/MM/YYYY HH:mm:ss',
            maxDate: getFormattedDate(new Date())
        });
        function getFormattedDate(date) {
            var day = date.getDate() + 1;
            var month = date.getMonth() + 1;
            var year = date.getFullYear().toString().slice(2);
            return month + '-' + day + '-' + year;
        }

        /**
         * Datatable
         */
        $(function () {
            $("#listOrderTable").DataTable({
                paging: false,
                ordering: false,
                info: false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ đơn hàng trên một trang",
                    "zeroRecords": "Không có đơn hàng",
                    "info": "Hiển thị trang _PAGE_ trên _PAGES_",
                    "search": "Tìm kiếm:",
                    "infoEmpty": "",
                    "paginate": {
                        "next":       "Tiếp",
                        "previous":   "Trước"
                    },
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
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
                // var _token = $("input[name='_token']").val();
                var id = $("input[name='order_id']").val();
                $("input[name='order_received_id']").val(id);
                $("#changeStatusModal").modal("hide");
                $("#receivedOrderModal").modal("show");
                // $.ajax({
                //     url: "/admin/orders/received-order",
                //     type:'POST',
                //     data: {_token:_token, id:id},
                //     success: function(response) {
                //         setTimeout(function(){
                //             location.reload();
                //         }, 300);
                //     },
                //     error: function (err) {
                //         console.log(err);
                //     }
                // });
            });

            $(".handleReceivedOrderModal").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var order_id = $("input[name='order_received_id']").val();
                var order_time = $("input[name='order_time']").val();
                var user_id = $("select[name='user_choice']").val();
                var blockErrOrderTime = document.getElementById("help-block-order_time");
                var blockErrUserChoice = document.getElementById("help-block-user-choice");
                var blockSuccessOrderReceived = document.getElementById("help-block-success-order-received");
                console.log(user_id);
                // Check validate
                if(!order_time) {
                    blockErrOrderTime.innerHTML = "Mời bạn nhập ngày nhận hàng";
                } else {
                    blockErrOrderTime.innerHTML = "";
                }
                if(!user_id.length) {
                    blockErrUserChoice.innerHTML = "Mời bạn chọn người dùng";
                } else {
                    blockErrUserChoice.innerHTML = "";
                }
                if(!blockErrUserChoice.innerHTML && !blockErrOrderTime.innerHTML){
                    $.ajax({
                        url: "/admin/orders/received-order",
                        type:'POST',
                        data: {_token:_token, order_id:order_id, order_user_received_id:user_id, order_received_time:order_time},
                        success: function(response) {
                            blockSuccessOrderReceived.innerHTML = "Xác nhận nhận đơn hàng thành công";
                            setTimeout(function(){
                                location.reload();
                            }, 600);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

        const changeStatusOrder = (id) => {
            $("input[name='order_id']").val(id);
            $("#changeStatusModal").modal("show");
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
        /**
         * Chosen jquery
         */
        $(".chosen-select").chosen({
            width: "100%",
        })
        $(".chosen-choices").css('font-size','14px');
        $(".chosen-choices").css('border','1px solid #ced4da');
        $(".chosen-choices").css('border-radius','0.25rem');
        $(".chosen-choices").css('min-height','38px');
        $(".search-field").css('margin-left','7px');
        $(".search-field").css('margin-top','4px');
        $(".search-choice").css('font-size','16px');
        $(".chosen-results").css('font-size','16px');
    </script>
@endsection
