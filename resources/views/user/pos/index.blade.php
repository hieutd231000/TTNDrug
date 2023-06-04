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
        display: none;
    }
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
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                                <input class="form-control" type="search" style="width: 90%" placeholder="Nhập" aria-label="Search">
                                                <button class="btn btn-primary" type="submit" style="width: 10%">Tìm kiếm</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row clearfix" style="margin: 40px 0 20px 0">
                                        <div class="slide-container swiper" style="padding-bottom: 25px">
                                            <div class="slide-content">
                                                <div class="card-wrapper swiper-wrapper">
                                                    @foreach($product as $key => $data)
                                                        <div class="card swiper-slide">
                                                            <div class="image-content">
                                                                <span class="overlay"></span>
                                                                <div class="card-image">
                                                                    <img id="card-img" class="card-img"  src="{{ URL::asset('image/products').'/'.$data->product_image}}" alt="pic" />
                                                                </div>
                                                            </div>
                                                            <div class="card-content">
                                                                <h2 class="name">{{$data->product_name}}</h2>
{{--                                                                <p class="description">{{$data->price_unit}}</p>--}}
                                                                <div style="display: flex">
{{--                                                                    <label for="{{$data->id}}" style="font-size: 14px">SL:</label>--}}
                                                                    <input type="button" onclick="subtractCount({{$data->id}})" value="-">
                                                                    <input type="text" style="width: 30px; text-align: center" id="{{$data->id}}" value="">
                                                                    <input type="button" onclick="increaseCount({{$data->id}})" value="+">
                                                                </div>
                                                                <button class="button btn-secondary" onclick="addCart({{$data->id}}, '{{$data->product_name}}', '{{$data->category_name}}', '{{$data->product_code}}')" style="margin-top: 10px; font-size: 14px">Thêm vào giỏ hàng</button>
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
                                <div class="body">
                                    <div class="row clearfix" style="margin: 10px 0 20px 0">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Danh sách sản phẩm</h3>
                                                <div class="card-tools">
                                                    <div class="input-group input-group-sm" style="width: 150px;">
                                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm">
                                                        <div class="input-group-append">
                                                            <button type="submit" class="btn btn-default">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body table-responsive p-0" style="">
                                                <table class="table table-head-fixed text-nowrap" id="cartTable">
                                                    <thead>
                                                    <tr>
                                                        <th>Tên sản phẩm</th>
                                                        <th>Danh mục</th>
                                                        <th>Mã code</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <button class="btn btn-primary" style="width: 100%">Thanh toán</button>
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
                                        <form>
                                            <div>
                                                <label for="total">Tổng tiền: </label>
                                                <p>11000 VNĐ</p>
                                                <br>
                                            </div>
                                            <div>
                                                <label for="paid">Thanh toán:</label>
                                                <input type="text" id="paid" name="paid"><br><br>
                                            </div>
                                            <div>
                                                <label for="balance">Trả lại:</label>
                                                <input type="text" id="balance" name="balance"><br><br>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <button class="btn btn-primary" style="width: 100%">Thanh toán</button>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <button class="btn btn-primary" style="width: 100%">In hoá đơn</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section("custom-js")
    <script>
        /**
         * Handle function
         */
        $(document).ready(function() {

        });

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

        /**
         * Handle add product to cart
         * @type {*[]}
         */
        productArray = [];
        const addToStorage = () => {
            var storedArray = JSON.stringify(productArray);
            localStorage.setItem("product", storedArray);
        }
        const addProductToTable = (name, category, code, amount,  price) => {
            var table = document.getElementById("cartTable").getElementsByTagName('tbody')[0];
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = name;
            cell2.innerHTML = category;
            cell3.innerHTML = code;
            cell4.innerHTML = amount;
            cell5.innerHTML = price;
            addToStorage();
        }
        const addCart = (id, name, category, code, price) => {
            var value = parseInt(document.getElementById(id).value, 10);
            if(!isNaN(value) && value > 0) {
                var table = document.getElementById("cartTable").getElementsByTagName('tbody')[0];
                var row = table.insertRow(-1);
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);
                var cell4 = row.insertCell(3);
                var cell5 = row.insertCell(4);
                var deleteRow = row.insertCell(5);
                cell1.innerHTML = name;
                cell2.innerHTML = category;
                cell3.innerHTML = code;
                cell4.innerHTML = document.getElementById(id).value;
                cell5.innerHTML = (parseInt(document.getElementById(id).value, 10) * parseInt(price, 10)).toString();
                //Create button
                let button = document.createElement("button");
                button.innerText = "Xoá";
                button.className = "btn btn-sm btn-danger";
                deleteRow.appendChild(button);
                //Add to product array
                productArray.push({
                    product_name: name,
                    category_name: category,
                    product_code: code,
                    amount: document.getElementById(id).value,
                    total_price: (parseInt(document.getElementById(id).value, 10) * parseInt(price, 10)).toString()
                })
                addToStorage();
                // location.reload();
            }
        }
        const buildTable = () => {
            var retrievedProductObject = localStorage.getItem("product");
            var parsedObject = JSON.parse(retrievedProductObject);
            for (i = 0; i < parsedObject.length; i++) {
                productArray.push({
                    product_name: parsedObject[i].product_name,
                    category_name: parsedObject[i].category_name,
                    product_code: parsedObject[i].product_code,
                    amount: parsedObject[i].amount,
                    total_price: parsedObject[i].total_price
                });
                addProductToTable(parsedObject[i].product_name, parsedObject[i].category_name, parsedObject[i].product_code, parsedObject[i].amount, parsedObject[i].total_price);
            }
            let tr = document.querySelectorAll("table tbody tr");
            Array.from(tr).forEach(function(trArray, index) {
                let button = document.createElement("button");
                let td = document.createElement("td");
                button.innerText = "Xoá";
                button.className = "btn btn-sm btn-danger";
                button.addEventListener('click', function(event){
                    console.log(index);
                    document.getElementById("cartTable").deleteRow(index + 1);
                    productArray.splice(index, 1);
                    addToStorage();
                    location.reload();
                });
                td.append(button);
                trArray.append(td);
            });
        }
        buildTable();
        const deleteAllRowTable = () => {
            var tableHeaderRowCount = 1;
            var table = document.getElementById('cartTable');
            var rowCount = table.rows.length;
            for (var i = tableHeaderRowCount; i < rowCount; i++) {
                table.deleteRow(tableHeaderRowCount);
            }
        }
    </script>
@endsection
