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
    /*Success Modal*/
    #success_tic .page-body{
        max-width:300px;
        background-color:#FFFFFF;
        margin: 9% auto;
    }
    #success_tic .page-body .head{
        text-align:center;
    }
    /* #success_tic .tic{
      font-size:186px;
    } */
    #success_tic .close{
        opacity: 1;
        position: absolute;
        right: 0px;
        font-size: 30px;
        padding: 3px 15px;
        margin-bottom: 10px;
    }
    #success_tic .checkmark-circle {
        width: 150px;
        height: 150px;
        position: relative;
        display: inline-block;
        vertical-align: top;
    }
    .checkmark-circle .background {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #1ab394;
        position: absolute;
    }
    #success_tic .checkmark-circle .checkmark {
        border-radius: 5px;
    }
    #success_tic .checkmark-circle .checkmark.draw:after {
        -webkit-animation-delay: 300ms;
        -moz-animation-delay: 300ms;
        animation-delay: 300ms;
        -webkit-animation-duration: 1s;
        -moz-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-timing-function: ease;
        -moz-animation-timing-function: ease;
        animation-timing-function: ease;
        -webkit-animation-name: checkmark;
        -moz-animation-name: checkmark;
        animation-name: checkmark;
        -webkit-transform: scaleX(-1) rotate(135deg);
        -moz-transform: scaleX(-1) rotate(135deg);
        -ms-transform: scaleX(-1) rotate(135deg);
        -o-transform: scaleX(-1) rotate(135deg);
        transform: scaleX(-1) rotate(135deg);
        -webkit-animation-fill-mode: forwards;
        -moz-animation-fill-mode: forwards;
        animation-fill-mode: forwards;
    }
    #success_tic .checkmark-circle .checkmark:after {
        opacity: 1;
        height: 75px;
        width: 37.5px;
        -webkit-transform-origin: left top;
        -moz-transform-origin: left top;
        -ms-transform-origin: left top;
        -o-transform-origin: left top;
        transform-origin: left top;
        border-right: 15px solid #fff;
        border-top: 15px solid #fff;
        border-radius: 2.5px !important;
        content: '';
        left: 35px;
        top: 80px;
        position: absolute;
    }

    @-webkit-keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }
        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }
        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }
    @-moz-keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }
        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }
        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
    }
    @keyframes checkmark {
        0% {
            height: 0;
            width: 0;
            opacity: 1;
        }
        20% {
            height: 0;
            width: 37.5px;
            opacity: 1;
        }
        40% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
        100% {
            height: 75px;
            width: 37.5px;
            opacity: 1;
        }
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
                        <h4 class="m-0">Đơn hàng</h4>
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
            <div class="container-fluid">
                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <div class="col-sm-12">
                                    <div class="alert alert-success hidden" id="notification" style="display: inline-block; padding: 8px">
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6" style="margin-top: 15px">
                                        <h5 style="display: inline">Thông tin chi tiết</h5>
                                    </div>
                                    <div class="col-md-6" style="padding-left: 0; text-align: end">
                                        <a class="btn btn-primary" href="/admin/orders/{{$supplierDetail->id}}/product">Trở lại</a>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <form>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row clearfix">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" name="order_code" id="order_code" class="form-control" placeholder="Mã đơn hàng *" value="{{ old("order_code") }}">
                                                </div>
                                                <div id="help-block-order_code" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <input type="text" class="form-control" value="{{ old("order_time") }}" name="order_time" placeholder="Thời gian đặt hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
                                                </div>
                                                <div id="help-block-order_time" style="color: red">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-block">
                                                    <textarea name="detail" id="detail" rows="4" class="form-control no-resize" placeholder="Thông tin thêm">{{ old("detail") }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <button type="button" id="handleSubmitBtn" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit" style="margin-right: 3px">Đặt hàng</button>
                                            <button type="button" id="handleCancelBtn" class="btn btn-cancel handleCancel">Huỷ</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
            {{--Success Modal--}}
            <div id="success_tic" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" style="position: absolute; top: 80px; right: -45px">
                        <div class="page-body">
                            <div class="head">
                                <h4 style="margin-bottom: 15px">Tạo đơn hàng thành công</h4>
                            </div>
                            <h1 style="text-align:center;">
                                <div class="checkmark-circle">
                                    <div class="background"></div>
                                    <div class="checkmark draw"></div>
                                </div>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
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

        var productArray = [];
        var total_price = 0;
        var supplierDetail = {!! $supplierDetail !!};
        var listOrderCode = {!! $listOrderCode !!};
        var order_code, order_time, detail;
        var blockErrOrderCode= document.getElementById("help-block-order_code");
        var blockErrOrderTime= document.getElementById("help-block-order_time");
        var blockErrSubmit = document.getElementById("help-block-submit");
        $(document).ready(function(){
            $("#success_tic").modal("hide");
            getListProduct(supplierDetail["id"]);
            //Handle add new orders
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                console.log(productArray);
                order_code = $("input[name='order_code']").val();
                order_time = $("input[name='order_time']").val();
                detail = $("textarea[name='detail']").val();
                // // Check validate
                if(!order_code) {
                    blockErrOrderCode.innerHTML = "Không được bỏ trống";
                } else if(checkOrderCode(order_code)) {
                    blockErrOrderCode.innerHTML = "Mã đơn hàng đã được sử dụng";
                } else {
                    blockErrOrderCode.innerHTML = "";
                }
                if(!order_time) {
                    blockErrOrderTime.innerHTML = "Không được để trống";
                } else {
                    blockErrOrderTime.innerHTML = "";
                }
                //Thành công
                if(!blockErrOrderCode.innerHTML && !blockErrOrderTime.innerHTML) {
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/admin/orders/add-order",
                        type:'POST',
                        data: {_token:_token, supplier_id:supplierDetail["id"], listProduct:productArray, price_order:total_price,
                            order_code:order_code , order_time: order_time, detail: detail
                        },
                        success: function(response) {
                            $("#success_tic").modal("show");
                            $("input[name='order_code']").val("");
                            $("input[name='order_time']").val("");
                            $("textarea[name='detail']").val("");
                            blockErrOrderCode.innerHTML = "";
                            blockErrOrderTime.innerHTML = "";
                            removeItemStorage(supplierDetail["id"]);
                            setTimeout(function(){
                                window.location.href = "/admin/list-orders";
                            }, 1200);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
            //Handle cancel orders
            $(".handleCancel").click(function(e){
                e.preventDefault();
                $("input[name='order_code']").val("");
                $("input[name='order_time']").val("");
                $("textarea[name='detail']").val("");
                blockErrOrderCode.innerHTML = "";
                blockErrOrderTime.innerHTML = "";
            });
        });
        const getListProduct = (supplier_id) => {
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let parsedObject = JSON.parse(retrievedProductObject);
            for (let i = 0; i < parsedObject.length; i++) {
                productArray.push({
                    product_name: parsedObject[i].product_name,
                    amount: parsedObject[i].amount,
                    price_amount: parsedObject[i].price,
                    total_price: parsedObject[i].total_price,
                    production_batch_name: parsedObject[i].production_batch_name
                });
                total_price += parseInt(parsedObject[i].total_price, 10);
            }
        }
        const removeItemStorage = (supplier_id) => {
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            localStorage.removeItem(storageSupplierOrder);
        }
        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }
        const checkOrderCode = (code) => {
            return listOrderCode.indexOf(code) !== -1;
        }
    </script>
@endsection
