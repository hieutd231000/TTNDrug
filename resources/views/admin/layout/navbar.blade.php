{{--<nav class="main-header navbar navbar-expand navbar-white navbar-light">--}}
{{--    <!-- Left navbar links -->--}}
{{--    <ul class="navbar-nav">--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
{{--        </li>--}}
{{--    </ul>--}}

{{--    <!-- Right navbar links -->--}}
{{--    <ul class="navbar-nav ml-auto">--}}
{{--        <!-- Navbar Search -->--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-widget="" href="{{url("/admin/login")}}" role="button">--}}
{{--                <i class="fas fa-sign-out-alt"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</nav>--}}
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="index3.html" class="nav-link">Home</a>--}}
{{--        </li>--}}
{{--        <li class="nav-item d-none d-sm-inline-block">--}}
{{--            <a href="#" class="nav-link">Contact</a>--}}
{{--        </li>--}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
{{--        <li class="nav-item dropdown">--}}
{{--            <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                <i class="far fa-comments"></i>--}}
{{--                <span class="badge badge-danger navbar-badge">3</span>--}}
{{--            </a>--}}
{{--            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <!-- Message Start -->--}}
{{--                    <div class="media">--}}
{{--                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
{{--                        <div class="media-body">--}}
{{--                            <h3 class="dropdown-item-title">--}}
{{--                                Brad Diesel--}}
{{--                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
{{--                            </h3>--}}
{{--                            <p class="text-sm">Call me whenever you can...</p>--}}
{{--                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Message End -->--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <!-- Message Start -->--}}
{{--                    <div class="media">--}}
{{--                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                        <div class="media-body">--}}
{{--                            <h3 class="dropdown-item-title">--}}
{{--                                John Pierce--}}
{{--                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
{{--                            </h3>--}}
{{--                            <p class="text-sm">I got your message bro</p>--}}
{{--                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Message End -->--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item">--}}
{{--                    <!-- Message Start -->--}}
{{--                    <div class="media">--}}
{{--                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
{{--                        <div class="media-body">--}}
{{--                            <h3 class="dropdown-item-title">--}}
{{--                                Nora Silvester--}}
{{--                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
{{--                            </h3>--}}
{{--                            <p class="text-sm">The subject goes here</p>--}}
{{--                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Message End -->--}}
{{--                </a>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
{{--            </div>--}}
{{--        </li>--}}
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown dropdownNotifi">
            @foreach($shareNotification as $key => $data)
                @if($data->user_id == auth()->user()->id)
                    <div id="{{$data->user_id}}">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge countUnNotification">
                                {{$data->unread}}
                            </span>
                        </a>
                        <div class="dropdown-menu not-body dropdown-menu-lg dropdown-menu-right" style="width: 330px !important; max-width: 330px !important; max-height: 500px !important; overflow-y: scroll">
                            <span class="dropdown-item dropdown-header" style="text-align: left">
                                Tất cả (<span class="countAllNotification">{{$data->countNotifi}}</span>)
                                &ensp;
                                Chưa đọc (<span class="countUnNotification">{{$data->unread}}</span>)
                            </span>
                            <div class="dropdown-content">
                                @foreach($data->listNotifications as $dem => $notifi)
                                    <div class="dropdown-divider"></div>
                                    <a href="/read-notification/{{$notifi->id}}" class="dropdown-item">
                                        <div class="row">
                                            <div class="col-11 col-md-11 col-lg-11 col-sm-11">
                                                <p>{{$notifi->notification}}</p>
                                                <p class="text-muted text-sm">Khoảng 30 phút trước</p>
                                            </div>
                                            <div class="col-1 col-md-1 col-lg-1 col-sm-1" id="{{$notifi->id}}" style="display: flex; align-items: center;">
                                                @if(!$notifi->is_read)
                                                    <div style="background: hsl(214, 100%, 59%);
                                                      border-radius: 50%;
                                                      height: 12px;
                                                      width: 12px;">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
    {{--                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="padding-right: 0px !important; padding-left: 8px !important;">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout"><i class="fas fa-arrow-circle-right" style="cursor: pointer"></i></a>
        </li>
    </ul>
</nav>
