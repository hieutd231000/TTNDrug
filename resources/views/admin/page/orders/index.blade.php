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
                        <h4 class="m-0">Đặt hàng</h4>
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
                <div class="row clearfix">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px">
                        <div class="select">
                            <select id="standard-select" style="height: 38px; width: 300px; padding-left: 5px">
                                <option value="null" disabled selected>Chọn nhà cung cấp</option>
                                @if(isset($supplierDetail))
                                    @foreach($listSupplier as $key => $data)
                                        <option value={{$data->id}} {{ $supplierDetail->id == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                                    @endforeach
                                @else
                                    @foreach($listSupplier as $key => $data)
                                        <option value={{$data->id}}>{{$data->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="focus"></span>
                            <input class="btn btn-primary" onclick="handleChose()" type="button" value="Chọn" style="margin-bottom: 5px">
                            <div id="help-block-supplier" style="color: red">
                            </div>
                        </div>
                    </div>
                </div>
{{--                        <form>--}}
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="header">--}}
{{--                                        <div class="col-sm-12">--}}
{{--                                            <div class="alert alert-success hidden" id="notification" style="display: inline-block; padding: 8px">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <h5>Thông tin đơn hàng</h5>--}}
{{--                                    </div>--}}
{{--                                    <div class="body">--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="form-block">--}}
{{--                                                        <select class="form-control" name="supplier[]" id="supplier_id" style="margin-bottom: 2px">--}}
{{--                                                            <option value="Nha cung cap" disabled selected>Nhà cung cấp *</option>--}}
{{--                                                            @foreach($listSupplier as $key => $data)--}}
{{--                                                                <option value="{{$data->name}}">{{$data->name}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}

{{--                                                        <select class="form-control attribute" name="product[]" id="product_id" style="margin-top: 15px">--}}
{{--                                                            <option value="" disabled selected>Chọn sản phẩm *</option>--}}
{{--                                                        </select>--}}
{{--                                                        <div id="help-block-product" style="color: red; margin-left: 16px">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="form-block">--}}
{{--                                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Số lượng *" value="{{ old("quantity") }}">--}}
{{--                                                    </div>--}}
{{--                                                    <div id="help-block-quantity" style="color: red; margin-left: 16px">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-6">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="form-block">--}}
{{--                                                        <input type="text" class="form-control" name="order_date" placeholder="Ngày đặt hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>--}}
{{--                                                    </div>--}}
{{--                                                    <div id="help-block-order_date" style="color: red; margin-left: 16px">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <div class="form-block">--}}
{{--                                                        <textarea name="introduce" id="introduce" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản...">{{ old("detail") }}</textarea>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-sm-12">--}}
{{--                                                <button type="button" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit" style="margin-right: 3px">Đặt hàng</button>--}}
{{--                                                <button type="button" class="btn btn-cancel handleCancel">Huỷ</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section("custom-js")
    <script>
        //Date picker
        // $('#reservationdate').datetimepicker({
        //     format: 'L'
        // });
        // $('#reservationdate1').datetimepicker({
        //     format: 'L'
        // });

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
            // $(".handleChoseSupplier").click(function(e){
            //     e.preventDefault();
            //     // var _token = $("input[name='_token']").val();
            //     // var supplier_id = $("select[name='supplier-select']").val();
            //     // var blockErrSupplier = document.getElementById("help-block-supplier");
            //     // // Check validate
            //     // if(!supplier_id) {
            //     //     blockErrSupplier.innerHTML = "Mời bạn chọn nhà cung cấp";
            //     // } else {
            //     //     blockErrSupplier.innerHTML = "";
            //     // }
            //     // if(!blockErrSupplier.innerHTML) {
            //     //     $.ajax({
            //     //         url: "/admin/suppliers/get-product",
            //     //         type: 'GET',
            //     //         data: {_token: _token, id: supplier_id},
            //     //         success: function (response) {
            //     //             blockErrSupplier.innerHTML = "";
            //     //             console.log(response);
            //     //         },
            //     //         error: function (err) {
            //     //             console.log(err);
            //     //         }
            //     //     });
            //     // }
            // });
        });
        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }
        /**
         * Handle when chose supplier
         */
        const handleChose = () => {
            var supplier_search = $('#standard-select').find(":selected").val();
            if(supplier_search === "null") {
                document.getElementById("help-block-supplier").innerHTML = "Mời bạn chọn nhà cung cấp";
            } else {
                document.getElementById("help-block-supplier").innerHTML = "";
                window.location.href = "/admin/suppliers/" + supplier_search + "/detail";
            }
        }
    </script>
@endsection
