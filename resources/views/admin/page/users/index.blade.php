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
    .m-b-0 {
        margin-bottom: 0px !important;
    }
    .m-b-20 {
        margin-bottom: 20px !important;
    }
    .alert {
        padding: .5rem 1.25rem !important;
    }
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header" style="padding-bottom: 0px">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Danh sách nhân viên</h3>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12 m-b-20" style="text-align: end">
                        <a href="/admin/users/add-user" class="btn btn-primary">Thêm nhân viên</a>
                    </div>
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
                <div class="row clearfix margin-bottom-20">
                    @foreach($users as $key => $data)
                        @if($data->role != 2)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="body">
                                    <div class="member-card verified">
                                        <div class="thumb-xl member-thumb">
                                            @if(!$data->avatar)
                                                <img src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg" class="img-thumbnail rounded-circle" alt="profile-image">
                                            @else
                                                <img class="img-thumbnail rounded-circle" alt="profile-image" style="width: 120px; height: 120px" src="{{ URL::asset('image/avatars' . '/'. $data->avatar)}}">
                                            @endif
                                        </div>
                                        <div class="">
                                            <h4 class="m-t-20 m-b-0">{{$data->firstname}} {{$data->lastname}}</h4>
                                            @if($data->yearBirth)
                                                <p class="m-b-0">Tuổi: {{2023 - $data->yearBirth }}</p>
                                            @endif
                                            <a href="javascript:void(0);" class="text-link">{{$data->email}}</a>
                                        </div>
                                        <p class="text-muted">{{$data->phone}}</p>
                                        <a href="/admin/users/{{$data->id}}/edit" class="btn btn-secondary btn-sm">Chỉnh sửa</a>
                                        <button class="btn btn-danger btn-sm" onclick="confirmDelete( {{ $data->id }} )" data-toggle="modal" data-target="#deleteModal">Xoá</button>
{{--                                        <ul class="social-links list-inline m-t-10">--}}
{{--                                            <li><a title="facebook" href="javascript:void(0);"><i class="fab fa-facebook"></i></a></li>--}}
{{--                                            <li><a title="twitter" href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>--}}
{{--                                            <li><a title="instagram" href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>--}}
{{--                                        </ul>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="d-flex justify-content-end" style="margin-right: 3%">
                    {!! $users->appends($_GET)->links("pagination::bootstrap-4") !!}
                </div>
                <!--Delete Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form action="{{ url("/admin/users/delete") }}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" id="id_user" value="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn xoá nhân viên này?</h5>
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
            </div><!-- /.container-fluid -->
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
            $("#id_user").val(id);
            $("#deleteModal").modal("show");
        }
    </script>
@endsection
