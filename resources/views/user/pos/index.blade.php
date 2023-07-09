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
    .margin-bottom-20 {
        margin-bottom: 20px;
    }
    .card .header {
        padding: 20px 20px 15px 20px;
    }
    .card .body {
        padding: 20px;
    }
    .form-block {
        border-bottom: 1px solid #bdbdbd;
    }
    .form-block .form-control {
        border: none !important;
        padding-left: 0 !important;
    }
    .btn-padding {
        padding: 0px 8px !important;
    }
    .no-resize {
        resize: none;
    }
    .btn-save {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1) !important;
        color: #fff !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        cursor: pointer;
    }
    .btn-cancel {
        background-color: #cbcdcf !important;
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%) !important;
        color: #3a3a3a !important;
    }
    .margin-right-3 {
        margin-right: 3px;
    }
    .card .header {
        padding: 20px 20px 0 20px !important;
    }
    .alert {
        display: inline-block;
        margin-bottom: 0 !important;
        padding: .5rem 1rem !important;
    }
    .hidden {
        display: none !important;
    }
    .swiper-hidden-slide {
        display:none !important;
        float:left;
    }
    /*.hideElement {*/
    /*    visibility: hidden !important;*/
    /*}*/
    .color-red {
        color: red;
    }
    .color-green {
        color: green;
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
    /*.overlay{*/
    /*    position: absolute;*/
    /*    left: 0;*/
    /*    top: 0;*/
    /*    height: 100%;*/
    /*    width: 100%;*/
    /*    background-color: #4070F4;*/
    /*    border-radius: 25px 25px 0 25px;*/
    /*}*/
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
    /*.card-image .card-img{*/
    /*    height: 100%;*/
    /*    width: 100%;*/
    /*    object-fit: cover;*/
    /*    border-radius: 50%;*/
    /*    border: 4px solid #4070F4;*/
    /*}*/
    .name{
        font-size: 18px;
        font-weight: 600;
        color: #333;
    }
    .description{
        font-size: 16px;
        color: #707070;
        text-align: center;
    }
    .button{
        border: none;
        font-size: 16px;
        color: #FFF;
        padding: 8px 16px;
        background-color: #4070F4;
        border-radius: 6px;
        margin: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .button:hover{
        background: #265DF2;
    }
    .alert {
        margin-left: 15px;
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
    .container-form label {
        display: inline-block;
        vertical-align: top;
        width: 30%;
    }

    .container-form input {
        min-height: 25px;
        display: inline-block;
        width: 50%;
    }

    .container-form p {
        min-height: 25px;
        display: inline-block;
        width: 50%;
        font-weight: 900;
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
        /*background: #1ab394;*/
        position: absolute;
    }
    .checkmark-circle .background-success {
        background: #1ab394;
    }
    .checkmark-circle .background-failed {
        background: red;
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
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="margin-bottom-20">
                    <div class="row clearfix">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                    Tìm kiếm sản phẩm
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <form class="form-inline">
                                                <input class="form-control" type="text" id="posNameSearch" name="posNameSearch" style="width: 100%" placeholder="Tìm kiếm tên sản phẩm" aria-label="Search">
{{--                                                <button class="btn btn-primary" type="submit" style="width: 10%">Tìm kiếm</button>--}}
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row clearfix" style="margin: 40px 0 20px 0">
                                        <div class="slide-container swiper" style="padding-bottom: 25px">
                                            <div class="slide-content">
                                                <div class="card-wrapper swiper-wrapper">
                                                    @foreach($products as $key => $data)
                                                        <div class="card swiper-slide" id="{{$data->search_product_name}}">
                                                            <div class="image-content">
                                                                <span class="overlay"></span>
                                                                <div class="card-image">
                                                                    <img id="card-img" class="card-img"  src="{{ URL::asset('image/products').'/'.$data->product_image}}" alt="pic" />
                                                                </div>
                                                            </div>
                                                            <div class="card-content">
                                                                <h2 class="name">{{$data->product_name}}</h2>
                                                                <select name="production_batch_selected" id="{{$data->product_code}}" style="width: 60%; margin-top: 8px; height: 30px; margin-bottom: 6px;">
{{--                                                                    <input type="hidden" name="product_code" value="{{$data->product_code}}">--}}
                                                                    <option value="" disabled selected>Lô sản xuất</option>
                                                                    @foreach($data->production_batch as $key_production_batch => $data_production_batch)
                                                                        @if($data_production_batch->expired_status)
                                                                            <option value={{$data_production_batch->id}}>{{$data_production_batch->production_batch_name}}</option>
{{--                                                                        @else--}}
{{--                                                                            <option value={{$data_production_batch->id}}>{{$data_production_batch->production_batch_name}}</option>--}}
                                                                        @endif
                                                                    @endforeach
                                                                </select>
{{--                                                                <p style="margin-bottom: 0px; color: blue"></p>--}}
                                                            @if($data->current_price)
                                                                    <p style="margin-bottom: 8px; color: blue">Giá: {{$data->current_price}} VNĐ</p>
                                                                    <div style="display: flex">
                                                                        <input type="text" style="width: 70px; text-align: center; font-size: 14px" id="{{$data->id}}" placeholder="Nhập SL">
                                                                    </div>
                                                                    <button class="btn btn-secondary" onclick="addCart({{$data->id}}, '{{$data->product_name}}', '{{$data->category_name}}', '{{$data->current_price}}', '{{$data->product_code}}')" style="margin-top: 10px; font-size: 14px">Thêm vào giỏ hàng</button>
                                                                    <p id="{{$data->product_name}}" style="color: red; height: 40px"></p>
                                                                @else
                                                                    <p style="margin-bottom: 8px; color: red">Chưa cập nhật</p>
                                                                @endif
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
                                    Hoá đơn
                                </div>
                                <div class="body" style="padding-bottom: 0px">
                                    <div class="row clearfix" style="margin: 10px 0 0 0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Danh sách sản phẩm</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="">
                                                <table class="table table-head-fixed text-nowrap" id="cartTable">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 200px">Tên sản phẩm</th>
                                                        <th style="width: 200px">Danh mục</th>
                                                        <th style="width: 170px">Lô sản xuất</th>
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
                                            <div class="card-footer" id="total_price_order" style="color: #0006ff">
                                                Tổng tiền: 0 VNĐ
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <p style="color: red" id="validateEmptyCart"></p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <button class="btn btn-primary" onclick="handleConfirmCard()" style="width: 100%">Xác nhận</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <div class="card">
                                <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                    Thanh toán
                                </div>
                                <div class="body">
                                    <div class="container-form">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <p class="col-sm-5 text-sm-right mb-0 mb-sm-3">Tổng tiền: </p>
                                                <p class="col-sm-7" id="confirm_price">0 VNĐ</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-sm-right mb-0 mb-sm-3">Thanh toán:</p>
                                                <input type="text" style="height: 10px !important;"  id="paidCart" name="paidCart" disabled autocomplete="off">
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-sm-right mb-0 mb-sm-3" style="margin-bottom: 7px !important;">Trả lại:</p>
                                                <p class="col-sm-7" id="return_price" style="margin-bottom: 7px !important;"></p>
                                            </div>
                                        </div>
                                        <p class="col-sm-12" id="validatePaid" style="color: red; width: 100%; margin-bottom: 7px"></p>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn btn-primary" onclick="handlePaid()" id="paidCardBtn" disabled style="width: 100%">Thanh toán</button>
                                        </div>
{{--                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                                                <button class="btn btn-primary" id="returnCardBtn" disabled style="width: 100%">In hoá đơn</button>--}}
{{--                                            </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn thanh toán giỏ hàng này?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="border: none">
                            Một khi thanh toán thì bạn sẽ không thể phục hồi !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                            <button type="button" class="btn btn-danger" onclick="handlePayOrderSuccess()">Đồng ý</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{--Success Modal--}}
        <div id="success_tic" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content" style="position: absolute; top: 80px; right: -45px">
                    <div class="page-body">
                        <div class="head">
                            <h3 id="notification" style="margin-bottom: 15px"></h3>
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
    </div>
@endsection
@section("custom-js")
    <script>
        /**
         * Handle function
         */
        var listProductBatchAmount = {!! $productionBatchAmount !!};
        $(document).ready(function() {
            $("#success_tic").modal("hide");
            buildTableReload();
            $('select[name="production_batch_selected"]').change(function () {
                let production_batch_id = $('select[name="production_batch_selected"]').val();
                for (let productBatchAmount of listProductBatchAmount) {
                    // console.log(productBatchAmount);
                    // console.log(productBatchAmount["production_batch_id"]);
                    if(productBatchAmount["production_batch_id"] === parseInt(production_batch_id)){
                        console.log(productBatchAmount["total_amount"]);
                    }
                }
                // document.getElementById("production_batch_amount").innerHTML = 'dsad';
            });
        });

        /**
         * Swiper
         */
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
         * Handle when search box
         */
        document.getElementById("posNameSearch").addEventListener('keyup', function(){
            console.log(this.value);
            const allProduct = document.querySelectorAll('[id^="pos_sch_"]');
            // let countFindSearchProduct = 0;
            // let countNotFindSearchProduct = 0;
            // for(let product of allProduct) {
            //     const product_search = product.id.split('_');
            //     if(product_search[2].includes(this.value)) countFindSearchProduct++;
            //     else countNotFindSearchProduct++;
            // }

            for(let product of allProduct) {
                const product_search = product.id.split('_');
                if(product_search[2].includes(this.value.toLowerCase().replace(/\s/g,''))) {
                    console.log(product);
                    product.classList.remove("hidden");
                    swiper.update();
                    // product.classList.add("swiper-slide");
                } else {
                    product.classList.add("hidden");
                    swiper.update()
                    // swiper.removeSlide($('.swiper-slide').length - 1);
                    // product.classList.remove("swiper-slide");
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
        const checkProductionBatchAmount = (id, num) => {
            for (let productBatchAmount of listProductBatchAmount) {
                // console.log(productBatchAmount);
                // console.log(productBatchAmount["production_batch_id"]);
                if(productBatchAmount["production_batch_id"] === parseInt(id)){
                    if(parseInt(num) <= parseInt(productBatchAmount["total_amount"]))
                        return 1;
                    else return 0;
                }
            }
        }
        const checkProductionBatchName = (name) => {
            let storageSupplierOrder = "cartStorage";
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

        /**
         * Handle when click confirm button
         */
        const handleConfirmCard = () => {
            document.getElementById("confirm_price").innerHTML = total_price_order + " VNĐ";
            if(total_price_order) {
                document.getElementById("paidCardBtn").disabled = false;
                document.getElementById("validateEmptyCart").innerHTML = "";
                document.getElementById("paidCart").disabled = false;
            } else {
                document.getElementById("paidCardBtn").disabled = true;
                document.getElementById("validateEmptyCart").innerHTML = "Mời bạn chọn sản phẩm";
                document.getElementById("paidCart").disabled = true;
            }
        };
        document.getElementById("paidCart").addEventListener('keyup', function(){
            if(!this.value || !checkNumber(this.value)) {
                document.getElementById("return_price").innerHTML = "";
            } else {
                document.getElementById("return_price").innerHTML = - total_price_order + parseInt(this.value) + " VNĐ";
            }
        });
        const handlePaid = () => {
            let moneyPay = $("input[name='paidCart']").val();
            document.getElementById("validatePaid").innerHTML = "";
            if(!moneyPay) {
                document.getElementById("validatePaid").innerHTML = "Nhập số tiền thanh toán !";
            } else if(total_price_order > parseInt(moneyPay)) {
                document.getElementById("validatePaid").innerHTML = "Số tiền thanh toán không được thấp hơn số tiền của đơn hàng !";
            } else {
                $("#confirmModal").modal("show");
                // document.getElementById("return_price").innerHTML = total_price - parseInt(moneyPay) + "VNĐ";
            }
        };
        const handlePayOrderSuccess = () => {
            $("#confirmModal").modal("hide");
            var _token = $("input[name='_token']").val();
            let storageSupplierOrder = "cartStorage";
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let listProductObject = JSON.parse(retrievedProductObject);
            $.ajax({
                url: "/admin/inventories/ordered-success",
                type:'POST',
                data: {_token:_token, listProductObject: listProductObject},
                success: function(response) {
                    document.getElementById("notification").innerHTML = response["message"];
                    document.getElementsByClassName("background")[0].classList.remove("background-failed");
                    document.getElementsByClassName("background")[0].classList.add("background-success");
                    $("#success_tic").modal("show");
                    removeItemStorage();
                    total_price_order = 0;
                    setTimeout(function(){
                        window.location.reload();
                    }, 1000);
                },
                error: function (err) {
                    document.getElementById("notification").innerHTML = err["responseJSON"]["message"];
                    document.getElementsByClassName("background")[0].classList.remove("background-success");
                    document.getElementsByClassName("background")[0].classList.add("background-failed");
                    $("#success_tic").modal("show");
                    console.log(err);
                }
            });

        };

        /**
         * Handle add product to cart
         * @type {*[]}
         */
        cartArray = [];
        var total_price_order = 0;
        const getProductionBatchNameById = (id) => {
            for (let productBatchAmount of listProductBatchAmount) {
                if(productBatchAmount["production_batch_id"] === parseInt(id)){
                    return productBatchAmount["production_batch_name"];
                }
            }
        }
        const buildStorage = () => {
            let storedArray = JSON.stringify(cartArray);
            let storageSupplierOrder = "cartStorage";
            localStorage.setItem(storageSupplierOrder, storedArray);
        }
        const buildTableReload = () => {
            $("#productTable").empty();
            total_price_order = 0;
            let storageSupplierOrder = "cartStorage";
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let parsedObject = JSON.parse(retrievedProductObject);
            for (let i = 0; i < parsedObject.length; i++) {
                cartArray.push({
                    product_id: parsedObject[i].id,
                    product_name: parsedObject[i].product_name,
                    category_name: parsedObject[i].category_name,
                    production_batch_name: parsedObject[i].production_batch_name,
                    amount: parsedObject[i].amount,
                    price: parsedObject[i].price,
                    total_price: parsedObject[i].total_price
                });
                total_price_order += parseInt(parsedObject[i].total_price, 10);
                addProductToTable(i, parsedObject[i].product_name, parsedObject[i].category_name, parsedObject[i].production_batch_name, parsedObject[i].amount, parsedObject[i].price, parsedObject[i].total_price);
            }
            document.getElementById("total_price_order").innerHTML = "Tổng tiền: " + total_price_order + " VNĐ";
        }
        const buildTable = () => {
            $("#productTable").empty();
            total_price_order = 0;
            let storageSupplierOrder = "cartStorage";
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let parsedObject = JSON.parse(retrievedProductObject);
            for (let i = 0; i < parsedObject.length; i++) {
                total_price_order += parseInt(parsedObject[i].total_price, 10);
                addProductToTable(i, parsedObject[i].product_name, parsedObject[i].category_name, parsedObject[i].production_batch_name, parsedObject[i].amount, parsedObject[i].price, parsedObject[i].total_price);
            }
            document.getElementById("total_price_order").innerHTML = "Tổng tiền: " + total_price_order + " VNĐ";
        }
        const addProductToTable = (index, name, category, production_batch_name, amount, price, totalPrice) => {
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
                cartArray.splice(index, 1);
                buildStorage();
                buildTable();
            });
        }
        const addCart = (id, name, category, current_price, code) => {
            if(!document.getElementById(id).value || !document.getElementById(code).value) {
                document.getElementById(name).innerHTML = "Không được bỏ trống !";
            } else if(!checkNumber(document.getElementById(id).value)) {
                document.getElementById(name).innerHTML = "Sai định dạng !";
            } else if(parseInt(document.getElementById(id).value) === 0) {
                document.getElementById(name).innerHTML = "Số lượng phải lớn hơn 0 !";
            } else if(!checkProductionBatchName(getProductionBatchNameById(document.getElementById(code).value))) {
                document.getElementById(name).innerHTML = "Lô sản phẩm đã tồn tại !";
            } else if(!checkProductionBatchAmount(document.getElementById(code).value, document.getElementById(id).value)) {
                document.getElementById(name).innerHTML = "Không đủ số lượng !";
            } else {
                document.getElementById(name).innerHTML = "";
            }
            if(!document.getElementById(name).innerHTML) {
                let value = parseInt(document.getElementById(id).value, 10);
                console.log(value);
                if(!isNaN(value) && value > 0) {
                    //Add to product array
                    cartArray.push({
                        product_id: id,
                        product_name: name,
                        category_name: category,
                        production_batch_name: getProductionBatchNameById(document.getElementById(code).value),
                        amount: document.getElementById(id).value,
                        price: current_price,
                        total_price: (parseInt(document.getElementById(id).value, 10) * parseInt(current_price)).toString()
                    })
                    total_price_order +=  parseInt(document.getElementById(id).value, 10) * parseInt(current_price);
                    document.getElementById("total_price_order").innerHTML = "Tổng tiền: " + total_price_order + " VNĐ";
                    console.log(cartArray);
                    document.getElementById(id).value = "";
                    document.getElementById(code).value = "";
                    buildStorage();
                    buildTable();
                }
            }
        }
        const deleteAllRowTable = () => {
            var tableHeaderRowCount = 1;
            var table = document.getElementById('cartTable');
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) {
                table.deleteRow(tableHeaderRowCount);
            }
        }
        const removeItemStorage = () => {
            let storageSupplierOrder = "cartStorage";
            localStorage.removeItem(storageSupplierOrder);
        }
    </script>
@endsection
