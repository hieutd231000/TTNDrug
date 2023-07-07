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
    .slide-container{
        max-width: 1120px;
        width: 100%;
        padding: 40px 0;
    }
    .slide-content{
        margin: 0 40px;
        overflow: hidden;
        border-radius: 25px;
    }
    .swiper-slide {
        transition: all .2s ease-out;
    }
    .swiper-slide:hover {
        transform: translateY(-0.8rem) scale(1.05) !important;
    }
    .btn-padding {
        padding: 0px 8px !important;
    }
    .card{
        border-radius: 25px;
        background-color: #FFF;
    }
    .image-content,
    .card-content{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px 14px;
    }
    .image-content{
        position: relative;
        row-gap: 5px;
        padding: 0 0 10px 0;
    }
    .overlay::before,
    .overlay::after{
        content: '';
        position: absolute;
        right: 0;
        bottom: -40px;
        height: 40px;
        width: 40px;
        background-color: #4070F4;
    }
    .overlay::after{
        border-radius: 0 25px 0 0;
        background-color: #FFF;
    }
    .card-image{
        position: relative;
        height: 185px;
        width: 208px;
        border-radius: 50%;
        background: #FFF;
        padding: 3px;
    }
    .swiper-navBtn{
        color: #6E93f7;
        transition: color 0.3s ease;
    }
    .swiper-navBtn:hover{
        color: #4070F4;
    }
    .swiper-navBtn::before,
    .swiper-navBtn::after{
        font-size: 35px;
    }
    .swiper-button-next{
        right: 0 !important;
    }
    .swiper-button-prev{
        left: 0 !important;
    }
    .swiper-pagination {
        transform: translate(-50%, 118%) !important;
        /*transform: translateY(-50%) !important;*/
    }
    .name{
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }
    .swiper-pagination-bullet{
        background-color: #6E93f7;
        opacity: 1;
    }
    .swiper-pagination-bullet-active{
        background-color: #4070F4;
    }
    @media screen and (max-width: 768px) {
        .slide-content{
            margin: 0 10px;
        }
        .swiper-navBtn{
            display: none;
        }
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

    /*@-webkit-keyframes checkmark {*/
    /*    0% {*/
    /*        height: 0;*/
    /*        width: 0;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    20% {*/
    /*        height: 0;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    40% {*/
    /*        height: 75px;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    100% {*/
    /*        height: 75px;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*}*/
    /*@-moz-keyframes checkmark {*/
    /*    0% {*/
    /*        height: 0;*/
    /*        width: 0;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    20% {*/
    /*        height: 0;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    40% {*/
    /*        height: 75px;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    100% {*/
    /*        height: 75px;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*}*/
    /*@keyframes checkmark {*/
    /*    0% {*/
    /*        height: 0;*/
    /*        width: 0;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    20% {*/
    /*        height: 0;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    40% {*/
    /*        height: 75px;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*    100% {*/
    /*        height: 75px;*/
    /*        width: 37.5px;*/
    /*        opacity: 1;*/
    /*    }*/
    /*}*/
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
                            <select id="standard-select" style="height: 38px; width: 400px; padding-left: 5px">
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
                @isset ($listProductBySupplierId)
                    @if (count($listProductBySupplierId))
                        <div class="row clearfix" style="margin-top: 10px">
                            <div class="col-sm-12" style="text-align: end; margin-bottom: 10px">
                                <a class="btn btn-success" href="/admin/suppliers/{{$supplierDetailId}}/detail" style="width: 100px">Thêm sản phẩm</a>
                                <a class="btn btn-danger" href="/admin/production-batch" style="width: 100px">Thêm lô sản xuất</a>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                        Chọn sản phẩm
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <form class="form-inline">
                                                    <input class="form-control" type="text" id="productNameSearch" name="productNameSearch" style="width: 100%" placeholder="Nhập tên sản phẩm" aria-label="Search">
{{--                                                    <button class="btn btn-primary handleProductNameSearch" type="submit" style="width: 10%">Tìm kiếm</button>--}}
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row clearfix" style="margin: 40px 0 20px 0">
                                            <div class="slide-container swiper" style="padding-bottom: 25px">
                                                <div class="slide-content">
                                                    <div class="card-wrapper swiper-wrapper">
                                                        @foreach($listProductBySupplierId as $key => $data)
                                                            <div class="card swiper-slide" id="{{$data[0]->search_product_name}}">
{{--                                                            <div class="card">--}}
                                                                <div class="image-content">
                                                                    <span class="overlay"></span>
                                                                    <div class="card-image">
                                                                        <img id="card-img" class="card-img"  src="{{ URL::asset('image/products').'/'.$data[0]->product_image}}" alt="pic" />
                                                                    </div>
                                                                </div>
                                                                <div class="card-content">
                                                                    <h2 class="name">{{$data[0]->product_name}}</h2>
                                                                    <select name="production_batch_selected" id="{{$data[0]->production_batch_id}}" style="width: 60%; margin-top: 8px; height: 30px; margin-bottom: 6px;">
                                                                        <option value="" disabled selected>Lô sản xuất</option>
                                                                        @foreach($data[0]->production_batch as $key_production_batch => $data_production_batch)
                                                                            @if($data_production_batch->expired_status)
                                                                                <option value={{$data_production_batch->production_batch_name}}>{{$data_production_batch->production_batch_name}}</option>
                                                                            @else
                                                                                <option value={{$data_production_batch->production_batch_name}} disabled>{{$data_production_batch->production_batch_name}}</option>
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="price" id="{{$data[0]->product_code}}" placeholder="Nhập giá (VNĐ)" style="width: 60%; margin-bottom: 5px; font-size: 14px">
                                                                    <div style="display: flex">
{{--                                                                        <input type="button" onclick="subtractCount({{$key}})" value="-">--}}
                                                                        <input type="text" style="width: 40px; text-align: center; font-size: 14px" id="{{$data[0]->id}}" placeholder="SL:">
{{--                                                                        <input type="button" onclick="increaseCount({{$key}})" value="+">--}}
                                                                    </div>
                                                                    <button class="btn btn-secondary" onclick="addNewProduct({{$data[0]->id}}, '{{$supplierDetail->id}}', '{{$data[0]->product_name}}', '{{$data[0]->category_name}}', '{{$data[0]->product_code}}', '{{$data[0]->production_batch_id}}')" style="margin-top: 10px; font-size: 14px">Thêm sản phẩm</button>
                                                                    <p id="{{$data[0]->product_name}}" style="color: red; height: 40px"></p>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                <div class="swiper-button-next swiper-navBtn"></div>
                                                <div class="swiper-button-prev swiper-navBtn"></div>
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                                <div class="card">
                                    <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                        Danh sách sản phẩm
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix" style="margin: 10px 0 0 0">
                                            <div class="card">
                                                <div class="card-body table-responsive p-0" style="">
                                                    <table class="table table-head-fixed text-nowrap" id="cartTable">
                                                        <thead>
                                                            <tr>
                                                                <th style="width: 200px">Tên sản phẩm</th>
                                                                <th style="width: 250px">Danh mục</th>
                                                                <th style="width: 180px">Lô sản xuất</th>
                                                                <th style="width: 130px">Số lượng</th>
                                                                <th style="width: 150px">Đơn giá</th>
                                                                <th style="width: 200px">Tổng giá</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="productTable">
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-footer" id="total_price" style="color: #0006ff">
                                                    Tổng tiền: 0 VNĐ
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <p style="color: red" id="validateEmptyCart"></p>
                                            <div class="row clearfix">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div id="help-block-confirm" style="color: red">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted" style="padding-top: 0px">
                                        <button class="btn btn-primary" onclick="handleConfirmCard()" style="width: 100%">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="card">
                                    <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                        Thông tin chi tiết
                                    </div>
                                    <div class="body">
                                        <form>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <div class="container-form">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <div class="form-block">
                                                            <p id="confirm_price">Tổng tiền: 0 VNĐ</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-block" style="margin-bottom: 3px !important;">
                                                            <input type="text" class="form-control" value="{{ old("order_time") }}" name="order_time" placeholder="Thời gian đặt hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker" disabled autocomplete="off"/>
                                                        </div>
                                                        <div id="help-block-order_time" style="color: red">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-block">
                                                            <textarea name="detail" id="detail" rows="4" class="form-control no-resize" placeholder="Thông tin thêm" disabled></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="text-align: end">
                                                    <button class="btn btn-cancel handleCancel" id="handleCancelBtn" disabled>Huỷ</button>
                                                    <button class="btn btn-primary handleOrder" id="handleOrderBtn" disabled>Đặt hàng</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p style="color:red;">Nhà cung cấp này không có sản phẩm</p>
                    @endif
                @endisset
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

        // Slider
        let swiper = new Swiper(".slide-content", {
            slidesPerView: 'auto',
            spaceBetween: 25,
            // loop: true,
            centerSlide: 'true',
            fade: 'true',
            grabCursor: 'true',
            a11y: false,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },

            breakpoints:{
                // when window width is <= 499px
                333: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 30
                },
                // when window width is <= 999px
                666: {
                    slidesPerView: 2,
                    spaceBetweenSlides: 40
                },
                999: {
                    slidesPerView: 3,
                    spaceBetweenSlides: 40
                },
            },
        });

        /**
         * Handle when chose supplier
         */
        const handleChose = () => {
            let supplier_search = $('#standard-select').find(":selected").val();
            if(supplier_search === "null") {
                document.getElementById("help-block-supplier").innerHTML = "Mời bạn chọn nhà cung cấp";
            } else {
                document.getElementById("help-block-supplier").innerHTML = "";
                window.location.href = "/admin/orders/" + supplier_search + "/product";
            }
        }

        /**
         * Handle when click confirm button
         */
        const handleConfirmCard = () => {
            document.getElementById("confirm_price").innerHTML = "Tổng tiền: " + total_price + " VNĐ";
            if(total_price) {
                document.getElementById("handleCancelBtn").disabled = false;
                document.getElementById("validateEmptyCart").innerHTML = "";
                document.getElementById("handleOrderBtn").disabled = false;
                document.getElementById("detail").disabled = false;
                document.getElementById("reservationdate").disabled = false;
            } else {
                document.getElementById("handleCancelBtn").disabled = true;
                document.getElementById("validateEmptyCart").innerHTML = "Mời bạn chọn sản phẩm";
                document.getElementById("handleOrderBtn").disabled = true;
                document.getElementById("detail").disabled = true;
                document.getElementById("reservationdate").disabled = true;
            }
        };

        /**
         * Handle when search box
         */
        document.getElementById("productNameSearch").addEventListener('keyup', function(){
            console.log(this.value);
            const allProduct = document.querySelectorAll('[id^="sch_pro_"]');
            for(let product of allProduct) {
                const product_search = product.id.split('_');
                if(product_search[2].includes(this.value)) {
                    console.log(product);
                    product.classList.remove("hidden");
                    swiper.update();
                } else {
                    product.classList.add("hidden");
                    swiper.update();
                }
            }
        });

        /**
         * Check validate
         * @param num
         * @returns {boolean}
         */
        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }
        const checkProductionBatchName = (name, supplier_id) => {
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            if (localStorage.getItem(storageSupplierOrder) !== null) {
                let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
                let parsedObject = JSON.parse(retrievedProductObject);
                for (let i = 0; i < parsedObject.length; i++) {
                    if(parsedObject[i].production_batch_name === name)
                        return 0;
                }
                return 1;
            }
            return 1;
        }
        const getRandomOrderCode = () => {
            let randomOrderCode = "#";
            const now = new Date();
            const currentYear = now.getFullYear();
            const currentMonth = now.getMonth() + 1;
            const currentDate = now.getDate();
            randomOrderCode = randomOrderCode + currentYear + currentMonth + currentDate + Math.floor(Math.random() * 10000);
            return randomOrderCode;
        }

        /**
         * Handle add new orders
         */
        var supplierDetailId = {!! $supplierDetailId !!};
        var blockErrOrderTime= document.getElementById("help-block-order_time");
        $(document).ready(function(){
            $("#success_tic").modal("hide");
            if(supplierDetailId) {
                buildTableReload(supplierDetailId);
            }

            //Handle add new orders
            $(".handleOrder").click(function(e){
                e.preventDefault();
                console.log(productArray);
                order_code = getRandomOrderCode();
                order_time = $("input[name='order_time']").val();
                detail = $("textarea[name='detail']").val();
                // Check validate
                if(!order_time) {
                    blockErrOrderTime.innerHTML = "Không được để trống";
                } else {
                    blockErrOrderTime.innerHTML = "";
                }
                //Thành công
                if(!blockErrOrderTime.innerHTML) {
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/admin/orders/add-order",
                        type:'POST',
                        data: {_token:_token, supplier_id:supplierDetailId, listProduct:productArray, price_order:total_price,
                            order_code:order_code , order_time: order_time, detail: detail
                        },
                        success: function(response) {
                            $("#success_tic").modal("show");
                            $("input[name='order_time']").val("");
                            $("textarea[name='detail']").val("");
                            blockErrOrderTime.innerHTML = "";
                            removeItemStorage(supplierDetailId);
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
                $("input[name='order_time']").val("");
                $("textarea[name='detail']").val("");
            });
        });

        /**
         * Handle add product to cart
         * @type {*[]}
         */
        productArray = [];
        var total_price = 0;
        const buildStorage = (supplier_id) => {
            let storedArray = JSON.stringify(productArray);
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            localStorage.setItem(storageSupplierOrder, storedArray);
        }
        const buildTableReload = (supplier_id) => {
            $("#productTable").empty();
            total_price = 0;
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let parsedObject = JSON.parse(retrievedProductObject);
            for (let i = 0; i < parsedObject.length; i++) {
                productArray.push({
                    product_id: parsedObject[i].id,
                    product_name: parsedObject[i].product_name,
                    category_name: parsedObject[i].category_name,
                    amount: parsedObject[i].amount,
                    price: parsedObject[i].price,
                    production_batch_name: parsedObject[i].production_batch_name,
                    total_price: parsedObject[i].total_price
                });
                total_price += parseInt(parsedObject[i].total_price, 10);
                addProductToTable(i, supplier_id, parsedObject[i].product_name, parsedObject[i].category_name, parsedObject[i].production_batch_name, parsedObject[i].amount, parsedObject[i].price, parsedObject[i].total_price);
            }
            document.getElementById("total_price").innerHTML = "Tổng tiền: " + total_price + " VNĐ";
        }
        const buildTable = (supplier_id) => {
            $("#productTable").empty();
            total_price = 0;
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let parsedObject = JSON.parse(retrievedProductObject);
            for (let i = 0; i < parsedObject.length; i++) {
                total_price += parseInt(parsedObject[i].total_price, 10);
                addProductToTable(i, supplier_id, parsedObject[i].product_name, parsedObject[i].category_name, parsedObject[i].production_batch_name, parsedObject[i].amount, parsedObject[i].price, parsedObject[i].total_price);
            }
            document.getElementById("total_price").innerHTML = "Tổng tiền: " + total_price + " VNĐ";
        }
        const addProductToTable = (index, supplier_id, name, category, production_batch_name, amount, price, totalPrice) => {
            let table = document.getElementById("cartTable").getElementsByTagName('tbody')[0];
            let row = table.insertRow(-1);
            let cell1 = row.insertCell(0);
            let cell2 = row.insertCell(1);
            let cell3 = row.insertCell(2);
            let cell4 = row.insertCell(3);
            let cell5 = row.insertCell(4);
            let cell6 = row.insertCell(5);
            var deleteRow = row.insertCell(6);
            cell1.innerHTML = name;
            cell2.innerHTML = category;
            cell3.innerHTML = production_batch_name;
            cell4.innerHTML = amount;
            cell5.innerHTML = price + " VNĐ";
            cell6.innerHTML = totalPrice + "<span> VNĐ</span>";
            //Create button
            let button = document.createElement("button");
            button.innerText = "Xoá";
            button.className = "btn btn-sm btn-danger btn-padding";
            deleteRow.appendChild(button);
            button.addEventListener('click', function(event){
                console.log(event);
                document.getElementById("cartTable").deleteRow(index + 1);
                productArray.splice(index, 1);
                buildStorage(supplier_id);
                buildTable(supplier_id);
            });
        }
        const addNewProduct = (id, supplier_id, name, category, code, production_batch_id) => {
            if(!document.getElementById(id).value || !document.getElementById(code).value || !document.getElementById(production_batch_id).value) {
                document.getElementById(name).innerHTML = "Không được bỏ trống !";
            } else if(!checkNumber(document.getElementById(id).value) || !checkNumber(document.getElementById(code).value)) {
                document.getElementById(name).innerHTML = "Sai định dạng !";
            } else if(parseInt(document.getElementById(code).value) === 0) {
                document.getElementById(name).innerHTML = "Giá nhập phải lớn hơn 0 !";
            } else if(parseInt(document.getElementById(id).value) === 0 ) {
                document.getElementById(name).innerHTML = "Số lượng phải lớn hơn 0 !";
            } else if(!checkProductionBatchName(document.getElementById(production_batch_id).value, supplier_id)) {
                document.getElementById(name).innerHTML = "Lô sản phẩm đã tồn tại !";
            } else {
                document.getElementById(name).innerHTML = "";
            }
            if(!document.getElementById(name).innerHTML) {
                let value = parseInt(document.getElementById(id).value, 10);
                let price = parseInt(document.getElementById(code).value, 10);
                console.log(value);
                if(!isNaN(value) && value > 0 && !isNaN(price) && price > 0) {
                    //Add to product array
                    productArray.push({
                        product_id: id,
                        product_name: name,
                        category_name: category,
                        amount: document.getElementById(id).value,
                        price: document.getElementById(code).value,
                        production_batch_name: document.getElementById(production_batch_id).value,
                        total_price: (parseInt(document.getElementById(id).value, 10) * parseInt(document.getElementById(code).value, 10)).toString()
                    })
                    total_price +=  parseInt(document.getElementById(id).value, 10) * parseInt(document.getElementById(code).value, 10);
                    document.getElementById("total_price").innerHTML = "Tổng tiền: " + total_price + " VNĐ";
                    console.log(productArray);
                    document.getElementById(id).value = "";
                    document.getElementById(code).value = "";
                    document.getElementById(production_batch_id).value = "";
                    buildStorage(supplier_id);
                    buildTable(supplier_id);
                }
            }
        }
        const removeItemStorage = (supplier_id) => {
            let storageSupplierOrder = "supplier" + "_" + supplier_id;
            localStorage.removeItem(storageSupplierOrder);
        }

        /**
         * Datatable
         */
        // window.addEventListener('load', function () {
        //     $("#cartTable").DataTable({
        //         buttons: [
        //             "copy", "excel", "pdf",
        //             {
        //                 extend: 'print',
        //                 text: 'In',
        //             }
        //         ],
        //         paging: false,
        //         ordering: false,
        //         autoWidth: false,
        //         responsive: false,
        //         lengthChange: false,
        //         info: false,
        //         "language": {
        //             // // url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json',
        //             // "lengthMenu": "Hiển thị _MENU_ sản phẩm trên một trang",
        //             "zeroRecords": "Không có sản phẩm",
        //             // "info": "Hiển thị _START_ đến _END_ sản phẩm trên tổng số _TOTAL_ sản phẩm",
        //             "search": "Tìm kiếm:",
        //             // "infoEmpty": "",
        //             // "paginate": {
        //             //     "next":       "Sau",
        //             //     "previous":   "Trước"
        //             // },
        //             // "infoFiltered": "(filtered from _MAX_ total records)"
        //         }
        //     })
        //         .buttons()
        //         .container()
        //         .appendTo("#cartTable_wrapper .col-md-6:eq(0)");
        // });
        $(function () {
            $("#cartTable").DataTable({
                buttons: [
                    "copy", "excel", "pdf",
                    {
                        extend: 'print',
                        text: 'In',
                    }
                ],
                paging: false,
                ordering: false,
                autoWidth: false,
                responsive: false,
                lengthChange: false,
                info: false,
                "language": {
                    // // url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json',
                    // "lengthMenu": "Hiển thị _MENU_ sản phẩm trên một trang",
                    "zeroRecords": "Không có sản phẩm",
                    // "info": "Hiển thị _START_ đến _END_ sản phẩm trên tổng số _TOTAL_ sản phẩm",
                    "search": "Tìm kiếm:",
                    // "infoEmpty": "",
                    // "paginate": {
                    //     "next":       "Sau",
                    //     "previous":   "Trước"
                    // },
                    // "infoFiltered": "(filtered from _MAX_ total records)"
                }
            })
                .buttons()
                .container()
                .appendTo("#cartTable_wrapper .col-md-6:eq(0)");
        });
    </script>
@endsection
