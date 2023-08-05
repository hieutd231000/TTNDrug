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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <h3>Danh mục dược</h3>
                    </div><!-- /.col -->
                    @if(auth()->user()->role)
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <a href="" class="btn btn-primary float-right mt-2" data-toggle="modal" data-target="#addModal">Thêm danh mục</a>
                        </div><!-- /.col -->
                    @endif
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
{{--                            <div class="card-header" style="border-bottom: none">--}}
{{--                                <form class="form-inline float-right">--}}
{{--                                    <div class="form-group mb-2">--}}
{{--                                        <input type="text" class="form-control" id="category_search" placeholder="Tìm kiếm">--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
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
                                        <th>Tên danh mục</th>
                                        <th>Mô tả</th>
                                        @if(auth()->user()->role)
                                            <th>Sửa/Xoá</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $key => $data)
                                            <tr>
                                                <td>{{ $rank++ }}</td>
                                                <td>{{$data->name}}</td>
                                                @if(!$data->description)
                                                    <td style="width: 50%;">Không có mô tả</td>
                                                @else
                                                    <td style="width: 50%;">{{$data->description}}</td>
                                                @endif
                                                @if(auth()->user()->role)
                                                    <td>
                                                        <a data-id="1" id="editBtn">
                                                            <button class="btn btn-primary" onclick="editForm({{ $data->id }}, '{{ $data->name }}', '{{ $data->description }}')" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
                                                        </a>
                                                        <a data-id="1" id="deleteBtn">
                                                            <button class="btn btn-danger" onclick="confirmDelete( {{ $data->id }} )" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="d-flex justify-content-end" style="margin-right: 3%">
                                {!! $category->appends($_GET)->links("pagination::bootstrap-4") !!}
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
                        <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hidden" id="notification">
                        </div>
                        <form>
{{--                        <form action="{{ url("admin/categories/add") }}" enctype="multipart/form-data" method="post">--}}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="categoryName">Tên danh mục <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="64" class="form-control" name="name" id="categoryName" placeholder="">
                                <div id="help-block" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="categoryDes">Mô tả </label>
                                <textarea class="form-control" style="resize: none" name="description" id="categoryDes" rows="3"></textarea>
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
                        <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success hidden" id="notificationEdit">
                        </div>
                        <form>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="idEdit" id="id_category_edit" value="">

                            <div class="form-group">
                                <label for="categoryEditName">Tên danh mục <span style="color: red">*</span></label>
                                <input type="text" minlength="1" maxlength="64" class="form-control" name="nameEdit" id="categoryEditName" placeholder="">
                                <div id="help-block-edit" style="color: red">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="categoryEditDes">Mô tả </label>
                                <textarea class="form-control" style="resize: none" name="descriptionEdit" id="categoryEditDes" rows="3"></textarea>
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
                <form action="{{ url("/admin/categories/delete") }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" id="id_category" value="">
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

        /**
         * Datatable
         */
        $(function () {
            $("#category").DataTable({
                paging: false,
                ordering: false,
                info: false,
                "language": {
                    "lengthMenu": "Hiển thị _MENU_ danh mục trên một trang",
                    "zeroRecords": "Không có danh mục",
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
                var name = $("input[name='name']").val();
                var description = $("textarea[name='description']").val();
                var blockErr = document.getElementById("help-block");

                $.ajax({
                    url: "/admin/categories/add",
                    type:'POST',
                    data: {_token:_token, name:name, description:description},
                    success: function(response) {
                        blockErr.innerHTML = "";
                        var alertDiv = document.getElementById("notification");
                        alertDiv.classList.remove("hidden");
                        alertDiv.innerHTML += response["message"];
                        setTimeout(function(){
                            location.reload();
                        }, 300);
                    },
                    error: function (err) {
                        console.log(err);
                        console.log(err["responseJSON"]["errors"]["name"][0]);
                        blockErr.innerHTML = err["responseJSON"]["errors"]["name"][0];
                    }
                });
            });
        });

        /**
         * Edit category modal
         * @param id
         */
        function editForm(id, name, des) {
            $("#id_category_edit").val(id);
            $("#categoryEditName").val(name);
            $("#categoryEditDes").val(des);
        }

        /**
         * Handle edit category
         */
        $(document).ready(function() {
            $(".handleEdit").click(function(e){
                e.preventDefault();
                var _token = $("input[name='_token']").val();
                var id = $("input[name='idEdit']").val();
                var name = $("input[name='nameEdit']").val();
                var description = $("textarea[name='descriptionEdit']").val();
                var blockErr = document.getElementById("help-block-edit");

                $.ajax({
                    url: "/admin/categories/edit",
                    type:'POST',
                    data: {_token:_token, id:id, name:name, description:description},
                    success: function(response) {
                        blockErr.innerHTML = "";
                        var alertDiv = document.getElementById("notificationEdit");
                        alertDiv.classList.remove("hidden");
                        alertDiv.innerHTML += response["message"];
                        setTimeout(function(){
                            location.reload();
                        }, 300);
                    },
                    error: function (err) {
                        console.log(err);
                        console.log(err["responseJSON"]["errors"]["name"][0]);
                        blockErr.innerHTML = err["responseJSON"]["errors"]["name"][0];
                    }
                });
            });
        });

        /**
         * Confirm delete category
         * @param id
         */
        function confirmDelete(id) {
            $("#id_category").val(id);
            $("#deleteModal").modal("show");
        }
    </script>
@endsection
