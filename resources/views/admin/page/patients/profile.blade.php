<style>
    .profile-image {
        padding: 50px 0px;
        text-align: center;
    }
    .profile-image>img {
        border-radius: 50%;
    }
    .profile-body {
        background: rgba(0,0,0,0) url("https://thememakker.com/templates/swift/hospital/assets/images/profile-bg.jpg") repeat scroll center center/cover;
    }
    .btn-message  {
        background: linear-gradient(60deg, #09b9ac, #7dd1c1) !important;
        color: #fff !important;
        cursor: pointer;
    }
    .m-t-10 {
        margin-top: 5px;
        margin-bottom: 3px;
    }
    .social-links>li {
        display: inline-block;
        margin: 0 5px;
    }
    .social-links>li>a {
        color: #ffffff !important;
    }
    .box-list>ul {
        padding: 0;
        display: inline-block;
        width: 100%;
        background-color: #f5f5f5;
    }
    .box-list>ul>li:first-child {
        border-left: 1px solid #e0e0e0;
    }
    .box-list>ul>li {
        float: left;
        border-right: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        list-style: none;
        width: 25%;
    }
    .box-list>ul>li:hover{
        background: linear-gradient(45deg, #49cdd0, #ab9ae5);
    }
    .box-list>ul>li:hover>a {
        color: #fff !important;
    }
    .box-list>ul>li>a {
        padding-top: 15px;
        display: block;
        color: #424242;
    }
    .card .header {
        padding: 20px 20px 0 20px;
    }
    .card .body {
        padding: 20px;
    }
    .list-skill {
        list-style: none;
        padding: 0;
    }
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }
    .nav-item {
        cursor: pointer;
    }
    .nav-tabs .nav-link {
        color: #9e9e9e !important;
    }
    .nav-tabs .nav-link.active {
        color: #495057 !important;
        border-color: #fff #fff #fff !important;
        border-bottom: 2px solid #ab9ae5 !important;
    }
    .tab-content {
        padding: 15px 0;
    }
    .no-resize {
        resize: none;
    }
    .form-group .form-line textarea {
        border: none !important;
        border-bottom: 1px solid #bdbdbd !important;
    }
    .form-group .form-line input {
        padding: 0 !important;
        border: none !important;
        border-bottom: 1px solid #bdbdbd !important;
    }
    .btn-custom {
        box-shadow: 0 2px 5px rgb(0 0 0 / 16%), 0 2px 10px rgb(0 0 0 / 12%);
    }
    .btn-white {
        padding: 8px !important;
    }
    .margin-bottom-15 {
        margin-bottom: 15px;
    }
    .margin-top-40 {
        margin-top: 40px;
    }
    .margin-bottom-10 {
        margin-bottom: 10px;
    }
    .hr {
        margin-top: 16px;
        margin-bottom: 16px;
        border: 0;
        border-top: 1px solid rgba(0,0,0,.1);
    }
    .padding-20 {
        padding: 20px;
    }
    .timeline-box {
        border-left: 1px solid #e0e0e0;
    }
    .timeline-content {
        margin-left: 30px;
        position: relative;
    }
    .timeline-content::after {
        border-radius: 50%;
        background-color: #fff;
        border-color: inherit;
        border-style: solid;
        border-width: 2px;
        content: "";
        height: 11px;
        left: -30px;
        margin-left: -6px;
        position: absolute;
        width: 11px;
        bottom: auto;
        clear: both;
        top: 7px;
    }
    .border-info {
        border-color: #17a2b8 !important;
    }
    .border-warning {
        border-color: #ffc107 !important;
    }
    .border-danger {
        border-color: #dc3545 !important;
    }
</style>

@extends("admin.master")
@section("content")
    <div class="content-wrapper"><!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <img src="https://via.placeholder.com/130x130" class="img-fluid" alt="">
                        </div>
                        <div class="card">
                            <div class="header">
                                <h4>Về bệnh nhân</h4>
                            </div>
                            <div class="body">
                                <strong>Tên</strong>
                                <p>Trần Thanh Nam</p>
                                <strong>Email</strong>
                                <p>dsa</p>
                                <strong>Số điện thoại</strong>
                                <p>0904559165</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="body">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#mypost" class="nav-link active" data-toggle="tab">Bài đăng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#timeline" class="nav-link" data-toggle="tab">Hoạt động</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#account" class="nav-link" data-toggle="tab">Tài khoản</a>
                                    </li>
                                </ul>
                                {{--tab-content--}}
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane in active" id="mypost">
                                        <div class="post-form margin-bottom-15">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <textarea rows="4" class="form-control no-resize" placeholder="Bạn đang nghĩ gì thế..."></textarea>
                                                </div>
                                            </div>
                                            <div class="post-toolbar-b">
                                                <a href="" tooltip="Add File" class="btn btn-custom btn-white btn-sm"><i class="fas fa-paperclip"></i></a>
                                                <a href="" tooltip="Add Image" class="btn btn-custom btn-white btn-sm"><i class="fas fa-camera"></i></a>
                                                <a href="" class="pull-right btn btn-custom btn-success btn-sm" tooltip="Post it!">
                                                    <span style="font-size: 15px">Đăng</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="post-list">
                                            <div class="box-post">
                                                <span class="text-muted text-small">
                                                    <i class="fas fa-clock"></i> 3 minutes ago
                                                </span>
                                                <div class="post-img margin-bottom-10">
                                                    <img src="https://via.placeholder.com/1000x400" class="img-fluid" alt="">
                                                </div>
                                                <div>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing</h4>
                                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                                                    <p>
                                                        <a href="" class="btn btn-info btn-sm">
                                                            <i class="fas fa-heart"></i> Thích (5)
                                                        </a>
                                                        <a href="" class="btn btn-custom btn-sm">
                                                            <i class="fas fa-comment"></i> Bình luận
                                                        </a>
                                                    </p>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="box-post">
                                                <span class="text-muted text-small">
                                                    <i class="fas fa-clock"></i> 3 minutes ago
                                                </span>
                                                <div class="post-img margin-bottom-10">
                                                    <img src="https://via.placeholder.com/1000x400" class="img-fluid" alt="">
                                                </div>
                                                <div>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing</h4>
                                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                                                    <p>
                                                        <a href="" class="btn btn-info btn-sm">
                                                            <i class="fas fa-heart"></i> Thích (5)
                                                        </a>
                                                        <a href="" class="btn btn-custom btn-sm">
                                                            <i class="fas fa-comment"></i> Bình luận
                                                        </a>
                                                    </p>
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="text-center">
                                                <a href="" class="btn btn-custom btn-white">Xem thêm …</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="timeline">
                                        <div class="timeline-box">
                                            <div class="timeline-content">
                                                <div>12:00</div>
                                                <p>Hoàn thành task 1</p>
                                            </div>
                                            <div class="timeline-content border-info">
                                                <div>12:00</div>
                                                <p>Hoàn thành task 1</p>
                                            </div>
                                            <div class="timeline-content border-warning">
                                                <div>12:00</div>
                                                <p>Hoàn thành task 1</p>
                                            </div>
                                            <div class="timeline-content border-danger">
                                                <div>12:00</div>
                                                <p>Hoàn thành task 1</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane padding-20" id="account">
                                        <h4>Đổi mật khẩu</h4>
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" placeholder="Mật khẩu hiện tại">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" placeholder="Mật khẩu mới">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                                                    </div>
                                                </div>
                                                <button class="btn btn-success btn-sm">Lưu thay đổi</button>
                                            </div>
                                        </div>
                                        <h4 class="margin-top-40">Thông tin cá nhân</h4>
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Họ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Tên">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea rows="4" style="padding: 0" class="form-control no-resize" placeholder="Địa chỉ"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" placeholder="Facebook">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button class="btn btn-success btn-sm">Lưu thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
