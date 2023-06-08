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
                        <h4 class="m-0">Xác nhận đơn hàng</h4>
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
                                <h5>Thông tin đơn hàng</h5>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input class="form-control" type="text" name="suppilerName" value="{{$supplierDetail->name}}" style="margin-bottom: 2px" readonly>

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

        // var supplier, product, quantity, introduce, order_date;
        // var blockErrProduct = document.getElementById("help-block-product");
        // var blockErrQuantity = document.getElementById("help-block-quantity");
        // var blockErrOrderDate = document.getElementById("help-block-order_date");
        // var blockErrIntroduce = document.getElementById("help-block-introduce");
        // var blockErrSubmit = document.getElementById("help-block-submit");
        $(document).ready(function(){
            /**
             * Handle when chose supplier
             */
            //Handle add new orders
            // $(".handleSubmit").click(function(e){
            //     e.preventDefault();
            //     supplier = $("select[name='supplier[]']").val();
            //     product = $("select[name='product[]']").val();
            //     quantity = $("input[name='quantity']").val();
            //     order_date = $("input[name='order_date']").val();
            //     introduce = $("textarea[name='introduce']").val();
            //     // // Check validate
            //     if(!product) {
            //         blockErrProduct.innerHTML = "Vui lòng chọn sản phẩm";
            //     } else {
            //         blockErrProduct.innerHTML = "";
            //     }
            //     if(!quantity) {
            //         blockErrQuantity.innerHTML = "Không được để trống";
            //     } else if(!checkNumber(quantity)) {
            //         blockErrQuantity.innerHTML = "Thông tin bạn nhập không hợp lệ";
            //     } else {
            //         blockErrQuantity.innerHTML = "";
            //     }
            //     if(!order_date) {
            //         blockErrOrderDate.innerHTML = "Không được để trống";
            //     } else {
            //         blockErrOrderDate.innerHTML = "";
            //     }
            //     // //Thành công
            //     if(!blockErrProduct.innerHTML && !blockErrQuantity.innerHTML && !blockErrOrderDate.innerHTML) {
            //         var _token = $("input[name='_token']").val();
            //         $.ajax({
            //             url: "/admin/orders/add-order",
            //             type:'POST',
            //             data: {_token:_token, supplier:supplier, product:product,
            //                 amount:quantity , order_date:order_date, detail :introduce
            //             },
            //             success: function(response) {
            //                 var alertDiv = document.getElementById("notification");
            //                 alertDiv.classList.remove("hidden");
            //                 alertDiv.innerHTML += response["message"];
            //                 setTimeout(function(){
            //                     location.reload();
            //                 }, 600);
            //             },
            //             error: function (err) {
            //                 console.log(err);
            //             }
            //         });
            //     }
            // });
            // $(".handleCancel").click(function(e){
            //     e.preventDefault();
            //     $('#supplier_id option:first-child').attr("selected", "selected");
            //     $("input[name='quantity']").val("");
            //     $("input[name='order_date']").val("");
            //     $("textarea[name='introduce']").val("");
            //     blockErrProduct.innerHTML = "";
            //     blockErrQuantity.innerHTML = "";
            //     blockErrOrderDate.innerHTML = "";
            //     blockErrIntroduce.innerHTML = "";
            // });
        });
        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }
    </script>
@endsection