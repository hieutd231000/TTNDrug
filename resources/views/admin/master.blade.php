<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield("title") </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset("admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/jqvmap/jqvmap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/plugins/custom-slider/swiper-bundle.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("admin/dist/css/adminlte.min.css") }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/daterangepicker/daterangepicker.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/summernote/summernote-bs4.min.css") }}">
    {{--    customcss--}}
    <link rel="stylesheet" href="{{ asset("admin/css/custom.css") }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/fullcalendar/main.css") }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
</head>
<style>
    .content-wrapper {
        height: auto !important;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    @include("admin.layout.header")
    <!-- Navbar -->
    @include("admin.layout.navbar")
    <!-- /.navbar -->
    @yield("content")
    <!-- Main Sidebar Container -->
    @include("admin.layout.sidebar")
    <!-- Content Wrapper. Contains page content -->
    <!-- /.content-wrapper -->
    @include("admin.layout.footer")
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset("admin/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- ChartJS -->
<script src="{{ asset("admin/plugins/chart.js/Chart.min.js") }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset("admin/plugins/sparklines/sparkline.js") }}"></script>
<!-- JQVMap -->
<script src="{{ asset("admin/plugins/jqvmap/jquery.vmap.min.js") }}"></script>
<script src="{{ asset("admin/plugins/custom-slider/swiper-bundle.min.js") }}"></script>
<script src="{{ asset("admin/plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset("admin/plugins/jquery-knob/jquery.knob.min.js") }}"></script>
<!-- daterangepicker -->
<script src="{{ asset("admin/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("admin/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<!-- Summernote -->
<script src="{{ asset("admin/plugins/summernote/summernote-bs4.min.js") }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("admin/dist/js/adminlte.js") }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset("admin/dist/js/pages/dashboard.js") }}"></script>
<script src="{{ asset("admin/ckeditor/ckeditor.js") }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset("admin/plugins/datatables/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.jss") }}"></script>
<script src="{{ asset("admin/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
<script src="{{ asset("admin/plugins/jszip/jszip.min.js") }}"></script>
<script src="{{ asset("admin/plugins/pdfmake/pdfmake.min.js") }}"></script>
<script src="{{ asset("admin/plugins/pdfmake/vfs_fonts.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
<script src="{{ asset("admin/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>
<script src="{{ asset("admin/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("admin/plugins/fullcalendar/main.js") }}"></script>
<script src="{{ asset("admin/plugins/summernote/summernote-bs4.min.js") }}"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>--}}
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
{{--pusher--}}
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    $(document).ready(function (){
        //Thong bao pusher (dat hang)
        var pusher = new Pusher('88177615218eba838363', {
            cluster: 'ap1'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            //Add amount
            var notificationsWrapper = $('.dropdownNotifi');
            //Lay so luong tat ca thong bao va so luong thong bao chua doc
            var notificationsAllCountElem = $('.countAllNotification');
            var notificationsUnCountElem = $('.countUnNotification');
            var notificationsCountAll = parseInt(notificationsAllCountElem.html());
            var notificationsCountUn = parseInt(notificationsUnCountElem.html());
            // if (notificationsCountAll <= 0) {
            //     notificationsWrapper.hide();
            // }
            notificationsAllCountElem.html(notificationsCountAll + 1);
            notificationsUnCountElem.html(notificationsCountUn + 1);

            //Add content
            var notificationsContent = $('.dropdown-content');
            var existingNotifications = notificationsContent.html();
            var newNotificationHtml = `
                <div class="dropdown-divider"></div>
                <a href="/read-notification/`+data.notification_id+`" class="dropdown-item">
                    <div class="row">
                        <div class="col-11 col-md-11 col-lg-11 col-sm-11">
                            <p>`+data.notification_content+`</p>
                            <p class="text-muted text-sm">Khoảng 1 phút trước</p>
                        </div>
                        <div class="col-1 col-md-1 col-lg-1 col-sm-1" id="`+data.notification_id+`" style="display: flex; align-items: center;">
                            <div style="background: hsl(214, 100%, 59%);
                              border-radius: 50%;
                              height: 12px;
                              width: 12px;">
                            </div>
                        </div>
                    </div>
                </a>
            `;
            notificationsContent.html(newNotificationHtml + existingNotifications);
        });

        //Thong bao pusher (doc thong bao)
        var readChannel = pusher.subscribe('my-read-channel');
        readChannel.bind('my-read-event', function(data) {
            //Danh dau da doc
            var circle = {};
            var notificationsContent = document.getElementById(data.read_user_email).getElementsByTagName("*");
            console.log(notificationsContent);
            for (var i = 0; i < notificationsContent.length; i++) {
                if (notificationsContent[i].classList.contains("countUnNotification")) {
                    console.log("finded");
                    console.log(parseInt(notificationsContent[i].innerText));
                    notificationsContent[i].innerText = parseInt(notificationsContent[i].innerText) - 1;
                }
                if (notificationsContent[i].id === data.notification_id) {
                    console.log("find circle");
                    var newCircleHtml = `<div style="background: hsl(214, 100%, 59%);
                                                      border-radius: 50%;
                                                      height: 12px;
                                                      width: 12px;
                                                      display: none">
                                                    </div>`;
                    notificationsContent[i].innerHTML = newCircleHtml;
                }
            }
            // var existingNotifications = notificationsContent.html();
        });
    })
</script>

@yield("custom-js")
</body>
</html>
