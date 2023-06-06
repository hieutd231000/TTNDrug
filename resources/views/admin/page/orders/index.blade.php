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
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                        Chọn sản phẩm
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <form class="form-inline">
                                                    <input class="form-control" type="search" style="width: 90%" placeholder="Nhập" aria-label="Search">
                                                    <button class="btn btn-primary" type="submit" style="width: 10%">Tìm kiếm</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row clearfix" style="margin: 40px 0 20px 0">
                                            <div class="slide-container swiper" style="padding-bottom: 25px">
                                                <div class="slide-content">
                                                    <div class="card-wrapper swiper-wrapper">
                                                        @foreach($listProductBySupplierId as $key => $data)
                                                            <div class="card swiper-slide">
                                                                <div class="image-content">
                                                                    <span class="overlay"></span>
                                                                    <div class="card-image">
                                                                        <img id="card-img" class="card-img"  src="{{ URL::asset('image/products').'/'.$data[0]->product_image}}" alt="pic" />
                                                                    </div>
                                                                </div>
                                                                <div class="card-content">
                                                                    <h2 class="name">{{$data[0]->product_name}}</h2>
                                                                    <input type="text" name="price" placeholder="Nhập giá:" style="width: 65%; margin-bottom: 10px">
                                                                    <div style="display: flex">
    {{--                                                                    <label for="{{$data[0]->id}}" style="font-size: 14px">SL:</label>--}}
                                                                        <input type="button" onclick="subtractCount({{$data[0]->id}})" value="-">
                                                                        <input type="text" style="width: 30px; text-align: center" id="{{$data[0]->id}}" value="">
                                                                        <input type="button" onclick="increaseCount({{$data[0]->id}})" value="+">
                                                                    </div>
    {{--                                                                <button class="button btn-secondary" onclick="addCart({{$data->id}}, '{{$data->product_name}}', '{{$data->category_name}}', '{{$data->product_code}}')" style="margin-top: 10px; font-size: 14px">Thêm vào giỏ hàng</button>--}}
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
                    @else
                        <p style="color:red;">Nhà cung cấp này không có sản phẩm</p>
                    @endif
                @endisset
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

        // Slider
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 4,
            spaceBetween: 25,
            loop: true,
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
                0: {
                    slidesPerView: 1,
                },
                316.6: {
                    slidesPerView: 2,
                },
                633.3: {
                    slidesPerView: 3,
                },
                950: {
                    slidesPerView: 4,
                }
            },
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

        const increaseCount = (id) => {
            console.log("product_id: " + id);
            var value = parseInt(document.getElementById(id).value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            console.log(value);
            document.getElementById(id).value = value;
            console.log(document.getElementById(id).value);
        }

        const subtractCount = (id) => {
            console.log("product_id: " + id);
            var value = parseInt(document.getElementById(id).value, 10);
            value = isNaN(value) ? 0 : value;
            if(value > 0) {
                value--;
                console.log(value);
                document.getElementById(id).value = value;
            }
        }

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
                window.location.href = "/admin/orders/" + supplier_search + "/product";
            }
        }
    </script>
@endsection
