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
                                                    <input class="form-control" type="search" style="width: 90%" placeholder="Nhập tên sản phẩm" aria-label="Search">
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
                                                                            <option value={{$data_production_batch->production_batch_name}}>{{$data_production_batch->production_batch_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <input type="text" name="price" id="{{$data[0]->product_code}}" placeholder="Nhập giá (VNĐ)" style="width: 60%; margin-bottom: 5px; font-size: 14px">
                                                                    <div style="display: flex">
{{--                                                                        <input type="button" onclick="subtractCount({{$key}})" value="-">--}}
                                                                        <input type="text" style="width: 40px; text-align: center; font-size: 14px" id="{{$data[0]->id}}" placeholder="SL:">
{{--                                                                        <input type="button" onclick="increaseCount({{$key}})" value="+">--}}
                                                                    </div>
                                                                    <button class="btn btn-secondary" onclick="addNewProduct({{$data[0]->id}}, '{{$supplierDetail->id}}', '{{$data[0]->product_name}}', '{{$data[0]->category_name}}', '{{$data[0]->product_code}}', '{{$data[0]->production_batch_id}}')" style="margin-top: 10px; font-size: 14px">Thêm sản phẩm</button>
                                                                    <p id="{{$data[0]->product_name}}" style="color: red"></p>
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
                                            <div class="row clearfix">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                    <div id="help-block-confirm" style="color: red">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted" style="padding-top: 0px">
                                        <button class="btn btn-primary" onClick="confirmListProduct()" style="width: 100%">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">--}}
{{--                                <div class="card">--}}
{{--                                    <div class="card-header bg-light font-weight-bold" style="color: black!important;">--}}
{{--                                        Thanh toán--}}
{{--                                    </div>--}}
{{--                                    <div class="body">--}}
{{--                                        <div class="container-form">--}}
{{--                                            <form>--}}
{{--                                                <div>--}}
{{--                                                    <label for="total">Tổng tiền: </label>--}}
{{--                                                    <p>11000 VNĐ</p>--}}
{{--                                                    <br>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <label for="paid">Thanh toán:</label>--}}
{{--                                                    <input type="text" id="paid" name="paid"><br><br>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <label for="balance">Trả lại:</label>--}}
{{--                                                    <input type="text" id="balance" name="balance"><br><br>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                        <div class="row clearfix">--}}
{{--                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                                                <button class="btn btn-primary" style="width: 100%">Thanh toán</button>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--                                                <button class="btn btn-primary" style="width: 100%">In hoá đơn</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    @else
                        <p style="color:red;">Nhà cung cấp này không có sản phẩm</p>
                    @endif
                @endisset
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
        var supplierDetailId = {!! $supplierDetailId !!};
        // var supplier, product, quantity, introduce, order_date;
        // var blockErrProduct = document.getElementById("help-block-product");
        // var blockErrQuantity = document.getElementById("help-block-quantity");
        // var blockErrOrderDate = document.getElementById("help-block-order_date");
        // var blockErrIntroduce = document.getElementById("help-block-introduce");
        // var blockErrSubmit = document.getElementById("help-block-submit");
        $(document).ready(function(){
            if(supplierDetailId) {
                buildTableReload(supplierDetailId);
            }
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
                document.getElementById(name).innerHTML = "Không hợp lệ !";
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
                    // var table = document.getElementById("cartTable").getElementsByTagName('tbody')[0];
                    // var row = table.insertRow(-1);
                    // var cell1 = row.insertCell(0);
                    // var cell2 = row.insertCell(1);
                    // var cell3 = row.insertCell(2);
                    // var cell4 = row.insertCell(3);
                    // var cell5 = row.insertCell(4);
                    // // var deleteRow = row.insertCell(5);
                    // cell1.innerHTML = name;
                    // cell2.innerHTML = category;
                    // cell3.innerHTML = document.getElementById(id).value;
                    // cell4.innerHTML = document.getElementById(code).value + " VNĐ";
                    // cell5.innerHTML = (parseInt(document.getElementById(id).value, 10) * parseInt(document.getElementById(code).value, 10)).toString() + " VNĐ";
                    // // //Create button
                    // // let button = document.createElement("button");
                    // // button.innerText = "Xoá";
                    // // button.className = "btn btn-sm btn-danger";
                    // // deleteRow.appendChild(button);
                    // // //Add to product array
                    // // productArray.push({
                    // //     product_name: name,
                    // //     category_name: category,
                    // //     product_code: code,
                    // //     amount: document.getElementById(id).value,
                    // //     total_price: (parseInt(document.getElementById(id).value, 10) * parseInt(price, 10)).toString()
                    // // })
                    // // addToStorage();
                    // // location.reload();
                }
            }
        }

        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }
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
         * Confirmation order
         */
        const confirmListProduct = () => {
            let supplier_search = $('#standard-select').find(":selected").val();
            var blockErrConfirm = document.getElementById("help-block-confirm");
            if(productArray.length === 0) {
                blockErrConfirm.innerHTML = "Vui lòng chọn sản phẩm"
            } else {
                blockErrConfirm.innerHTML = ""
                window.location.href = "/admin/orders/" + supplier_search + "/product/confirm";
            }
        }
    </script>
@endsection
