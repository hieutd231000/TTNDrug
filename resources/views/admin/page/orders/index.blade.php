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
            <div class="container-fluid">
                {{--Thêm order--}}
                <form action="{{ url("admin/orders/add-product") }}" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h5>Thông tin order</h5>
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
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-block">
                                                <input type="text" class="form-control" name="pickupDate" placeholder="Ngày lấy hàng" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
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
                                        <div id="help-block-submit" class="margin-bottom-10" style="color: green">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-raised g-bg-cyan margin-right-3 handleSubmit" style="margin-right: 3px">Thêm mới</button>
                                        <button type="button" class="btn btn-cancel handleCancel">Huỷ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    </script>
@endsection
