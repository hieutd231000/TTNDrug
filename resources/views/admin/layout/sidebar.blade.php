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
                @if(!auth()->user()->avatar)
                    <img src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg">
                @else
                    <img style="width: 66px; height: 66px; border-radius: 50% !important" src="{{ URL::asset('image/avatars' . '/'. auth()->user()->avatar)}}">
                @endif
            </div>
            <div class="info">
                <span class="info-welcome">Xin chào</span>
                @if (auth()->user()->gender == 0)
                    <h5>Mr.{{auth()->user()->lastname}}</h5>
                @elseif (auth()->user()->gender == 1)
                    <h5>Ms.{{auth()->user()->lastname}}</h5>
                @endif
                <div>
                    {{-- <a href="/admin/users/mailbox"><i class="fas fa-envelope fa-style"></i></a> --}}
                    <a href="/user-profile"><i class="fas fa-user fa-style"></i></a>
                    <a href="/logout"><i class="fas fa-arrow-circle-right fa-style"></i></a>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Người dùng</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-md"></i>
                            <p>
                                Đặt hàng
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/orders/{{0}}/product" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Đặt sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/list-orders" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Danh sách đơn hàng</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/pos" class="nav-link">
                            <i class="nav-icon fas fa-puzzle-piece"></i>
                            <p>
                                PoS
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/user-profile" class="nav-link">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Thông tin cá nhân
                            </p>
                        </a>
                    </li>
                @if(Auth::user()->role)
                    <li class="nav-header">Báo cáo</li>
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Thống kê
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-chart-bar"></i>
                            <p>
                                Prediction Report
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/sale-report" class="nav-link">
                            <i class="nav-icon fas fa-chart-line"></i>
                            <p>
                                Báo cáo doanh số
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">Quản lý</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Sản phẩm
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/products" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Danh sách sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/products/add-product" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Thêm sản phẩm mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/products/{{0}}/price-product" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Giá sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/categories" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>
                                        Danh mục
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/production-batch" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Lô sản xuất</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Kho hàng
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/inventories" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Danh sách sản phẩm</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/inventories/out-of-stock" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Sản phẩm hết hàng</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/inventories/list-expired" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Sản phẩm hết hạn</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Nhân viên
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
                        </ul>
                    </li>
                    <li class="nav-item has-treeview" style="margin-bottom: 20px">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
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
                            <li class="nav-item">
                                <a href="/admin/suppliers/{{0}}/detail" class="nav-link">
                                    <i class="fas fa-plus nav-icon font-size-11"></i>
                                    <p>Thông tin nhà cung cấp</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</aside>

<script>
    /** add active class and stay opened when selected */
    var url = window.location;
    const allLinks = document.querySelectorAll('.nav-item a');
    const currentLink = [...allLinks].filter(e => {
        return e.href == url;
    });

    console.log(currentLink);
    if (currentLink.length > 0) { //this filter because some links are not from menu
        currentLink[0].classList.add("active");
        if(currentLink[0].closest(".nav-treeview")) {
            currentLink[0].closest(".nav-treeview").style.display = "block";
            currentLink[0].closest(".has-treeview").firstElementChild.classList.add("active");
        }
    }
</script>
