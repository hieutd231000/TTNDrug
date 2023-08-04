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
    .hidden {
        display: none;
    }
    .alert-edit {
        padding: .5rem 1.25rem !important;
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
                        <h4>Lô sản xuất</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <a href="" class="btn btn-raised g-bg-cyan float-right mt-2" data-toggle="modal" data-target="#addModal">Thêm lô sản xuất</a>
                        <a href="/admin/orders/{{0}}/product" style="margin-right: 5px" class="btn btn-success float-right mt-2">Đặt hàng</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix margin-bottom-20">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                @if (session('failed'))
                                    <div class="alert alert-edit alert-danger" style="display: inline">
                                        {{ session('failed') }}
                                    </div>
                                @elseif(session('success'))
                                    <div class="alert alert-edit alert-success" style="display: inline">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table id="category" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên lô sản xuất</th>
                                        <th>Sản phẩm</th>
                                        <th>Ngày hết hạn</th>
                                        <th>Trạng thái</th>
                                        <th>Sửa/Xoá</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listProductionBatch as $key => $data)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ $data->production_batch_name }}</td>
                                            <td>{{ $data->product_name }}</td>
                                            <td>{{ $data->expired_time }}</td>
                                            @if($data->status)
                                                <td>
                                                    <button class="btn btn-primary " disabled style="opacity: 1 !important; width: 80%">Còn hạn</button>
                                                </td>
                                            @else
                                                <td>
                                                    <button class="btn btn-danger" disabled style="opacity: 1 !important; width: 80%">Hết hạn</button>
                                                </td>
                                            @endif
                                            <td style="font-size: 20px">
                                                <a data-id="1" id="editBtn" style="cursor: pointer; color: blue; margin-right: 5px; margin-left: 7px">
                                                    <i class="fas fa-edit" onclick="editForm({{ $data->id }}, '{{ $data->production_batch_name }}', '{{ $data->product_id }}' , '{{ $data->expired_time }}')" data-toggle="modal" data-target="#editModal"></i>
                                                </a>
                                                <a data-id="1" id="deleteBtn" style="cursor: pointer;   color: red">
                                                    <i class="fas fa-trash" onclick="confirmDelete( {{ $data->id }} )" data-toggle="modal" data-target="#deleteModal"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="d-flex justify-content-end" style="margin-right: 3%">
                                {!! $listProductionBatch->appends($_GET)->links("pagination::bootstrap-4") !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!--Add Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm lô sản xuất</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hidden" id="notification">
                        </div>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="productionBatchName">Tên lô sản xuất <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="64" class="form-control" name="productionBatchName" id="productionBatchName" placeholder="Nhập tên lô sản xuất *">
                                <div id="help-block-productionBatchName" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_selected">Tên sản phẩm <span style="color: red">*</span></label>
                                <select name="product_selected" id="product_selected" style="height: 38px; width: 100%">
                                    <option value="" disabled selected>Chọn sản phẩm</option>
                                    @foreach($listAllProduct as $key => $data)
                                        <option value={{$data->id}}>{{$data->product_name}}</option>
                                    @endforeach
                                </select>
                                <div id="help-block-product" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productionBatchExpiredTime">Ngày hết hạn <span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{ old("productionBatchExpiredTime") }}" name="productionBatchExpiredTime" placeholder="Ngày hết hạn *" id="reservationdate"  data-target="#reservationdate" data-toggle="datetimepicker"/>
                                <div id="help-block-expired-time" style="color: red">
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                                <button type="submit" class="btn btn-primary handleSubmit">Lưu</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Sửa thông tin lô sản xuất</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hidden" id="notificationEdit">
                        </div>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id_production_batch_edit" id="id_production_batch_edit" value="">
                            <input type="hidden" name="currentProductionBatchName" id="currentProductionBatchName" value="">
                            <div class="form-group">
                                <label for="productionBatchNameEdit">Tên lô sản xuất <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="64" class="form-control" name="productionBatchNameEdit" id="productionBatchNameEdit" placeholder="">
                                <div id="help-block-productionBatchNameEdit" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="product_selected">Tên sản phẩm <span style="color: red">*</span></label>
                                <select name="product_selected_edit" id="product_selected_edit" style="height: 38px; width: 100%">
                                    <option value="" disabled selected>Chọn sản phẩm</option>
                                    @foreach($listAllProduct as $key => $data)
                                        <option value={{$data->id}}>{{$data->product_name}}</option>
                                    @endforeach
                                </select>
                                <div id="help-block-product-edit" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="productionBatchExpiredTimeEdit">Ngày hết hạn <span style="color: red">*</span></label>
                                <input type="text" class="form-control" value="{{ old("productionBatchExpiredTime") }}" name="productionBatchExpiredTimeEdit" placeholder="Ngày hết hạn *" id="reservationdateEdit"  data-target="#reservationdateEdit" data-toggle="datetimepicker"/>
                                <div id="help-block-expired-time-edit" style="color: red">
                                </div>
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

        <!--Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ url("/admin/production-batch/delete") }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id_production_batch" value="">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá danh mục này?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="border: none">
                            Một khi xoá thì bạn sẽ không thể phục hồi !
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ bỏ</button>
                            <button type="submit" class="btn btn-danger">Đồng ý</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("custom-js")
    <script>
        /**
         * Hidden alert
         */
        $(document).ready(function(){
            $('.alert-edit').fadeIn().delay(2000).fadeOut();
        });

        //Date picker
        $('#reservationdate').datetimepicker({
            format:'DD/MM/YYYY HH:mm:ss',
            minDate: getFormattedDate(new Date())
        });

        $('#reservationdateEdit').datetimepicker({
            format:'DD/MM/YYYY HH:mm:ss',
        });

        function getFormattedDate(date) {
            var day = date.getDate() + 1;
            var month = date.getMonth() + 1;
            var year = date.getFullYear().toString().slice(2);
            return month + '-' + day + '-' + year;
        }

        /**
         * Datatable
         */
        $(function () {
            $("#category").DataTable({
                paging: false,
                ordering: false,
                info: false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ lô sản xuất trên một trang",
                    "zeroRecords": "Không có lô sản xuất",
                    "info": "Hiển thị trang _PAGE_ trên _PAGES_",
                    "search": "Tìm kiếm:",
                    "infoEmpty": "",
                    "paginate": {
                        "next":       "Tiếp",
                        "previous":   "Trước"
                    },
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
            });
        });

        /**
         * Handle add new category
         */
        $(document).ready(function() {
            $(".handleSubmit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var productionBatchName = $("input[name='productionBatchName']").val();
                var productionBatchExpiredTime = $("input[name='productionBatchExpiredTime']").val();
                var product_selected = $("select[name='product_selected']").val();
                var blockErrProductionBatchName = document.getElementById("help-block-productionBatchName");
                var blockErrProduct = document.getElementById("help-block-product");
                var blockErrExpiredTime = document.getElementById("help-block-expired-time");

                if(!productionBatchName) {
                    blockErrProductionBatchName.innerHTML = "Không được bỏ trống";
                } else if(checkProductionBatchName(productionBatchName)) {
                    blockErrProductionBatchName.innerHTML = "Tên lô sản xuất đã được sử dụng";
                } else {
                    blockErrProductionBatchName.innerHTML = "";
                }

                if(!productionBatchExpiredTime) {
                    blockErrExpiredTime.innerHTML = "Không được bỏ trống";
                } else {
                    blockErrExpiredTime.innerHTML = "";
                }

                if(!product_selected) {
                    blockErrProduct.innerHTML = "Không được bỏ trống";
                } else {
                    blockErrProduct.innerHTML = "";
                }

                if(!blockErrExpiredTime.innerHTML && !blockErrProduct.innerHTML && !blockErrProductionBatchName.innerHTML) {
                    $.ajax({
                        url: "/admin/production-batch/add",
                        type: 'POST',
                        data: {_token: _token, product_id: product_selected, production_batch_name: productionBatchName, expired_time: productionBatchExpiredTime},
                        success: function (response) {
                            blockErrProduct.innerHTML = "";
                            blockErrExpiredTime.innerHTML = "";
                            blockErrProductionBatchName.innerHTML = "";
                            var alertDiv = document.getElementById("notification");
                            alertDiv.classList.remove("hidden");
                            alertDiv.innerHTML += response["message"];
                            setTimeout(function () {
                                location.reload();
                            }, 300);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

        /**
         * Edit category modal
         * @param id
         */
        function editForm(id, batch_name, product_id, expired)
        {
            $("#id_production_batch_edit").val(id);
            $("#productionBatchNameEdit").val(batch_name);
            $("#currentProductionBatchName").val(batch_name);
            $("#reservationdateEdit").val(expired);
            document.getElementById('product_selected_edit').value = product_id;
        }

        /**
         * Handle edit category
         */
        $(document).ready(function() {
            $(".handleEdit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var id = $("input[name='id_production_batch_edit']").val();
                var productionBatchNameEdit = $("input[name='productionBatchNameEdit']").val();
                var currentProductionBatchName = $("input[name='currentProductionBatchName']").val();
                var productionBatchExpiredTimeEdit = $("input[name='productionBatchExpiredTimeEdit']").val();
                var product_selected_edit = $("select[name='product_selected_edit']").val();
                var blockErrProductionBatchNameEdit = document.getElementById("help-block-productionBatchNameEdit");
                var blockErrExpiredTimeEdit = document.getElementById("help-block-expired-time-edit");

                if(!productionBatchNameEdit) {
                    blockErrProductionBatchNameEdit.innerHTML = "Không được bỏ trống";
                } else if(checkProductionBatchName(productionBatchNameEdit) && productionBatchNameEdit != currentProductionBatchName) {
                    blockErrProductionBatchNameEdit.innerHTML = "Mã đơn hàng đã được sử dụng";
                } else {
                    blockErrProductionBatchNameEdit.innerHTML = "";
                }
                if(!productionBatchExpiredTimeEdit) {
                    blockErrExpiredTimeEdit.innerHTML = "Không được bỏ trống";
                } else {
                    blockErrExpiredTimeEdit.innerHTML = "";
                }

                if(!blockErrProductionBatchNameEdit.innerHTML && !blockErrExpiredTimeEdit.innerHTML) {
                    $.ajax({
                        url: "/admin/production-batch/edit",
                        type:'POST',
                        data: {_token: _token, id:id, product_id: product_selected_edit, production_batch_name: productionBatchNameEdit, expired_time: productionBatchExpiredTimeEdit},
                        success: function(response) {
                            blockErrExpiredTimeEdit.innerHTML = "";
                            blockErrProductionBatchNameEdit.innerHTML = "";
                            var alertDiv = document.getElementById("notificationEdit");
                            alertDiv.classList.remove("hidden");
                            alertDiv.innerHTML += response["message"];
                            setTimeout(function(){
                                location.reload();
                            }, 300);
                        },
                        error: function (err) {
                            console.log(err);
                        }
                    });
                }
            });
        });

        /**
         * Confirm delete category
         * @param id
         */
        function confirmDelete(id) {
            $("#id_production_batch").val(id);
            $("#deleteModal").modal("show");
        }

        var listProductionBatchName = {!! $listProductionBatchName !!};
        const checkProductionBatchName = (name) => {
            return listProductionBatchName.indexOf(name) !== -1;
        }
    </script>
@endsection
