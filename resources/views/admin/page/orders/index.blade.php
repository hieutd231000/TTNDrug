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
                        <h4 class="m-0">Danh sách order</h4>
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
                            <a href="#order" class="nav-link active" data-toggle="tab">Đặt hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="#verifyOrder" class="nav-link" data-toggle="tab">Xác nhận đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="#listOrder" class="nav-link" data-toggle="tab">Danh sách đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="tab-content">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="text-align: end">
                    </div>
                    <div role="tabpanel" class="tab-pane padding-20 in active" id="order">
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success hidden" id="notification" style="display: inline-block; padding: 8px">
                                            </div>
                                        </div>
                                        <h5>Thông tin đơn hàng</h5>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <select class="form-control" name="supplier[]" id="supplier_id" style="margin-bottom: 2px">
                                                            <option value="Nha cung cap" disabled selected>Nhà cung cấp *</option>
                                                            @foreach($listSupplier as $key => $data)
                                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                                            @endforeach
                                                        </select>

                                                        <select class="form-control attribute" name="product[]" id="product_id" style="margin-top: 15px">
                                                            <option value="" disabled selected>Chọn sản phẩm *</option>
                                                        </select>
                                                        <div id="help-block-product" style="color: red; margin-left: 16px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Số lượng *" value="{{ old("quantity") }}">
                                                    </div>
                                                    <div id="help-block-quantity" style="color: red; margin-left: 16px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" class="form-control" name="order_date" placeholder="Ngày đặt hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
                                                    </div>
                                                    <div id="help-block-order_date" style="color: red; margin-left: 16px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <textarea name="introduce" id="introduce" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản...">{{ old("detail") }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit" style="margin-right: 3px">Đặt hàng</button>
                                                <button type="button" class="btn btn-cancel handleCancel">Huỷ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane padding-20" id="verifyOrder">
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
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Tên nhà cung cấp</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col">Ngày đặt hàng</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>{{$rank++}}</td>
                                                            <td>{{$data->product_name}}</td>
                                                            <td>{{$data->supplier_name}}</td>
                                                            <td>{{$data->supplier_email}}</td>
                                                            <td>{{$data->supplier_phone}}</td>
                                                            <td>{{$data->amount}}</td>
                                                            <td>{{$data->amount * $data->price_unit}} VNĐ</td>
                                                            <td>{{$data->order_date}}</td>
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
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Tên nhà cung cấp</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">SĐT</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Tổng giá</th>
                                            <th scope="col">Ngày đặt hàng</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                    --}}{{--                                    @foreach($category as $key => $data)--}}
                                        {{--                                    <tr>--}}
                                        {{--                                        <td>fdgd</td>--}}
                                        {{--                                        <td>gfdgdf</td>--}}
                                        {{--                                        <td style="width: 50%;">gfdgdf</td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            gfdgfd--}}
                                        {{--                                        </td>--}}
                                        {{--                                    </tr>--}}
                                        {{--                                    --}}{{--                                    @endforeach--}}
                                        </tbody>
                                    </table>
                                </div>
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
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#reservationdate1').datetimepicker({
            format: 'L'
        });

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

        var proNamebysupName = {!! $proNamebysupName !!};
        var listSupplierName = {!! $listSupplierName !!};
        var attribute = {}
        var supplier, product, quantity, introduce, order_date;
        var blockErrProduct = document.getElementById("help-block-product");
        var blockErrQuantity = document.getElementById("help-block-quantity");
        var blockErrOrderDate = document.getElementById("help-block-order_date");
        var blockErrIntroduce = document.getElementById("help-block-introduce");
        // var blockErrSubmit = document.getElementById("help-block-submit");
        $(document).ready(function(){
            addSupplierName();
            getAllProductNameBySupplierName();
            console.log(attribute);
            $('select[name*="[]"]').each(function(){
                $('select[name*="[]"]').change(function () {
                    var $attribute = $(this).next('.attribute');
                    var product = $(this).val(), lcns = attribute[product] || [];
                    var html = $.map(lcns, function(lcn){
                        return '<option value="' + lcn + '">' + lcn + '</option>'
                    }).join('');
                    $attribute.html(html)
                });
            });
            //Handle add new orders
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                supplier = $("select[name='supplier[]']").val();
                product = $("select[name='product[]']").val();
                quantity = $("input[name='quantity']").val();
                order_date = $("input[name='order_date']").val();
                introduce = $("textarea[name='introduce']").val();
                // // Check validate
                if(!product) {
                    blockErrProduct.innerHTML = "Vui lòng chọn sản phẩm";
                } else {
                    blockErrProduct.innerHTML = "";
                }
                if(!quantity) {
                    blockErrQuantity.innerHTML = "Không được để trống";
                } else if(!checkNumber(quantity)) {
                    blockErrQuantity.innerHTML = "Thông tin bạn nhập không hợp lệ";
                } else {
                    blockErrQuantity.innerHTML = "";
                }
                if(!order_date) {
                    blockErrOrderDate.innerHTML = "Không được để trống";
                } else {
                    blockErrOrderDate.innerHTML = "";
                }
                // //Thành công
                if(!blockErrProduct.innerHTML && !blockErrQuantity.innerHTML && !blockErrOrderDate.innerHTML) {
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/admin/orders/add-order",
                        type:'POST',
                        data: {_token:_token, supplier:supplier, product:product,
                            amount:quantity , order_date:order_date, detail :introduce
                        },
                        success: function(response) {
                            var alertDiv = document.getElementById("notification");
                            alertDiv.classList.remove("hidden");
                            alertDiv.innerHTML += response["message"];
                            setTimeout(function(){
                                location.reload();
                            }, 2000);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            $(".handleCancel").click(function(e){
                e.preventDefault();
                $('#supplier_id option:first-child').attr("selected", "selected");
                $("input[name='quantity']").val("");
                $("input[name='order_date']").val("");
                $("textarea[name='introduce']").val("");
                blockErrProduct.innerHTML = "";
                blockErrQuantity.innerHTML = "";
                blockErrOrderDate.innerHTML = "";
                blockErrIntroduce.innerHTML = "";
            });
        });
        const getAllProductNameBySupplierName = () => {
            for(var i=0; i<proNamebysupName.length; i++) {
                attribute[proNamebysupName[i]["supplier_name"]].push(proNamebysupName[i]["product_name"]);
            }
        }
        const addSupplierName = () => {
            for(var i=0; i<listSupplierName.length; i++) {
                attribute[listSupplierName[i]] = [];
            }
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
                    }, 1000);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    </script>
@endsection
