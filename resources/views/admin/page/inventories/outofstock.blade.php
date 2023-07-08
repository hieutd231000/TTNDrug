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
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h3>Sản phẩm hết hàng</h3>
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
                            <h5>Sản phẩm đã hết hàng</h5>
                        </div>
                        <div class="col-sm-12">
                            <div class="alert alert-success hidden" id="confirmation" style="padding: 8px; margin-top: 15px">
                            </div>
                        </div>
                        <form>
                            <div class="card-body" style="padding-bottom: 0px">
                                <input class="form-control" type="text" id="productNameSearch" name="productNameSearch" placeholder="Tìm kiếm tên sản phẩm" aria-label="Search">
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
                                                    <th scope="col">Mã sản phẩm</th>
                                                    <th scope="col">Tên sản phẩm</th>
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
                                            <div class="card-footer btn btn-primary" onclick="confirmOrder( {{ $data->id }} )" style="background-color: #007bff !important;">
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
        </section>
        <!-- /.content -->

        <!-- Request Product Modal -->
        <div class="modal fade" id="requestModal" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông tin sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="product_id" value="">
                            <div class="row form-row">
                                <div class="alert alert-success hidden" id="notification" style="display: inline-block; padding: 9px !important;">
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Nhà cung cấp</label>
{{--                                        <select name="production_batch_selected" id="{{$data[0]->production_batch_id}}" style="width: 60%; margin-top: 8px; height: 30px; margin-bottom: 6px;">--}}
{{--                                            <option value="" disabled selected>Lô sản xuất</option>--}}
{{--                                            @foreach($data[0]->production_batch as $key_production_batch => $data_production_batch)--}}
{{--                                                @if($data_production_batch->expired_status)--}}
{{--                                                    <option value={{$data_production_batch->production_batch_name}}>{{$data_production_batch->production_batch_name}}</option>--}}
{{--                                                    --}}{{--                                                                            @else--}}
{{--                                                    --}}{{--                                                                                <option value={{$data_production_batch->production_batch_name}} disabled>{{$data_production_batch->production_batch_name}}</option>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </select>--}}
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
                                <div class="col-12" style="text-align: end">
                                    <button type="submit" class="btn btn-primary handleRequest">Yêu cầu</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Thoát</button>
                                </div>
                            </div>
{{--                            <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>--}}
{{--                            <button type="submit" class="btn btn-primary handleRequest">Yêu cầu</button>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Request Product Modal -->

    </div>
@endsection

@section("custom-js")
    <script>
        var imgSrc;
        /**
         * Hidden alert
         */
        $(document).ready(function(){
            $('.alert-edit').fadeIn().delay(2000).fadeOut();
        });

        $('#reservationdate').datetimepicker({
            format:'DD/MM/YYYY HH:mm:ss',
            minDate: getFormattedDate(new Date())
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
                if(product_search[2].includes(this.value)) {
                    console.log(product);
                    product.classList.remove("hidden");
                } else {
                    product.classList.add("hidden");
                    document.querySelector(".content-wrapper").style.minHeight = "auto";
                    document.querySelector(".content-wrapper").style.minHeight = null;
                }
            }
        });

        function confirmOrder(id) {
            $("#requestModal").modal("show");
        }
    </script>
@endsection
