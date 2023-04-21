<style>
    .brand-link {
        color: #ffffff !important;
        text-align: center;
    }
    .info {
        color: #ffffff;
        padding: 0 !important;
        margin-left: 20px !important;
    }
    .elevation-2 {
        width: 4.1rem !important;
    }
    .info-welcome {
        font-size: 14px;
    }
    .image {
        padding: .45rem 0 0 .3rem !important;
    }
    .fa-style {
        cursor: pointer;
        width: 2rem;
    }
    .margin-0 {
        margin: 0 !important;
    }
    .color-white {
        color: white !important;
    }
    .quick-start {
        color: #ffffff;
        margin-left: 5px;
    }
    .quick-start>ul {
        list-style: outside none none;
        padding: 0 !important;
    }
    .quick-start>ul>li {
        width: 32.5%;
        float: left;
    }
    .quick-start>ul>li:not(:last-child) {
        margin-right: 1.5px;
    }
    .quick-start-block {
        text-align: center;
        border-radius: 2px;
        color: #424242;
        font-size: 14px;
        background: #ffffff none repeat scroll 0 0;
    }
    .quick-start-block>span {
        display: block;
        font-weight: 700;
        font-size: 18px;
        padding: 2px 5px;
    }
    .font-size-11 {
        font-size: 11px !important;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        {{--        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <h4 class="brand-text margin-0 color-white">TTN DRUG</h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 d-flex border-0">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="info-welcome">Xin chào</span>
                <h5>Mr. Hiếu</h5>
                <div>
                    {{-- <a href="/admin/users/mailbox"><i class="fas fa-envelope fa-style"></i></a> --}}
                    <a href="/admin/users/user-profile"><i class="fas fa-user fa-style"></i></a>
                    <a href="/admin/login"><i class="fas fa-arrow-circle-right fa-style"></i></a>
                </div>
            </div>
        </div>
        {{-- <div class="user-panel pb-3 mb-3">
            <div class="quick-start">
                <h5>Thống kê</h5>
                <ul>
                    <li class="quick-start-block">
                        <span>16</span>
                        Bệnh nhân
                    </li>
                    <li class="quick-start-block">
                        <span>20</span>
                        Lịch khám
                    </li>
                    <li class="quick-start-block">
                        <span>5</span>
                        Tư vấn
                    </li>
                </ul>
            </div>
        </div> --}}
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Biểu đồ
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/categories" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Danh mục
                            <i class="fas right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/units" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Đơn vị
                            <i class="fas right"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Medicines
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/doctors/doctor-calendar" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Lịch làm việc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/appointments/add-appointment" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Đặt lịch hẹn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Inventory
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/doctors/doctor-calendar" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Lịch làm việc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/appointments/add-appointment" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Đặt lịch hẹn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-columns"></i>
                        <p>
                            Sale
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/doctors/doctor-calendar" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Lịch làm việc</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/appointments/add-appointment" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Đặt lịch hẹn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/users" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Danh sách nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/users/add-user" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Thêm nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/users/user-profile" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Hồ sơ nhân viên</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Nhà cung cấp
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/suppliers" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Danh sách nhà cung cấp</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/suppliers/add-supplier" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Thêm nhà cung cấp</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bill
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/payments" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Danh sách hóa đơn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/payments/add-payment" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Thêm hóa đơn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/payments/patient-invoice" class="nav-link">
                                <i class="fas fa-plus nav-icon font-size-11"></i>
                                <p>Hóa đơn bệnh nhân</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Reports
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
