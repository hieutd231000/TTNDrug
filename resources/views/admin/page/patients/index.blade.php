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
    .patient-edit {
        font-size: 12px;
        margin-left: 20px;
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
                        <h4 class="m-0">Danh sách bệnh nhân</h4>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row clearfix margin-bottom-20">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="" class="">
                                            <img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-weight-bold">Trần Thanh Nam
                                            <a class="patient-edit" href="">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </h5>
                                        <div>Mạo Khê, Quảng Ninh</div>
                                        <p>0981037368</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="" class="">
                                            <img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-weight-bold">Trần Thanh Nam
                                            <a class="patient-edit" href="">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </h5>
                                        <div>Mạo Khê, Quảng Ninh</div>
                                        <p>0981037368</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="" class="">
                                            <img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-weight-bold">Trần Thanh Nam
                                            <a class="patient-edit" href="">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </h5>
                                        <div>Mạo Khê, Quảng Ninh</div>
                                        <p>0981037368</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <a href="" class="">
                                            <img src="http://via.placeholder.com/130x130" alt="user" class="img-thumbnail">
                                        </a>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5 class="font-weight-bold">Trần Thanh Nam
                                            <a class="patient-edit" href="">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                        </h5>
                                        <div>Mạo Khê, Quảng Ninh</div>
                                        <p>0981037368</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-12 text-center">
                        <a href="/admin/patients/add-patient" class="btn btn-raised g-bg-cyan">Thêm bệnh nhân</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
