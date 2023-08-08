@extends("admin.master")
{{--<!-- Navbar -->--}}
{{--@include("admin.layout.navbar")--}}
@section("title", "Dashboard")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Thống kê</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$countCurrentAdmin}}</h3>

                                <p>Quản trị viên</p>
                            </div>
                            <div class="icon">
                                <i style="font-size: 50px; margin-top: 10px;" class="fas fa-unlock"></i>
                            </div>
                            <a href="/admin/users" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$countCurrentUser}}</h3>

                                <p>Nhân viên</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="/admin/users" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$countCurrentSupplier}}</h3>

                                <p>Nhà cung cấp</p>
                            </div>
                            <div class="icon">
                                    <i style="font-size: 50px; margin-top: 10px;" class="fas fa-truck"></i>
                            </div>
                            <a href="/admin/suppliers" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$countCurrentCategory}}</h3>

                                <p>Danh mục dược</p>
                            </div>
                            <div class="icon">
                                    <i style="font-size: 50px; margin-top: 10px;" class="fas fa-box"></i>
                            </div>
                            <a href="/admin/categories" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <!-- USERS LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Người dùng mới nhất
                                    &nbsp;
                                    <span class="badge badge-warning">{{count($getLatestUser)}} người</span>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="users-list clearfix">
                                    @foreach($getLatestUser as $key => $data)
                                        <li style="width: 33% !important;">
                                            <a href="/admin/users/{{$data->id}}/edit">
                                                @if(!$data->avatar)
                                                    <img style="width: 70px; height: 70px; border-radius: 50% !important" src="https://thememakker.com/templates/swift/hospital/assets/images/random-avatar7.jpg">
                                                @else
                                                    <img style="width: 70px; height: 70px; border-radius: 50% !important" src="{{ URL::asset('image/avatars' . '/'. $data->avatar)}}" alt="User Image">
                                                @endif
                                            </a>
                                            <a class="users-list-name" href="/admin/users/{{$data->id}}/edit">{{$data->fullname}}</a>
                                            <span class="users-list-date">{{$data->countDayCreate}} ngày trước</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="/admin/users">Thông tin chi tiết</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                        <!-- SUPPLIER LIST -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Nhà cung cấp mới nhất
                                    &nbsp;
                                    <span class="badge badge-info">{{count($getLatestSupplier)}} đơn vị</span>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    @foreach($getLatestSupplier as $key => $data)
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="card" style="margin: 7px">
                                                    <div class="col-lg-11 col-md-11 col-sm-11" style="margin: 10px">
                                                        <a href="/admin/suppliers/{{$data -> id}}/detail" class="font-weight-bold">{{$data -> name}}
                                                        </a>
                                                        <div style="margin-top: 3px">
                                                            <i class="fad fab fas fa fa-search-location" style="margin-right: 5px"></i>
                                                            {{$data->address}}
                                                        </div>
                                                        <div style="margin-top: 3px">
                                                            <i class="far fa-envelope" style="margin-right: 5px"></i>
                                                            {{$data -> email}}
                                                        </div>
                                                        <div style="margin-top: 3px">
                                                            <i class="fad fab fas fa fa-phone" style="margin-right: 5px"></i>
                                                            {{$data -> phone}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="/admin/users">Thông tin chi tiết</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!--/.card -->
                    </div>
                </div>
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <!-- LINE CHART -->
                        <div class="card">
                            <div class="card-body" style="height: 425px !important;">
                                <div style="text-align: end">Năm:
                                    <select name="select_year" id="select_year" style="padding: 2px">
                                        <option value="2023" selected>2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                    </select>
                                </div>
                                <div class="chart">
                                    <canvas id="lineChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-9 connectedSortable">
                        <!-- BAR CHART -->
                        <div class="card">
                            <div class="card-body" style="height: 400px !important;">
                                <div style="text-align: end; margin-bottom: 5px">Năm:
                                    <select name="select_year1" id="select_year1" style="padding: 2px">
                                        <option value="2023" selected>2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                    </select>
                                </div>
                                <div class="chart">
                                    <canvas
                                        id="barChart"
                                        style="min-height: 285px; height: 285px; max-height: 285px; max-width: 100%;"
                                    ></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <section class="col-lg-3 connectedSortable">
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="fas fa-folder"></i></span>

                            <div class="info-box-content" style="padding: 0 0 0 5px">
                                <span class="info-box-text">Lô sản xuất</span>
                                <span class="info-box-number">{{$countCurrentProductionBatch}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                            <div class="info-box-content" style="padding: 0 0 0 5px">
                                <span class="info-box-text" style="line-height: 23px">Lô sản xuất sắp <br>
                                    <span>quá hạn</span>
                                </span>
                                <span class="info-box-number">{{$countCurrentExpiredProduct}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <!-- Info Boxes Style 2 -->
                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fas fa-capsules"></i></span>

                            <div class="info-box-content" style="padding: 0 0 0 5px">
                                <span class="info-box-text">Số lượng thuốc</span>
                                <span class="info-box-number">{{$countCurrentProduct}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="fas fa-cloud-upload-alt"></i></span>

                            <div class="info-box-content" style="padding: 0 0 0 5px">
                                <span class="info-box-text" style="line-height: 23px">Số thuốc sắp hết <br>
                                    <span>tồn kho</span>
                                </span>
                                <span class="info-box-number">{{$countCurrentOutOfProduct}}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section("custom-js")
    <script>
        $(function () {
            var thkUsers = @json($thkUser);
            var thkAdmin = @json($thkAdmin);
            var thkSupplier = @json($thkSupplier);
            var areaChartData = {
                labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label               : 'Quản trị viên',
                        backgroundColor     : '#dc3545',
                        borderColor         : '#dc3545',
                        pointRadius          : true,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkAdmin[0]["countUserByTime"]
                    },
                    {
                        label               : 'Nhân viên',
                        backgroundColor     : '#ffc107',
                        borderColor         : '#ffc107',
                        pointRadius          : true,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkUsers[0]["countUserByTime"]
                    },
                    {
                        label               : 'Nhà cung cấp',
                        backgroundColor     : '#17a2b8',
                        borderColor         : '#17a2b8',
                        pointRadius          : true,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkSupplier[0]["countUserByTime"]
                    },
                ]
            }
            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: true,
                    // position: 'top',
                },
                scales: {
                    xAxes: [{
                        gridLines : {
                            display : true,
                        }
                    }],
                    yAxes: [{
                        gridLines : {
                            display : true,
                        }
                    }]
                },
                title: {
                    display: true,
                    text: 'Thống kê số lượng nhân lực mới',
                }
            }
            //-------------
            //- LINE CHART -
            //--------------
            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartData.datasets[1].fill = false;
            lineChartData.datasets[2].fill = false;
            lineChartOptions.datasetFill = false
            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })
            $('#select_year').change(function(){
                for(let i = 0; i < thkUsers.length; i++) {
                    if(thkUsers[i]["currentYear"] === $(this).val()) {
                        lineChart.data.datasets[0].data = thkAdmin[i]["countUserByTime"];
                        lineChart.data.datasets[1].data = thkUsers[i]["countUserByTime"];
                        lineChart.data.datasets[2].data = thkSupplier[i]["countUserByTime"];
                        lineChart.update()
                        break;
                    }
                }
            })

            //-------------
            //- BAR CHART -
            //-------------
            var thkProduct = @json($thkProduct);
            var thkProductionBatch = @json($thkProductionBatch);
            var thkProductionExBatch = @json($thkProductionExBatch);
            var areaChartData1 = {
                labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label               : 'Thuốc',
                        backgroundColor     : '#ffc107',
                        borderColor         : '#ffc107',
                        pointRadius          : true,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkProduct[0]["countProductByTime"]
                    },
                    {
                        label               : 'Lô sản xuất',
                        backgroundColor     : '#28a745',
                        borderColor         : '#28a745',
                        pointRadius          : true,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkProductionBatch[0]["countProductionBatchByTime"]
                    },
                    {
                        label               : 'Lô sản xuất sắp hết hạn',
                        backgroundColor     : '#dc3545',
                        borderColor         : '#dc3545',
                        pointRadius          : true,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkProductionExBatch[0]["countProductionBatchByTime"]
                    }
                ]
            }

            var barChartCanvas = $("#barChart").get(0).getContext("2d");
            var barChartData = $.extend(true, {}, areaChartData1);
            var temp0 = areaChartData1.datasets[0];
            var temp1 = areaChartData1.datasets[1];
            var temp2 = areaChartData1.datasets[2];
            barChartData.datasets[0] = temp0;
            barChartData.datasets[1] = temp1;
            barChartData.datasets[2] = temp2;

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false,
                title: {
                    display: true,
                    text: 'Thống kê số lượng thuốc mới',
                }
            };

            new Chart(barChartCanvas, {
                type: "bar",
                data: barChartData,
                options: barChartOptions,
            });
            $('#select_year1').change(function(){
                for(let i = 0; i < thkProduct.length; i++) {
                    if(thkProduct[i]["currentYear"] === $(this).val()) {
                        areaChartData1 = {
                            labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                            datasets: [
                                {
                                    label               : 'Thuốc',
                                    backgroundColor     : '#ffc107',
                                    borderColor         : '#ffc107',
                                    pointRadius          : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : thkProduct[i]["countProductByTime"]
                                },
                                {
                                    label               : 'Lô sản xuất',
                                    backgroundColor     : '#28a745',
                                    borderColor         : '#28a745',
                                    pointRadius          : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : thkProductionBatch[i]["countProductionBatchByTime"]
                                },
                                {
                                    label               : 'Lô sản xuất sẽ hết hạn',
                                    backgroundColor     : '#dc3545',
                                    borderColor         : '#dc3545',
                                    pointRadius          : true,
                                    pointColor          : '#3b8bba',
                                    pointStrokeColor    : 'rgba(60,141,188,1)',
                                    pointHighlightFill  : '#fff',
                                    pointHighlightStroke: 'rgba(60,141,188,1)',
                                    data                : thkProductionExBatch[i]["countProductionBatchByTime"]
                                }
                            ]
                        }
                        //-------------
                        //- LINE CHART SELECT YEAR-
                        //--------------
                        var barChartCanvas = $("#barChart").get(0).getContext("2d");
                        var barChartData = $.extend(true, {}, areaChartData1);
                        var temp0 = areaChartData1.datasets[0];
                        var temp1 = areaChartData1.datasets[1];
                        var temp2 = areaChartData1.datasets[2];
                        barChartData.datasets[0] = temp0;
                        barChartData.datasets[1] = temp1;
                        barChartData.datasets[2] = temp2;

                        new Chart(barChartCanvas, {
                            type: "bar",
                            data: barChartData,
                            options: barChartOptions,
                        });
                        break;
                    }
                }
            })

        });
    </script>
@endsection
