<style>
    .body {
        padding: 20px 10px;
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
    .supplier-edit {
        font-size: 12px;
        margin-left: 8px;
    }
    .supplier-view {
        font-size: 12px;
        margin-left: 10px;
        cursor: pointer;
        color: green;
    }
    .supplier-view:hover {
        color: green;
    }
    .supplier-delete {
        font-size: 12px;
        margin-left: 8px;
        color: red;
    }
    .supplier-delete:hover {
        color: red;
        cursor: pointer;
    }
    .alert {
        padding: 0.5rem 1.25rem !important;
        margin-left: 15px;
    }
    .add-button {
        text-align: end;
        margin-bottom: 20px;
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
                        <h4 class="m-0">Danh sách nhà cung cấp</h4>
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
                <div class="col-md-12 add-button">
                    <a href="/admin/suppliers/add-supplier" class="btn btn-raised g-bg-cyan">Thêm nhà cung cấp</a>
                </div>
                <div class="row clearfix margin-bottom-20">
                    @foreach($supplier as $key => $data)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="body">
                                    <div class="row">
{{--                                        <div class="col-sm-3">--}}
{{--                                            <a href="" class="">--}}
{{--                                                <img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
                                        <div class="col-sm-1">
                                        </div>
                                        <div class="col-sm-11">
                                            <h5 class="font-weight-bold">{{$data->name}}
{{--                                                <a class="supplier-view" href="/admin/suppliers/{{$data->id}}/detail">--}}
{{--                                                    <i class="fas fa-eye"></i>--}}
{{--                                                </a>--}}
{{--                                                <a class="supplier-edit" href="/admin/suppliers/{{$data->id}}/edit">--}}
{{--                                                    <i class="fas fa-pen"></i>--}}
{{--                                                </a>--}}
{{--                                                <a class="supplier-delete" onclick="confirmDelete({{$data->id}})">--}}
{{--                                                    <i class="fas fa-trash"></i>--}}
{{--                                                </a>--}}
                                            </h5>
                                            <div>
                                                <i class="fad fab fas fa fa-search-location" style="margin-right: 5px"></i>
                                                {{$data->address}}
                                            </div>
                                            <div>
                                                <i class="fad fab fas fa fa-phone" style="margin-right: 5px"></i>
                                                {{$data->phone}}
                                            </div>
                                            <div class="row clearfix" style="margin-top: 12px">
                                                <button class="btn btn-sm btn-secondary" style="margin-right: 6px">
                                                    <a href="/admin/suppliers/{{$data->id}}/detail" style="color: white">
                                                        Chi tiết
                                                    </a>
                                                </button>
                                                <button class="btn btn-sm btn-primary" style="margin-right: 6px">
                                                    <a href="/admin/suppliers/{{$data->id}}/edit" style="color: white">
                                                        Chỉnh sửa
                                                    </a>
                                                </button>
                                                <button class="btn btn-sm btn-danger" onclick="confirmDelete({{$data->id}})">Xoá bỏ</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end" style="margin-right: 3%">
                    {!! $supplier->appends($_GET)->links("pagination::bootstrap-4") !!}
                </div>
            </div><!-- /.container-fluid -->
            {{--delete modal--}}
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ url("/admin/suppliers/delete") }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" id="id_supplier" value="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá nhà cung cấp này?</h5>
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
        </section>
        <!-- /.content -->
    </div>
@endsection

@section("custom-js")
    <script>
        /**
         * Hidden alert
         */
        $(document).ready(function(){
            $('.alert').fadeIn().delay(1000).fadeOut();
        });

        /**
         * Confirm delete user
         * @param id
         */
        function confirmDelete(id) {
            $("#id_supplier").val(id);
            $("#deleteModal").modal("show");
        }
    </script>
@endsection
