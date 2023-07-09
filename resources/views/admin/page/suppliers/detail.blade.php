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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
                            <select id="standard-select" style="height: 38px; width: 300px; padding-left: 5px">
                                <option value="null" disabled selected>Chọn nhà cung cấp</option>
                                @if(isset($supplierDetail))
                                    @foreach($supplier as $key => $data)
                                        <option value={{$data->id}} {{ $supplierDetail->id == $data->id ? 'selected' : '' }}>{{$data->name}}</option>
                                    @endforeach
                                @else
                                    @foreach($supplier as $key => $data)
                                        <option value={{$data->id}}>{{$data->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <span class="focus"></span>
                            <input class="btn btn-primary" onclick="handleSearch()" type="button" value="Chọn" style="margin-bottom: 5px">
                            <div id="help-block-supplier" style="color: red">
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div>
                @isset ($supplierDetail)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px">
                        <div class="card">
                            <div class="header">
                                <h5>Thông tin cơ bản</h5>
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
                                    <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">Số lượng sản phẩm:</p>
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
                                <h5>Danh sách sản phẩm</h5>
                                <div style="text-align: end">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Thêm sản phẩm</button>
                                    @if($totalProduct)
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">Xoá sản phẩm</button>
                                    @endif
                                    <a class="btn btn-success" href="/admin/orders/{{$supplierDetail->id}}/product">Đặt hàng</a>
                                </div>
                            </div>
                            <div class="card-body" style="padding-top: 0px !important;">
                                <table id="listProductTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Danh mục</th>
                                        <th>Mã code</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($totalProduct == 0)
                                        <tr>
                                            <td colspan="4" style="text-align: center">Không có sản phẩm</td>
                                        </tr>
                                    @else
                                        @foreach($listProduct as $key => $data)
                                            <tr>
                                                <td>{{$rank ++}}</td>
                                                <td>{{$data[0]->product_name}}</td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplierDetail->id }}">
                                <div class="form-group">
                                    <select name="product_selected" id="product_selected" style="height: 38px; width: 100%">
                                        <option value="" disabled selected>Chọn sản phẩm</option>
                                        @foreach($listAllProduct as $key => $data)
                                            <option value={{$data->id}}>{{$data->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="help-block-product" style="color: red">
                                    </div>
                                    <div id="help-block-success" style="color: green">
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button type="button" class="btn btn-secondary handleCancel">Huỷ bỏ</button>
                                    <button type="submit" class="btn btn-primary handleSubmit">Lưu</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Danh sách sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <img src="" class="card-img-top" id="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="product-name" id="product-name">Card title</h3>
                                <p class="product-code" id="product-code"></p>
                                <p class="category" id="category"></p>
{{--                                <p class="unit" id="unit"></p>--}}
{{--                                <p class="price-unit" id="price-unit"></p>--}}
                                <p class="instruction" id="instruction"></p>
                                <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Delete Modal -->
        @isset($supplierDetail)
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="supplier_id" value="{{ $supplierDetail->id }}">
                                <div class="form-group">
                                    <select data-placeholder="Lựa chọn sản phẩm bạn muốn xoá..." multiple class="chosen-select" style="margin-bottom: 3px" name="product_delete">
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
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var product_id = $('#product_selected').find(":selected").val();
                var supplier_id = $("input[name='supplier_id']").val();
                var blockErrProduct = document.getElementById("help-block-product");
                var blockSuccess = document.getElementById("help-block-success");
                blockSuccess.innerHTML = "";
                // Check validate
                if(!product_id) {
                    blockErrProduct.innerHTML = "Mời bạn chọn sản phẩm";
                } else if(!checkExistProduct(product_id)) {
                    blockErrProduct.innerHTML = "Sản phẩm này đã có trong danh sách";
                } else {
                    blockErrProduct.innerHTML = "";
                }
                if(!blockErrProduct.innerHTML) {
                    $.ajax({
                        url: "/admin/suppliers/add-product",
                        type:'POST',
                        data: {_token:_token, product_id:product_id, supplier_id:supplier_id},
                        success: function(response) {
                            blockErrProduct.innerHTML = "";
                            blockSuccess.innerHTML = "Thêm sản phẩm thành công";
                            console.log(response["data"]);
                            // addProductToTable(response["data"][0], response["data"][1], response["data"][2]);
                            setTimeout(function(){
                                location.reload();
                            }, 600);
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
                    blockErrProductDelete.innerHTML = "Mời bạn chọn sản phẩm";
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
                            blockSuccessDelete.innerHTML = "Xoá sản phẩm thành công";
                            setTimeout(function(){
                                location.reload();
                            }, 600);
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
        const handleSearch = () => {
            var supplier_search = $('#standard-select').find(":selected").val();
            if(supplier_search === "null") {
                document.getElementById("help-block-supplier").innerHTML = "Mời bạn chọn nhà cung cấp";
            } else {
                document.getElementById("help-block-supplier").innerHTML = "";
                window.location.href = "/admin/suppliers/" + supplier_search + "/detail";
            }
        }
        /**
         * Chosen jquery
         */
        $(".chosen-select").chosen({
            width: "100%",
        })
        $(".chosen-choices").css('font-size','14px');
        $(".search-choice").css('font-size','16px');
        $(".chosen-results").css('font-size','16px');
    </script>

@endsection
