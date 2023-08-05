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
    /*.supplier_select {*/
    /*    font-size:16px;*/
    /*    padding-left: 5px;*/
    /*    width: 100%;*/
    /*    border: 1px solid #ced4da;*/
    /*    background-color: #fff; */
    /*    border-radius: 0.25rem;*/
    /*    min-height: 38px*/
    /*}*/
    .no-resize {
        resize: none;
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
        display: none !important;
    }
    .alert-edit {
        padding: .5rem 1.25rem !important;
    }
    .card-img-top {
        object-fit: cover;
        width: 250px;
        height: 235px;
    }
    #loading {
        background: {{ URL::asset('image/loading_icon.gif')}} no-repeat center center;
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 9999999;
    }
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                @if (session('failed'))
                    <div class="alert alert-danger" style="display: inline-block">
                        {{ session('failed') }}
                    </div>
                @elseif(session('success'))
                    <div class="alert alert-success" style="display: inline-block">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h3>Dược phẩm hết hàng</h3>
                        {{--                        <ol class="breadcrumb">--}}
                        {{--                            <li class="breadcrumb-item"><a href="/admin/dashboard" style="color: black">Thống kê</a></li>--}}
                        {{--                            <li class="breadcrumb-item"><a href="/admin/products" style="color: black">Sản phẩm</a></li>--}}
                        {{--                            <li class="breadcrumb-item"><a href="/admin/products">Danh sách sản phẩm</a></li>--}}
                        {{--                        </ol>--}}
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Dược phẩm đã hết hàng</h5>
                        </div>
                        <div class="col-sm-12">
                            <div class="alert alert-success hidden" id="confirmation" style="padding: 8px; margin-top: 15px">
                            </div>
                        </div>
                        <form>
                            <div class="card-body" style="padding-bottom: 0px">
                                <input class="form-control" type="text" id="productNameSearch" name="productNameSearch" placeholder="Tìm kiếm tên dược phẩm" aria-label="Search">
                            </div>
                        </form>
                        @foreach($listOutOfStock as $key => $data)
                            @if(!$data->checkAmount)
                                <form id="{{$data->search_product_name}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card-body" style="padding-bottom: 0px">
                                    <div class="card text-center" style="color: #000 !important; background-color: #e9e9e9 !important;">
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Mã dược phẩm</th>
                                                    <th scope="col">Tên dược phẩm</th>
                                                    <th scope="col">DS nhà cung cấp</th>
                                                    <th scope="col">Danh mục</th>
                                                    <th scope="col">Đường dùng</th>
                                                    <th scope="col">Dạng bào chế</th>
                                                    <th scope="col">Hàm lượng</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>{{$data->product_code}}</td>
                                                    <td>{{$data->product_name}}</td>
                                                    <td>
                                                        @if(count($data->listSupplier))
                                                            @foreach($data->listSupplier as $supplier)
                                                                <p>{{$supplier->supplier_name}}</p>
                                                            @endforeach
                                                        @else
                                                            <p style="color: red; font-weight: bold">Không có</p>
                                                        @endif

                                                    </td>
                                                    <td>{{$data->category_name}}</td>
                                                    <td>{{$data->route_of_use}}</td>
                                                    <td>{{$data->dosage}}</td>
                                                    <td>{{$data->content}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        @if(count($data->listSupplier))
                                            <div class="card-footer btn btn-primary" onclick="confirmOrder('{{$data->product_code}}',{{$data->listSupplier}})" style="background-color: #007bff !important;">
                                                Gửi yêu cầu
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <!-- Request Product Modal -->
            <div class="modal fade" id="requestModal" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Thông tin dược phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="request_form_id">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="product_code" value="">
                                <div class="row form-row">
                                    <div class="alert alert-success hidden" id="notification" style="display: inline-block; padding: 9px !important;">
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Nhà cung cấp</label>
                                            <select data-placeholder="Lựa chọn nhà cung cấp..." multiple class="chosen-select" name="supplier_selected" id="supplier_selected">
{{--                                                <option value="" disabled selected>Nhà cung cấp</option>--}}
                                            </select>
                                            <div id="help-block-supplier" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" name="amount" type="text" value="" placeholder="Số lượng *">
                                            <div id="help-block-amount" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Ngày yêu cầu</label>
                                            <input type="text" class="form-control" value="" name="request_time" placeholder="Thời gian yêu cầu *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker" autocomplete="off"/>
                                            <div id="help-block-dateRequest" style="color: red">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Mô tả thêm</label>
                                            <textarea name="detail" id="detail" rows="4" class="form-control no-resize" placeholder="Thông tin thêm"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div id="help-block-success" style="color: green">
                                        </div>
                                    </div>
                                    <div class="col-12" style="text-align: end">
                                        <button type="button" class="btn btn-primary handleRequest">Yêu cầu</button>
                                        <button type="button" class="btn btn-primary">
                                            <div id="loading"></div>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Request Product Modal -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section("custom-js")
    <script>
        var imgSrc;
        /**
         * Hidden alert
         */
        $(document).ready(function() {
            $('.alert-edit').fadeIn().delay(2000).fadeOut();
            var blockErrSupplierSelected = document.getElementById("help-block-supplier");
            var blockErrAmount = document.getElementById("help-block-amount");
            var blockErrDateRequest = document.getElementById("help-block-dateRequest");
            var blockSuccess = document.getElementById("help-block-success");
            $('#requestModal').on('hidden.bs.modal', function () {
                $("#request_form_id").trigger("reset");
                blockErrSupplierSelected.innerHTML = "";
                blockErrAmount.innerHTML = "";
                blockErrDateRequest.innerHTML = "";
                blockSuccess.innerHTML = "";
            });
            $(".handleRequest").click(function (e) {
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var product_code = $("input[name='product_code']").val();
                var supplier_selected = $("select[name='supplier_selected']").val();
                var amount = $("input[name='amount']").val();
                var request_time = $("input[name='request_time']").val();
                var detail = $("textarea[name='detail']").val();
                blockSuccess.innerHTML = "";
                console.log(supplier_selected);

                if(!supplier_selected.length) {
                    blockErrSupplierSelected.innerHTML = "Không được bỏ trống"
                } else {
                    blockErrSupplierSelected.innerHTML = ""
                }

                if(!amount) {
                    blockErrAmount.innerHTML = "Không được bỏ trống"
                } else if(!checkNumber(amount)) {
                    blockErrAmount.innerHTML = "Sai định đạng"
                } else if(parseInt(amount) === 0) {
                    blockErrAmount.innerHTML = "Số lượng phải lớn hơn 0 !"
                } else {
                    blockErrAmount.innerHTML = ""
                }

                if(!request_time) {
                    blockErrDateRequest.innerHTML = "Mời bạn nhập ngày nhận hàng";
                } else {
                    blockErrDateRequest.innerHTML = "";
                }

                if(!blockErrDateRequest.innerHTML && !blockErrAmount.innerHTML && !blockErrSupplierSelected.innerHTML) {
                    $.ajax({
                        url: "/admin/inventories/request-outofstock",
                        type:'POST',
                        data: {_token:_token, product_code:product_code, supplier_selected: supplier_selected, amount:amount, request_time:request_time, detail:detail},
                        success: function(response) {
                            blockSuccess.innerHTML = "Yêu cầu thêm về dược phẩm thành công"
                            setTimeout(function(){
                                $("#requestModal").modal("hide");
                            }, 1000);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    })
                }
            });
        });

        /**
         * Date input config
         */
        $('#reservationdate').datetimepicker({
            format:'DD/MM/YYYY HH:mm:ss',
            // minDate: getFormattedDate(new Date())
        });

        function getFormattedDate(date) {
            var day = date.getDate() + 1;
            var month = date.getMonth() + 1;
            var year = date.getFullYear().toString().slice(2);
            return month + '-' + day + '-' + year;
        }

        /**
         * Handle when search box
         */
        document.getElementById("productNameSearch").addEventListener('keyup', function(){
            const allProduct = document.querySelectorAll('[id^="sch_outofpro"]');
            for(let product of allProduct) {
                const product_search = product.id.split('_');
                if(product_search[2].includes(this.value.toLowerCase().replace(/\s/g,''))) {
                    console.log(product);
                    product.classList.remove("hidden");
                } else {
                    product.classList.add("hidden");
                    document.querySelector(".content-wrapper").style.minHeight = "auto";
                    document.querySelector(".content-wrapper").style.minHeight = null;
                }
            }
        });

        /**
         *
         * @param selectElement
         */
        function removeOptions(selectElement) {
            var i, L = selectElement.options.length - 1;
            for(i = L; i >= 0; i--) {
                selectElement.remove(i);
            }
        }

        /**
         *
         * @param num
         * @returns {boolean}
         */
        const checkNumber = (num) => {
            return /^\d+$/.test(num);
        }

        /**
         *
         * @param id
         * @param listSupplier
         */
        const confirmOrder = (productCode, listSupplier) => {
            console.log(productCode);
            $("input[name='product_code']").val(productCode);
            let select = document.getElementById("supplier_selected");
            removeOptions(select);
            // Add list supplier
            for (const supplier of listSupplier) {
                const newOption = document.createElement('option');
                const optionText = document.createTextNode(supplier.supplier_name);
                // set option text
                newOption.appendChild(optionText);
                // and option value
                newOption.setAttribute('value',supplier.supplier_name);
                // add to select
                select.appendChild(newOption);
            }

            /**
             * Chosen jquery
             */
            $("#supplier_selected").trigger("chosen:updated");
            $(".chosen-select").chosen({
                width: "100%",
            })
            $(".chosen-choices").css('font-size','14px');
            $(".search-choice").css('font-size','16px');
            $(".chosen-results").css('font-size','16px');

            // console.log(listSupplier);
            $("#requestModal").modal("show");
        }
    </script>
@endsection
