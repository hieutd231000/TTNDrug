<style>
    .body {
        padding: 20px;
    }
    .social-links>li {
        display: inline-block;
        margin: 0 5px;
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
    .form-block .form-control {
        border: none !important;
        padding-left: 0 !important;
    }
    .card .header {
        padding: 20px 20px 0 20px !important;
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
    .hidden {
        display: none !important;
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
    .name{
        font-size: 18px;
        font-weight: 600;
        color: #333;
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
                                    Tìm kiếm dược phẩm
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <form class="form-inline">
                                                <input class="form-control" type="text" id="posNameSearch" name="posNameSearch" style="width: 100%" placeholder="Tìm kiếm tên dược phẩm" aria-label="Search">
{{--                                                <button class="btn btn-primary" type="submit" style="width: 10%">Tìm kiếm</button>--}}
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row clearfix" style="margin: 40px 0 20px 0">
                                        <div class="slide-container swiper" style="padding-bottom: 25px">
                                            <div class="slide-content">
                                                <div class="card-wrapper swiper-wrapper">
                                                    @foreach($products as $key => $data)
                                                        <div class="card swiper-slide">
                                                            <div class="image-content">
                                                                <span class="overlay"></span>
                                                                <div class="card-image">
                                                                    <img id="card-img" class="card-img"  src="{{ URL::asset('image/products').'/'.$data->product_image}}" alt="pic" />
                                                                </div>
                                                            </div>
                                                            <div class="card-content">
                                                                <input type="hidden" name="productId" value="{{$data->id}}">
                                                                <input type="hidden" name="categoryName" value="{{$data->category_name}}">
                                                                <input type="hidden" name="productCode" value="{{$data->product_code}}">
                                                                <h4 class="productName">{{$data->product_name}}</h4>
                                                                <select name="production_batch_selected" style="width: 60%; margin-top: 8px; height: 30px; margin-bottom: 6px;">
                                                                    <option value="" disabled selected>Lô sản xuất</option>
                                                                    @foreach($data->production_batch as $key_production_batch => $data_production_batch)
                                                                        @if($data_production_batch->expired_status)
                                                                            <option value={{$data_production_batch->id}}>{{$data_production_batch->production_batch_name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
{{--                                                                <p style="margin-bottom: 0px; color: blue"></p>--}}
                                                                @if($data->current_price)
                                                                    <input type="hidden" name="currentPrice" value="{{$data->current_price}}">
                                                                    <p style="margin-bottom: 8px; color: red; font-weight: 600">Giá: {{$data->current_price}} VNĐ</p>
                                                                    <div style="display: flex">
                                                                        <input type="text" style="width: 70px; text-align: center; font-size: 14px" name="amount" placeholder="Nhập SL">
                                                                    </div>
{{--                                                                    onclick="addCart('{{$data->product_id}}', '{{$data->product_name}}', '{{$data->category_name}}', '{{$data->current_price}}', '{{$data->product_code}}')"--}}
                                                                    <button class="btn btn-success" onclick="addProductToCart(this)" style="margin-top: 10px; font-size: 14px">Thêm vào giỏ hàng</button>
                                                                    <p class="errNotification" style="color: red; height: 40px"></p>
                                                                @else
                                                                    <span style="margin-bottom: 8px; color: red">Chưa cập nhật giá bán</span>
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                    Giỏ hàng
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
                                            <div class="card-footer" id="total_price_order" style="color: red; font-weight: 600">
                                                Tổng tiền: 0 VNĐ
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <p style="color: red" id="validateEmptyCart"></p>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <button class="btn btn-primary" onclick="handleConfirmCard()" style="width: 100%">Xác nhận giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-7">
                            <div class="card">
                                <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                    Thông tin khách hàng
                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <form class="form-inline" style="margin-bottom: 3px !important;">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control" type="text" id="phoneSearch" name="phoneSearch" style="border-radius: 0 !important;" placeholder="Tìm kiếm số điện thoại" aria-label="Search">
                                                <button type="button" class="btn btn-primary handleSearchCustomer" style="border-radius: 0 !important;">Tìm kiếm</button>
                                            </form>
                                            <p id="errSearchPhone" style="color: red; margin-bottom: 10px !important;"></p>
                                            <a href="" class="btn btn-success hidden" id="buttonAddCustomer" data-toggle="modal" data-target="#addModal">Thêm khách hàng</a>
                                        </div>
                                    </div>
                                    <div class="row clearfix" style="margin: 20px 0 20px 0">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="card hidden" id="customerInfo">
                                                <div class="card-body">
                                                    <i class="fas fa-edit float-right" id="customerId" style="cursor: pointer">
                                                    </i>
                                                    <div class="row">
                                                        <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Tên khách hàng:</p>
                                                        <p class="col-sm-8" id="customerNameInfo"></p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Số điện thoại:</p>
                                                        <p class="col-sm-8" id="customerPhoneInfo"></p>
                                                    </div>
                                                    <div class="row">
                                                        <p class="col-sm-4 text-muted text-sm-right mb-0 mb-sm-3">Điểm:</p>
                                                        <p class="col-sm-8" id="customerPointInfo"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <button class="btn btn-info" id="confirmCustomerBtn" onclick="handleConfirmCustomer()" style="width: 100%" disabled>Thêm thông tin khách hàng thanh toán</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5">
                            <div class="card">
                                <div class="card-header bg-light font-weight-bold" style="color: black!important;">
                                    Thanh toán
                                </div>
                                <div class="body">
                                    <div class="container-form">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Tên khách hàng: </p>
                                                <p class="col-sm-7" id="customerNamePaid"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Số điện thoại: </p>
                                                <p class="col-sm-7" id="customerPhonePaid"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Điểm hiện tại: </p>
                                                <p class="col-sm-7" id="customerPointPaid" style="color: red"></p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Điểm sử dụng: </p>
                                                <input type="text" style="height: 10px !important; margin-left: 5px" placeholder="10đ = 1000VNĐ"  id="pointUse" name="pointUse" disabled autocomplete="off">
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Điểm còn lại: </p>
                                                <p class="col-sm-7" id="customerCurrentPoint" style="color: green"></p>
                                            </div>
                                            <p class="col-sm-12" id="validatePoint" style="color: red; width: 100%; margin-bottom: 7px"></p>
                                            <hr>
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Khách cần trả: </p>
                                                <p class="col-sm-7" id="confirm_price" style="color: red">0 VNĐ</p>
                                            </div>
                                            <div class="row">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3">Khách hàng đã thanh toán:</p>
                                                <input type="text" style="height: 10px !important; margin-top: 20px; margin-left: 5px" placeholder="VNĐ" id="paidCart" name="paidCart" disabled autocomplete="off">
                                            </div>
                                            <div class="row" style="margin-bottom: 10px">
                                                <p class="col-sm-5 text-muted text-sm-right mb-0 mb-sm-3" style="margin-bottom: 7px !important;">Trả lại khách:</p>
                                                <p class="col-sm-7" id="return_price" style="margin-bottom: 7px !important; color: green"></p>
                                            </div>
                                            <div class="row" style="margin-bottom: 10px">
                                                <select id="standard-select" style="height: 38px; width: 400px; padding-left: 5px" disabled>
                                                    <option value="null" disabled selected>Hình thức thanh toán</option>
                                                    <option value="tien">Tiền mặt </option>
                                                    <option value="the">Thẻ thanh toán</option>
                                                </select>
                                            </div>
                                        </div>
                                        <p class="col-sm-12" id="validatePaid" style="color: red; width: 100%; margin-bottom: 7px"></p>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <button class="btn btn-success" onclick="handlePaid()" id="paidCardBtn" disabled style="width: 100%">Thanh toán giỏ hàng</button>
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
                    <input type="hidden" name="total_price" value="">
                    <input type="hidden" name="method_chose" value="">
                    <input type="hidden" name="customerIdPaid" value="">
                    <input type="hidden" name="customerPointUse" value="">
                    <input type="hidden" name="isCustomer" value="false">
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
        {{--Add customer modal--}}
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hidden" id="notificationAddCustomer">
                        </div>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="customerName">Tên khách hàng <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="64" class="form-control" name="customerName" id="customerName" placeholder="Nhập tên khách hàng">
                                <div id="help-block-name" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customerPhone">Số điện thoại<span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="10" class="form-control" name="customerPhone" id="customerPhone" placeholder="Số điện thoại">
                                <div id="help-block-phone" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customerDes">Thông tin thêm </label>
                                <textarea class="form-control" style="resize: none" name="customerDes" id="customerDes" rows="3"></textarea>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-primary handleSubmitAdd">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin khách hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hidden" id="notificationEdit">
                        </div>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="customerIdEdit" id="customerIdEdit" value="">

                            <div class="form-group">
                                <label for="customerNameEdit">Tên khách hàng <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="64" class="form-control" name="customerNameEdit" id="customerNameEdit" placeholder="">
                                <div id="help-block-name-edit" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customerPhoneEdit">Số điện thoại <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="10" class="form-control" name="customerPhoneEdit" id="customerPhoneEdit" placeholder="">
                                <div id="help-block-phone-edit" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="customerEditDes">Mô tả </label>
                                <textarea class="form-control" style="resize: none" name="customerEditDes" id="customerEditDes" rows="3"></textarea>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-primary handleEdit">Lưu</button>
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
        /**
         * Handle function
         */
        var listProductBatchAmount = {!! $productionBatchAmount !!};
        $(document).ready(function() {
            $("#success_tic").modal("hide");
            buildTableReload();
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
            // setTimeout(function(){
                console.log(this.value);
                var valueSearch = this.value;

                // var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "/pos/search",
                    type: 'GET',
                    data: {valueSearch: valueSearch},
                    success: function (response) {
                        console.log(response.data);
                        $('.card-wrapper').html(response.data);
                        swiper.update();
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
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
                document.getElementById("standard-select").disabled = false;
                document.getElementById("confirmCustomerBtn").disabled = false;

            } else {
                document.getElementById("paidCardBtn").disabled = true;
                document.getElementById("validateEmptyCart").innerHTML = "Mời bạn chọn dược phẩm";
                document.getElementById("paidCart").disabled = true;
                document.getElementById("standard-select").disabled = true;
                document.getElementById("confirmCustomerBtn").disabled = true;

            }
        };
        document.getElementById("paidCart").addEventListener('keyup', function(){
            if(!this.value || !checkNumber(this.value)) {
                document.getElementById("return_price").innerHTML = "";
            } else {
                document.getElementById("return_price").innerHTML = - parseInt(document.getElementById("confirm_price").innerHTML) + parseInt(this.value) + " VNĐ";
            }
        });
        const handlePaid = () => {
            let moneyPay = $("input[name='paidCart']").val();
            let customerPointPaid = document.getElementById("customerPointPaid").textContent;
            let pointUse = $("input[name='pointUse']").val();
            let method_chose = $('#standard-select').find(":selected").val();
            document.getElementById("validatePaid").innerHTML = "";
            document.getElementById("validatePoint").innerHTML = "";
            let priceOrders = document.getElementById("confirm_price").textContent.split(" ");

            //Validate
            if(pointUse) {
                if(!checkNumber(pointUse)) {
                    document.getElementById("validatePoint").innerHTML = "Số điểm bạn nhập không hợp lệ !";
                } else if (parseInt(pointUse) >= parseInt(customerPointPaid)) {
                    document.getElementById("validatePoint").innerHTML = "Số điểm khách hàng không đủ !";
                } else if (parseInt(priceOrders[0]) < 0) {
                    document.getElementById("validatePoint").innerHTML = "Vượt quá số tiền của đơn hàng !";
                } else {
                    document.getElementById("validatePoint").innerHTML = "";
                }
            }

            if(!moneyPay) {
                document.getElementById("validatePaid").innerHTML = "Nhập số tiền thanh toán !";
            } else if(!checkNumber(moneyPay)) {
                document.getElementById("validatePaid").innerHTML = "Số tiền bạn nhập không hợp lệ !";
            } else if(method_chose === "null") {
                document.getElementById("validatePaid").innerHTML = "Mời bạn chọn hình thức thanh toán !";
            } else if(parseInt(priceOrders[0]) > parseInt(moneyPay)) {
                document.getElementById("validatePaid").innerHTML = "Số tiền khách hàng đã thanh toán không đủ !";
            } else {
                document.getElementById("validatePaid").innerHTML = "";
            }
            //Pass
            if(!document.getElementById("validatePaid").innerHTML && !document.getElementById("validatePoint").innerHTML) {
                $("input[name='total_price']").val(total_price_order);
                $("input[name='method_chose']").val(method_chose);
                if(pointUse) {
                    $("input[name='customerPointUse']").val(pointUse);
                } else {
                    $("input[name='customerPointUse']").val(0);
                }
                $("#confirmModal").modal("show");
            }
        };
        const handlePayOrderSuccess = () => {
            $("#confirmModal").modal("hide");
            var _token = $("input[name='_token']").val();
            var totalPrice = $("input[name='total_price']").val();
            var method_chose = $("input[name='method_chose']").val();
            var customerIdPaid = $("input[name='customerIdPaid']").val();
            var customerPointUse = $("input[name='customerPointUse']").val();
            var isCustomer = $("input[name='isCustomer']").val();
            let storageSupplierOrder = "cartStorage";
            let retrievedProductObject = localStorage.getItem(storageSupplierOrder);
            let listProductObject = JSON.parse(retrievedProductObject);
            $.ajax({
                url: "/admin/inventories/ordered-success",
                type:'POST',
                data: {_token:_token, isCustomer: isCustomer, listProductObject: listProductObject, totalPrice: totalPrice, methodChose: method_chose, customerIdPaid:customerIdPaid, customerPointUse:customerPointUse},
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
                    // document.getElementById("notification").innerHTML = err["responseJSON"]["message"];
                    // document.getElementsByClassName("background")[0].classList.remove("background-success");
                    // document.getElementsByClassName("background")[0].classList.add("background-failed");
                    // $("#success_tic").modal("show");
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
        const addProductToCart = (e) => {
            const el = e.closest(".card-content");
            console.log(el);
            console.log(el.getElementsByClassName("productName")[0].textContent);
            console.log(el.querySelector("[name='productId']").value);
            console.log(el.querySelector("[name='categoryName']").value);
            console.log(el.querySelector("[name='currentPrice']").value);
            console.log(el.querySelector("[name='productCode']").value);
            console.log(el.querySelector("[name='amount']").value);
            console.log(el.querySelector("[name='production_batch_selected']").value);

            let productName = el.getElementsByClassName("productName")[0].textContent;
            let productId = el.querySelector("[name='productId']").value;
            let categoryName = el.querySelector("[name='categoryName']").value;
            let currentPrice = el.querySelector("[name='currentPrice']").value;
            let productCode = el.querySelector("[name='productCode']").value;
            let amount = el.querySelector("[name='amount']").value;
            let production_batch_id = el.querySelector("[name='production_batch_selected']").value;

            // errNotification
            if(!amount || !production_batch_id) {
                el.getElementsByClassName("errNotification")[0].textContent = "Không được bỏ trống !";
            } else if(!checkNumber(amount)) {
                el.getElementsByClassName("errNotification")[0].textContent = "Sai định dạng !";
            } else if(parseInt(amount) === 0) {
                el.getElementsByClassName("errNotification")[0].textContent = "Số lượng phải lớn hơn 0 !";
            } else if(!checkProductionBatchName(getProductionBatchNameById(production_batch_id))) {
                el.getElementsByClassName("errNotification")[0].textContent = "Lô dược phẩm đã tồn tại !";
            } else if(!checkProductionBatchAmount(production_batch_id, amount)) {
                el.getElementsByClassName("errNotification")[0].textContent = "Không đủ số lượng !";
            } else {
                el.getElementsByClassName("errNotification")[0].textContent = "";
            }
            // Pass
            if(!el.getElementsByClassName("errNotification")[0].textContent) {
                let value = parseInt(amount, 10);
                console.log(value);
                if(!isNaN(value) && value > 0) {
                    //Add to product array
                    cartArray.push({
                        product_id: productId,
                        product_name: productName,
                        category_name: categoryName,
                        production_batch_name: getProductionBatchNameById(production_batch_id),
                        amount: amount,
                        price: currentPrice,
                        total_price: (parseInt(amount, 10) * parseInt(currentPrice)).toString()
                    })
                    total_price_order +=  parseInt(amount) * parseInt(currentPrice);
                    document.getElementById("total_price_order").innerHTML = "Tổng tiền: " + total_price_order + " VNĐ";
                    console.log(cartArray);
                    el.querySelector("[name='amount']").value = "";
                    el.querySelector("[name='production_batch_selected']").value = "";
                    buildStorage();
                    buildTable();
                }
            }
        }
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


        // Xử lý khách hàng
        const hiddenCard = () => {
            document.getElementById("customerInfo").classList.add("hidden");
            document.getElementById("customerNameInfo").textContent = "";
            document.getElementById("customerPhoneInfo").textContent = "";
            document.getElementById("customerPointInfo").textContent = "";
            // document.getElementById("confirmCustomerBtn").disabled = true;
        }
        $(document).ready(function() {
            /**
             * Search customer
             */

            $(".handleSearchCustomer").click(function(e){
                e.preventDefault();
                const phoneSearch = document.getElementById("phoneSearch").value;
                const errPhoneSearch = document.getElementById("errSearchPhone");
                const buttonAddCustomer = document.getElementById("buttonAddCustomer");
                const customerInfoCard = document.getElementById("customerInfo");
                if(!phoneSearch) {
                    errPhoneSearch.textContent = "Không được bỏ trống";
                    hiddenCard();
                } else if(!checkNumber(phoneSearch)) {
                    errPhoneSearch.textContent = "Sai định dạng"
                    hiddenCard();
                } else if(phoneSearch.length !== 10) {
                    errPhoneSearch.textContent = "Số điện thoại không hợp lệ"
                    hiddenCard();
                } else {
                    errPhoneSearch.textContent = ""
                }
                //Pass
                if(!errPhoneSearch.textContent) {
                    errPhoneSearch.textContent = "";
                    var _token = $("input[name='_token']").val();
                    $.ajax({
                        url: "/customer/search",
                        type: 'GET',
                        data: {_token: _token, valueSearch: phoneSearch},
                        success: function (response) {
                            console.log(response.data);
                            if(response.data === null) {
                                errPhoneSearch.textContent = "Không tìm thấy thông tin khách hàng";
                                buttonAddCustomer.classList.remove("hidden");
                                hiddenCard();
                            } else {
                                errPhoneSearch.textContent = "";
                                buttonAddCustomer.classList.add("hidden");
                                customerInfoCard.classList.remove("hidden");
                                document.getElementById("customerNameInfo").textContent = response.data.name;
                                document.getElementById("customerPhoneInfo").textContent = response.data.phone;
                                document.getElementById("customerPointInfo").textContent = response.data.point;
                                $("input[name='customerIdPaid']").val(response.data.id);
                                // document.getElementById("confirmCustomerBtn").disabled = false;
                                document.getElementById("customerId").onclick = () => {
                                    document.getElementById("customerNameEdit").value = response.data.name;
                                    document.getElementById("customerPhoneEdit").value = response.data.phone;
                                    document.getElementById("customerIdEdit").value = response.data.id;
                                    $("#editModal").modal("show");
                                };
                            }
                        },
                        error: function (err) {
                            console.log(err);
                            // document.getElementById("confirmCustomerBtn").disabled = true;
                        }
                    });
                }
            })

            /**
             * Handle add new customer
             */
            $(".handleSubmitAdd").click(function(e){
                e.preventDefault();
                const _token = $("input[name='_token']").val();
                const name = $("input[name='customerName']").val();
                const phone = $("input[name='customerPhone']").val();
                const blockErrName = document.getElementById("help-block-name");
                const blockErrPhone = document.getElementById("help-block-phone");
                const buttonAddCustomer = document.getElementById("buttonAddCustomer");
                const errPhoneSearch = document.getElementById("errSearchPhone");
                if(!name) {
                    blockErrName.textContent = "Không được bỏ trống";
                } else {
                    blockErrName.textContent = "";
                }
                if(!phone) {
                    blockErrPhone.textContent = "Không được bỏ trống"
                } else if(!checkNumber(phone)) {
                    blockErrPhone.textContent = "Sai định dạng"
                } else if(phone.length !== 10) {
                    blockErrPhone.textContent = "Số điện thoại không hợp lệ"
                } else {
                    blockErrPhone.textContent = ""
                }

                if(!blockErrName.textContent && !blockErrPhone.textContent) {
                    $.ajax({
                        url: "/customer/add",
                        type:'POST',
                        data: {_token:_token, name:name, phone:phone},
                        success: function(response) {
                            var alertDiv = document.getElementById("notificationAddCustomer");
                            alertDiv.classList.remove("hidden");
                            alertDiv.textContent = "Thêm khách hàng thành công";
                            $("input[name='phoneSearch']").val(phone);
                            $("input[name='customerName']").val("");
                            $("input[name='customerPhone']").val("");
                            $("textarea[name='customerDes']").val("");
                            errPhoneSearch.textContent = "";
                            buttonAddCustomer.classList.add("hidden");
                            setTimeout(function(){
                                $("#addModal").modal("hide");
                            }, 600);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });

                }
            });
            $(".handleEdit").click(function(e){
                e.preventDefault();
                const _token = $("input[name='_token']").val();
                const name = $("input[name='customerNameEdit']").val();
                const phone = $("input[name='customerPhoneEdit']").val();
                const id = $("input[name='customerIdEdit']").val();
                const blockErrName = document.getElementById("help-block-name-edit");
                const blockErrPhone = document.getElementById("help-block-phone-edit");
                const buttonAddCustomer = document.getElementById("buttonAddCustomer");
                const errPhoneSearch = document.getElementById("errSearchPhone");
                if(!name) {
                    blockErrName.textContent = "Không được bỏ trống";
                } else {
                    blockErrName.textContent = "";
                }
                if(!phone) {
                    blockErrPhone.textContent = "Không được bỏ trống"
                } else if(!checkNumber(phone)) {
                    blockErrPhone.textContent = "Sai định dạng"
                } else if(phone.length !== 10) {
                    blockErrPhone.textContent = "Số điện thoại không hợp lệ"
                } else {
                    blockErrPhone.textContent = ""
                }

                if(!blockErrName.textContent && !blockErrPhone.textContent) {
                    $.ajax({
                        url: "/customer/edit/" + id,
                        type:'POST',
                        data: {_token:_token, name:name, phone:phone},
                        success: function(response) {
                            var alertDiv = document.getElementById("notificationEdit");
                            alertDiv.classList.remove("hidden");
                            alertDiv.textContent = "Cập nhật thông tin khách hàng thành công";
                            // $("input[name='phoneSearch']").val(phone);
                            // document.getElementById("customerNameInfo").textContent = name;
                            // document.getElementById("customerPhoneInfo").textContent = phone;
                            // // $("input[name='customerNameEdit']").val(name);
                            // // $("input[name='customerPhoneEdit']").val(phone);
                            // errPhoneSearch.textContent = "";
                            // buttonAddCustomer.classList.add("hidden");
                            setTimeout(function(){
                                window.location.reload();
                            }, 300);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });

                }
            });
        });
        //Thanh toán giỏ hàng
        const handleConfirmCustomer = () => {
            const customerNamePaid = document.getElementById("customerNamePaid");
            const customerPhonePaid = document.getElementById("customerPhonePaid");
            const customerPointPaid = document.getElementById("customerPointPaid");
            if(!document.getElementById("customerNameInfo").textContent || !document.getElementById("customerPhoneInfo").textContent || !document.getElementById("customerPointInfo").textContent) {
                document.getElementById("errSearchPhone").textContent = "Mời bạn tìm kiếm khách hàng !";
                customerNamePaid.textContent = "";
                customerPhonePaid.textContent = "";
                customerPointPaid.textContent = "";
                document.getElementById("pointUse").disabled = true;
            } else {
                customerNamePaid.textContent = document.getElementById("customerNameInfo").textContent;
                customerPhonePaid.textContent = document.getElementById("customerPhoneInfo").textContent;
                customerPointPaid.textContent = document.getElementById("customerPointInfo").textContent + " điểm";
                document.getElementById("pointUse").disabled = false;
                $("input[name='isCustomer']").val("true");
                document.getElementById("errSearchPhone").textContent = "";
            }
        }
        document.getElementById("pointUse").addEventListener('keyup', function(){
            let current_price_order = total_price_order;
            if(!this.value || !checkNumber(this.value)) {
                document.getElementById("customerCurrentPoint").innerHTML = "";
                document.getElementById("confirm_price").innerHTML = total_price_order + " VNĐ";
                if(!$("input[name='paidCart']").val()) {
                    document.getElementById("return_price").innerHTML = "";
                } else
                    document.getElementById("return_price").innerHTML = - parseInt(document.getElementById("confirm_price").innerHTML) + parseInt($("input[name='paidCart']").val()) + " VNĐ";

            } else {
                current_price_order = total_price_order - parseInt(this.value) * 100;
                document.getElementById("confirm_price").innerHTML = current_price_order + " VNĐ";
                document.getElementById("customerCurrentPoint").innerHTML = parseInt(document.getElementById("customerPointInfo").innerHTML) - parseInt(this.value) + " điểm";
                if(!$("input[name='paidCart']").val()) {
                    document.getElementById("return_price").innerHTML = "";
                } else
                    document.getElementById("return_price").innerHTML = - parseInt(document.getElementById("confirm_price").innerHTML) + parseInt($("input[name='paidCart']").val()) + " VNĐ";
            }
        });
    </script>
@endsection
