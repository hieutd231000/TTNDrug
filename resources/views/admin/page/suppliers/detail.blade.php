<style>
    .card .body {
        padding: 10px 20px 20px 20px;
    }
    .card .header {
        padding: 20px 20px 15px 20px;
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
    .margin-20 {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .hidden {
        display: none;
    }
    .inline {
        display: inline;
    }
    .alert-edit {
        padding: .5rem 1.25rem !important;
    }
    .product-detail {
        margin-left: 5px;
        cursor: pointer;
    }
    .card-img-top {
        object-fit: cover;
        width: 250px;
        height: 235px;
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
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header" style="padding-bottom: 0px !important;">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 5px">
                        <h3>Thông tin nhà cung cấp</h3>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px">
                        <div class="select">
                            <form id="myForm">
                                @if(isset($supplierDetail))
                                    <input id="answerInput" value="{{$supplierDetail->name}}" style="height: 38px; width: 313px; padding-bottom: 6px; padding-left: 6px" list="suggestionList">
                                @else
                                    <input id="answerInput" style="height: 38px; width: 313px; padding-bottom: 6px; padding-left: 6px" list="suggestionList">
                                @endif
                                <datalist id="suggestionList">
                                    @foreach($supplier as $key => $data)
                                        <option data-value={{$data->id}}>{{$data->name}}</option>
                                    @endforeach
                                </datalist>
                                <input type="hidden" name="answer" id="answerInput-hidden">
                                <input class="btn btn-primary" type="submit" value="Chọn" style="margin-left: -3px; border-radius: 0px">
                                <div id="help-block-supplier" style="color: red">
                                </div>
                            </form>
                        </div>
                    </div><!-- /.col -->
                </div>
                @isset ($supplierDetail)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px">
                        <div class="card">
                            <div class="header">
                                <h5 style="display: inline">Thông tin cơ bản</h5>
                                @if(auth()->user()->role)
                                    <i class="fas fa-edit float-right" style="cursor: pointer" onclick="editSupplier({{$supplierDetail->id}})">
                                    </i>
                                @endif
                            </div>

                            <div class="body">
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Tên nhà cung cấp:</p>
                                    <p class="col-sm-10">{{$supplierDetail->name}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Email:</p>
                                    <p class="col-sm-10">{{$supplierDetail->email}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Số điện thoại:</p>
                                    <p class="col-sm-10">{{$supplierDetail->phone}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Địa chỉ:</p>
                                    <p class="col-sm-10">{{$supplierDetail->address}}</p>
                                </div>
                                <div class="row">
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Số lượng dược phẩm:</p>
                                    <p id="totalProduct" style="margin-left: 4px">{{$totalProduct}}</p>
                                    <a class="product-detail" style="margin: 4px 0px 0px 10px" onclick="viewAllProduct()">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                @if ($supplierDetail->introduce)
                                    <div class="row">
                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Giới thiệu:</p>
                                        <p class="col-sm-10">{{$supplierDetail->introduce}}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endisset
                @isset ($listProduct)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 listProductBySupplier">
                        <div class="card">
                            <div class="header">
                                <h5>Danh sách dược phẩm</h5>
                                <div style="text-align: end">
                                    @if(auth()->user()->role)
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Thêm dược phẩm</button>
                                        @if($totalProduct)
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Xoá dược phẩm</button>
                                        @endif
                                    @endif
                                    <a class="btn btn-info" href="/admin/orders/{{$supplierDetail->id}}/product">Nhập hàng</a>
                                </div>
                            </div>
                            <div class="card-body" style="padding-top: 0px !important;">
                                <table id="listProductTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên dược phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Mã sản phẩm</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($totalProduct == 0)
                                        <tr>
                                            <td colspan="4" style="text-align: center">Không có dược phẩm</td>
                                        </tr>
                                    @else
                                        @foreach($listProduct as $key => $data)
                                            <tr>
                                                <td>{{$rank ++}}</td>
                                                <td>
                                                    <div style="cursor: pointer; color: blue" onclick="viewProduct({{$data[0]->id}})">
                                                        {{$data[0]->product_name}}
                                                    </div>
                                                </td>
                                                <td>{{$data[0]->category_name}}</td>
                                                <td>{{$data[0]->product_code}}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            {{--                        <div class="d-flex justify-content-end" style="margin-right: 3%">--}}
                            {{--                            {!! $listProduct[0]->appends($_GET)->links("pagination::bootstrap-4") !!}--}}
                            {{--                        </div>--}}
                        </div>
                    </div>
                @endisset

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!--Add Modal -->
        @isset($supplierDetail)
            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm dược phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplierDetail->id }}">
                                <div class="form-group">
                                    <select data-placeholder="Lựa chọn dược phẩm bạn muốn thêm..." multiple class="chosen-select" style="margin-bottom: 3px" name="product_add">
{{--                                    <select name="product_selected" id="product_selected" style="height: 38px; width: 100%">--}}
{{--                                        <option value="" disabled selected>Chọn dược phẩm</option>--}}
                                        @foreach($listNotProduct as $key => $data)
                                            <option value={{$data->id}}>{{$data->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="help-block-add-product" style="color: red">
                                    </div>
                                    <div id="help-block-success-add" style="color: green">
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary handleCancel">Huỷ bỏ</button>
                                    <button type="submit" class="btn btn-primary handleAdd">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
        <!--View Modal -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <img src="" class="card-img-top" id="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="product-name" id="product-name" style="margin-bottom: 20px">Card title</h3>
                                <p class="product-code" id="product-code"></p>
                                <p class="category" id="category"></p>
                                <p class="route_of_use" id="route_of_use"></p>
                                <p class="dosage" id="dosage"></p>
                                <p class="content" id="content"></p>
                                <p class="instruction" id="instruction"></p>
                                <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        <!--Delete Modal -->

        @isset($supplierDetail)
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xoá dược phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplierDetail->id }}">
                                <div class="form-group">
                                    <select data-placeholder="Lựa chọn dược phẩm bạn muốn xoá..." multiple class="chosen-select" style="margin-bottom: 3px" name="product_delete">
{{--                                        <option value=""></option>--}}
                                        @foreach($listProduct as $key => $data)
                                            <option value="{{$data[0]->id}}">{{$data[0]->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="help-block-delete-product" style="color: red; margin-top: 5px">
                                    </div>
                                    <div id="help-block-success-delete" style="color: red; margin-top: 5px">
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                    <button type="submit" class="btn btn-danger handleDelete">Xoá</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection

@section("custom-js")
    <script>
        var imgSrc;
        /**
         * Hidden alert
        //  */
        $(document).ready(function(){
            $('.alert-edit').fadeIn().delay(2000).fadeOut();
        });

        /**
         * Confirm delete category
         * @param id
         */
        function viewAllProduct() {
            if(document.querySelector(".listProductBySupplier").classList.contains("hidden")) {
                document.querySelector(".listProductBySupplier").classList.remove("hidden")
            } else {
                document.querySelector(".listProductBySupplier").classList.add("hidden")
            }
        }

        /**
         * Handle add new supplier product
         */
        var listProduct = {!! $listProductId !!};
        $(document).ready(function() {
            $(".handleCancel").click(function(e){
                e.preventDefault();
                document.getElementById("help-block-product").innerHTML = "";
                $('#product_selected').val("");
                $("#addModal").modal("hide");
            })
            $(".handleDelete").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var product_id = $("select[name='product_delete']").val();
                var supplier_id = $("input[name='supplier_id']").val();
                var blockErrProductDelete = document.getElementById("help-block-delete-product");
                var blockSuccessDelete = document.getElementById("help-block-success-delete");
                blockSuccessDelete.innerHTML = "";
                console.log(product_id);
                // Check validate
                if(!product_id.length) {
                    blockErrProductDelete.innerHTML = "Mời bạn chọn dược phẩm";
                } else {
                    blockErrProductDelete.innerHTML = "";
                }
                if(!blockErrProductDelete.innerHTML) {
                    $.ajax({
                        url: "/admin/suppliers/delete-product",
                        type:'POST',
                        data: {_token:_token, product_id:product_id, supplier_id:supplier_id},
                        success: function(response) {
                            blockErrProductDelete.innerHTML = "";
                            blockSuccessDelete.innerHTML = "Xoá dược phẩm thành công";
                            setTimeout(function(){
                                location.reload();
                            }, 800);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                    setTimeout(function(){
                        $("#deleteModal").modal("hide");
                    }, 400);
                }
            });
            $(".handleAdd").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var product_id = $("select[name='product_add']").val();
                var supplier_id = $("input[name='supplier_id']").val();
                var blockErrProductAdd = document.getElementById("help-block-add-product");
                var blockSuccessAdd= document.getElementById("help-block-success-add");
                blockSuccessAdd.innerHTML = "";
                console.log(product_id);
                // Check validate
                if(!product_id.length) {
                    blockErrProductAdd.innerHTML = "Mời bạn chọn dược phẩm";
                } else {
                    for(let i=0; i<product_id.length; i++) {
                        if(!checkExistProduct(product_id[i])) {
                            blockErrProductAdd.innerHTML = "Dược phẩm này đã có trong danh sách";
                            break;
                        }
                        blockErrProductAdd.innerHTML = "";
                    }
                }
                if(!blockErrProductAdd.innerHTML) {
                    $.ajax({
                        url: "/admin/suppliers/add-product",
                        type:'POST',
                        data: {_token:_token, product_id:product_id, supplier_id:supplier_id},
                        success: function(response) {
                            blockErrProductAdd.innerHTML = "";
                            blockSuccessAdd.innerHTML = "Thêm dược phẩm thành công";
                            setTimeout(function(){
                                location.reload();
                            }, 800);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                    setTimeout(function(){
                        $("#addModal").modal("hide");
                    }, 400);
                }
            });

        });
        const addProductToTable = (name, category, code) => {
            var table = document.getElementById("listProductTable").getElementsByTagName('tbody')[0];
            var totalProduct = document.getElementById("totalProduct").textContent;
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            // var deleteRow = row.insertCell(5);

            var currenTotal = (Number(totalProduct) + 1).toString()
            document.getElementById("totalProduct").textContent = currenTotal;
            cell1.innerHTML = currenTotal;
            cell2.innerHTML = name;
            cell3.innerHTML = category;
            cell4.innerHTML = code;
            // cell5.innerHTML = (parseInt(document.getElementById(id).value, 10) * parseInt(price, 10)).toString();
            //Create button
            // let button = document.createElement("button");
            // button.innerText = "Xoá";
            // button.className = "btn btn-sm btn-danger";
            // deleteRow.appendChild(button);
            //Add to product array
            // productArray.push({
            //     product_name: name,
            //     category_name: category,
            //     product_code: code,
            //     amount: document.getElementById(id).value,
            //     total_price: (parseInt(document.getElementById(id).value, 10) * parseInt(price, 10)).toString()
            // })
            // addToStorage();
            // location.reload();
        }

        const checkExistProduct = (product_id) => {
            for (let i = 0; i < listProduct.length; i++) {
                if(parseInt(product_id) === listProduct[i]["product_id"]) {
                    return false;
                }
            }
            return true;
        }
        /**
         * Handle when chose supplier
         */
        document.querySelector('input[list]').addEventListener('input', function(e) {
            var input = e.target,
                list = input.getAttribute('list'),
                options = document.querySelectorAll('#' + list + ' option'),
                hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
                inputValue = input.value;

            hiddenInput.value = inputValue;

            for(var i = 0; i < options.length; i++) {
                var option = options[i];

                if(option.innerText === inputValue) {
                    hiddenInput.value = option.getAttribute('data-value');
                    break;
                }
            }
        });
        document.getElementById("myForm").addEventListener('submit', function(e) {
            var supplier_search = $("input[name=answer]").val();
            console.log(supplier_search);
            if(supplier_search === "") {
                document.getElementById("help-block-supplier").innerHTML = "Mời bạn chọn nhà cung cấp";
            } else {
                document.getElementById("help-block-supplier").innerHTML = "";
                window.location.href = "/admin/suppliers/" + supplier_search + "/detail";
            }
            e.preventDefault();
        });

        // const handleSearch = () => {
            // var supplier_search = $("input[name=answer]").val();
            // alert(supplier_search);
            // if(supplier_search === "null") {
            //     document.getElementById("help-block-supplier").innerHTML = "Mời bạn chọn nhà cung cấp";
            // } else {
            //     document.getElementById("help-block-supplier").innerHTML = "";
            //     window.location.href = "/admin/suppliers/" + supplier_search + "/detail";
            // }
        // }
        /**
         * Chosen jquery
         */
        $(".chosen-select").chosen({
            width: "100%",
        })
        $(".chosen-choices").css('font-size','14px');
        $(".search-choice").css('font-size','16px');
        $(".chosen-results").css('font-size','16px');

        const editSupplier = (id) => {
            window.location.href = "/admin/suppliers/" + id + "/edit";
        }

        /**
         * Confirm view product
         * @param id
         */
        const viewProduct = (id) => {
            $.ajax({
                url: "/admin/products/detail",
                type:'GET',
                data: { id:id },
                success: function(response) {
                    console.log(response["data"]);
                    if(response["code"] === 200) {
                        document.getElementById("card-img-top").src = '{{ URL::asset('image/products') }}' + '/' + response["data"][0]["product_image"];
                        document.getElementById("product-name").innerHTML = response["data"][0]["product_name"];
                        document.getElementById("product-code").innerHTML = "<span class='text-muted'><i>Mã sản phẩm: </i></span>" + response["data"][0]["product_code"];
                        document.getElementById("category").innerHTML = "<span class='text-muted'><i>Danh mục: </i></span>" + response["data"][0]["category_name"];
                        document.getElementById("route_of_use").innerHTML = "<span class='text-muted'><i>Đường dùng: </i></span>" + response["data"][0]["route_of_use"];
                        document.getElementById("dosage").innerHTML = "<span class='text-muted'><i>Dạng bào chế: </i></span>" + response["data"][0]["dosage"];
                        document.getElementById("content").innerHTML = "<span class='text-muted'><i>Hàm lượng: </i></span>" + response["data"][0]["content"];
                        if(response["data"][0]["instruction"]) {
                            document.getElementById("instruction").innerHTML = "<span style='color: red'>Hướng dẫn sử dụng: </span>" + response["data"][0]["instruction"];
                        } else {
                            document.getElementById("instruction").innerHTML = "";
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            $("#viewModal").modal("show");
        }

    </script>

@endsection
