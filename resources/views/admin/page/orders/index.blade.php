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
        padding: 20px 20px 15px 20px;
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
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0">Danh sách order</h4>
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
            <div class="container-fluid" style="margin-bottom: 25px">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#order" class="nav-link active" data-toggle="tab">Đặt hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="#verifyOrder" class="nav-link" data-toggle="tab">Xác nhận đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a href="#listOrder" class="nav-link" data-toggle="tab">Danh sách đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane padding-20 in active" id="order">
                        <form action="{{ url("admin/orders/add-product") }}" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h5>Thông tin đơn hàng</h5>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <select class="form-control" name="supplier[]" id="supplier_id" style="margin-bottom: 17px">
                                                            <option value="Nha cung cap">Nhà cung cấp *</option>
                                                            <option value="Tran Duc Hieu">Boots</option>
                                                            @foreach($listSupplier as $key => $data)
                                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select class="form-control attribute" name="product[]" id="product_id">
                                                            <option value="">Sản phẩm</option>
                                                            {{--                                                            @foreach($listProduct as $key => $data)--}}
                                                            {{--                                                                <option value={{$data->id}} {{ old("product_id") == $data->id ? "selected":"" }}>{{$data->product_name}}</option>--}}
                                                            {{--                                                            @endforeach--}}
                                                        </select>
                                                    </div>
{{--                                                    @if($errors->has('supplier_id'))--}}
{{--                                                        <p style="height: 0; margin: 0; color: red">--}}
{{--                                                            {{$errors->first('supplier_id')}}--}}
{{--                                                        </p>--}}
{{--                                                        <br>--}}
{{--                                                    @endif--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Số lượng" value="{{ old("quantity") }}">
                                                    </div>
                                                    @if($errors->has('quantity'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('quantity')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" name="total_price" id="total_price" class="form-control" placeholder="Tổng tiền" value="{{ old("quantity") }}">
                                                    </div>
                                                    @if($errors->has('total_price'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('total_price')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" class="form-control" name="pickupDate" placeholder="Ngày đặt hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
                                                    </div>
                                                    @if($errors->has('pickupDate'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('pickupDate')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <textarea name="detail" id="detail" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản...">{{ old("detail") }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div id="help-block-submit" class="margin-bottom-10" style="color: green">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit" style="margin-right: 3px">Đặt hàng</button>
                                                <button type="button" class="btn btn-cancel handleCancel">Huỷ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane padding-20" id="verifyOrder">
                        <form action="{{ url("admin/orders/add-product") }}" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Danh sách đơn hàng chờ xác nhận</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="card text-center text-bg-light" style="margin-bottom: 40px">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Tên nhà cung cấp</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col">Ngày đặt hàng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer btn btn-primary" style="background-color: #007bff !important;">
                                                Xác nhận đơn hàng
                                            </div>
                                        </div>
                                        <div class="card text-center text-bg-light" style="margin-bottom: 40px">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Tên nhà cung cấp</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col">Ngày đặt hàng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer btn btn-primary" style="background-color: #007bff !important;">
                                                Xác nhận đơn hàng
                                            </div>
                                        </div>
                                        <div class="card text-center text-bg-light" style="margin-bottom: 40px">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Tên nhà cung cấp</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col">Ngày đặt hàng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer btn btn-primary" style="background-color: #007bff !important;">
                                                Xác nhận đơn hàng
                                            </div>
                                        </div>
                                        <div class="card text-center text-bg-light" style="margin-bottom: 40px">
                                            <div class="card-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Tên sản phẩm</th>
                                                            <th scope="col">Tên nhà cung cấp</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">SĐT</th>
                                                            <th scope="col">Số lượng</th>
                                                            <th scope="col">Tổng giá</th>
                                                            <th scope="col">Ngày đặt hàng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer btn btn-primary" style="background-color: #007bff !important;">
                                                Xác nhận đơn hàng
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane padding-20" id="listOrder">
                        <form action="{{ url("admin/orders/add-product") }}" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h5>Thông tin ordedsr</h5>
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <select class="form-control" name="product_id" id="product_id">
                                                            <option value="">Sản phẩm *</option>
                                                            @foreach($listProduct as $key => $data)
                                                                <option value={{$data->id}} {{ old("product_id") == $data->id ? "selected":"" }}>{{$data->product_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('product_id'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('product_id')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Số lượng" value="{{ old("quantity") }}">
                                                    </div>
                                                    @if($errors->has('quantity'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('quantity')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <select class="form-control" name="supplier_id" id="supplier_id">
                                                            <option value="">Nhà cung cấp *</option>
                                                            @foreach($listSupplier as $key => $data)
                                                                <option value={{$data->id}} {{ old("supplier_id") == $data->id ? "selected":"" }}>{{$data->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @if($errors->has('supplier_id'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('supplier_id')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" class="form-control" name="pickupDate" placeholder="Ngày lấy hàng *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
                                                    </div>
                                                    @if($errors->has('pickupDate'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('pickupDate')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <input type="text" class="form-control" name="expriedDate" placeholder="Ngày hết hạn *" id="reservationdate1"  data-target="#reservationdate1" data-toggle="datetimepicker"/>
                                                    </div>
                                                    @if($errors->has('expriedDate'))
                                                        <p style="height: 0; margin: 0; color: red">
                                                            {{$errors->first('expriedDate')}}
                                                        </p>
                                                        <br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-block">
                                                        <textarea name="detail" id="detail" rows="4" class="form-control no-resize" placeholder="Mô tả cơ bản...">{{ old("detail") }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div id="help-block-submit" class="margin-bottom-10" style="color: green">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit" style="margin-right: 3px">Đặt hàng</button>
                                                <button type="button" class="btn btn-cancel handleCancel">Huỷ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{--Thêm order--}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section("custom-js")
    <script>
        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        $('#reservationdate1').datetimepicker({
            format: 'L'
        });

        var proNamebysupName = {!! $proNamebysupName !!};
        var attribute = {
            'Nha cung cap': ['Sản phẩm'],
            'Tran Duc Hieu': ['standard'],
            // 'trous': ['male', 'female'],
            // 'shirt': ['blue', 'red', 'green', 'brown', 'yellow'],
            // 'hoodie': ['blue', 'red'],
        }
        var att = [];
        $(document).ready(function(){
            $('select[name*="[]"]').each(function(){
                $('select[name*="[]"]').change(function () {
                    var $attribute = $(this).next('.attribute');
                    var product = $(this).val(), lcns = attribute[product] || [];
                    var html = $.map(lcns, function(lcn){
                        return '<option value="' + lcn + '">' + lcn + '</option>'
                    }).join('');
                    $attribute.html(html)
                });
            });
            getAllProductNameBySupplierName();
        });
        const getAllProductNameBySupplierName = () => {
            console.log(attribute);
            // for(var i=0; i<proNamebysupName.length; i++) {
            //     console.log(proNamebysupName[i]["supplier_name"]);
            // }
        }
    </script>
@endsection
