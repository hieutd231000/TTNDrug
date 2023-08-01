@extends("admin.master")
@section("title", "Sale")
@section("content")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Doanh số</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- solid sales graph -->
                        <div class="card bg-gradient-info">
                            <div class="card-header border-0">
                                <h3 class="card-title" style="font-size: 24px">
                                    Thống kê doanh thu
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- /.form group -->
                                <!-- Date range -->
                                <div class="form-group">
                                    <div class="input-group" style="width: 40%; margin-bottom: 10px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt" id="buttonChoseDateRange"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control float-right" id="reservation">
                                        <button class="btn btn-primary" id="filterDate">Chọn</button>
                                    </div>
                                </div>
                                <!-- /.form group -->
                                <p style="margin-left: 10px">(VNĐ)</p>
                                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            @if($rateRevenue > 0)
                                                <span class="description-percentage text-success" style="color: #07ff40 !important;"><i class="fas fa-caret-up"></i> {{$rateRevenue}}%</span>
                                            @elseif($rateRevenue < 0)
                                                <span class="description-percentage text-danger" style="color: #ff0018 !important;"><i class="fas fa-caret-down"></i> {{abs($rateRevenue)}}%</span>
                                            @else
                                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> {{$rateRevenue}}%</span>
                                            @endif
                                            <h5 class="description-header">{{$currentRevenue}} VNĐ</h5>
                                            <span class="description-text">Tổng doanh thu (năm)</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            @if($rateCost > 0)
                                                <span class="description-percentage text-success" style="color: #07ff40 !important;"><i class="fas fa-caret-up"></i> {{$rateCost}}%</span>
                                            @elseif($rateCost < 0)
                                                <span class="description-percentage text-danger" style="color: #ff0018 !important;"><i class="fas fa-caret-down"></i> {{abs($rateCost)}}%</span>
                                            @else
                                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> {{$rateCost}}%</span>
                                            @endif
                                                <h5 class="description-header">{{$currentCost}} VNĐ</h5>
                                            <span class="description-text">Tổng chi phí (năm)</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            @if($rateProfit > 0)
                                                <span class="description-percentage text-success" style="color: #07ff40 !important;"><i class="fas fa-caret-up"></i> {{$rateProfit}}%</span>
                                            @elseif($rateProfit < 0)
                                                <span class="description-percentage text-danger" style="color: #ff0018 !important;"><i class="fas fa-caret-down"></i> {{abs($rateProfit)}}%</span>
                                            @else
                                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> {{$rateProfit}}%</span>
                                            @endif
                                                <h5 class="description-header">{{$currentProfit}} VNĐ</h5>
                                            <span class="description-text">Tổng lợi nhuận (năm)</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-3 col-6">
                                        <div class="description-block">
                                            @if($rateGoal > 0)
                                                <span class="description-percentage text-success" style="color: #07ff40 !important;"><i class="fas fa-caret-up"></i> {{$rateGoal}}%</span>
                                            @elseif($rateGoal < 0)
                                                <span class="description-percentage text-danger" style="color: #ff0018 !important;"><i class="fas fa-caret-down"></i> {{abs($rateGoal)}}%</span>
                                            @else
                                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> {{$rateGoal}}%</span>
                                            @endif
                                            <h5 class="description-header">{{$goalCost}} VNĐ</h5>
                                            <span class="description-text">Mục tiêu lợi nhuận (năm)</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-9 connectedSortable">

                    </section>
                    <section class="col-lg-3 connectedSortable">

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
            var profitByDayIn10Year = @json($profitByDayIn10Year);
            var arrayDayIn10Year = @json($arrayDayIn10Year);
            console.log(profitByDayIn10Year);
            console.log(arrayDayIn10Year);

            // 7 ngay moi nhat
            const getLastest7profit = profitByDayIn10Year.slice(-7);
            const getLastest7day = arrayDayIn10Year.slice(-7);

            // Convert
            const convertDates = arrayDayIn10Year.map((date) =>
                new Date(date).setHours(0, 0, 0, 0)
            );

            var today = moment().format('DD/MM/YYYY');
            todayArr = today.split("/");
            var ago10Year = todayArr[0] + "/" + todayArr[1] + "/" + (parseInt(todayArr[2]) - 10);

            //Date range picker custom
            $('#buttonChoseDateRange').click(function(){
                $('#reservation').click();
            });

            $('#reservation').daterangepicker({
                startDate: moment().subtract('days', 31),
                endDate: moment(),
                minDate: ago10Year,
                maxDate: today,
                dateLimit: { days: 60 },
                showDropdowns: true,
                // showWeekNumbers: true,
                // timePicker: false,
                // timePickerIncrement: 1,
                // timePicker12Hour: true,
                ranges: {
                    'Tháng này': [moment().startOf('month'), today],
                    '7 ngày trước': [moment().subtract('days', 6), moment()],
                    '14 ngày trước': [moment().subtract('days', 13), moment()],
                    '1 Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
                    '2 Tháng trước': [moment().subtract('month', 2).startOf('month'), moment().subtract('month', 1).endOf('month')]
                },
                locale: {
                    format: 'DD/MM/YYYY',
                    applyLabel: "Chọn",
                    cancelLabel: "Huỷ",
                    customRangeLabel: "Tự điều chỉnh",
                    daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6','T7'],
                    monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                    firstDay: 1
                }
            });

            // Sales graph chart
            // $('#revenue-chart').get(0).getContext('2d');
            var salesGraphChartData = {
                // labels: ["arrayDayIn10Year"],
                labels: getLastest7day,
                datasets: [
                    {
                        data: getLastest7profit,
                        label: 'Doanh thu',
                        fill: false,
                        borderWidth: 2,
                        lineTension: 0,
                        spanGaps: true,
                        borderColor: '#efefef',
                        pointRadius: 3,
                        pointHoverRadius: 7,
                        pointColor: '#efefef',
                        pointBackgroundColor: '#efefef'
                    }
                ]
            }
            var salesGraphChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxis: {
                        type: 'time',
                    },
                    xAxes: [{
                        ticks: {
                            fontColor: '#efefef'
                        },
                        gridLines: {
                            display: false,
                            color: '#efefef',
                            drawBorder: false
                        },
                        type: 'time',
                        time: {
                            unit: "day",
                            parser: 'yyyy-MM-dd',
                            displayFormats: {
                                day: 'dd/MM/yyyy'
                            }
                        },
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 20000,
                            fontColor: '#efefef'
                        },
                        gridLines: {
                            display: true,
                            color: '#efefef',
                            drawBorder: false
                        }
                    }]
                }
            }
            var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d')
            var salesGraphChart = new Chart(salesGraphChartCanvas, { // lgtm[js/unused-local-variable]
                type: 'line',
                data: salesGraphChartData,
                options: salesGraphChartOptions
            })

            //Sale graph update
            $('#filterDate').click(function(){
                var startDate=  $("#reservation").data('daterangepicker').startDate.format('YYYY-MM-DD');
                var endDate=  $("#reservation").data('daterangepicker').endDate.format('YYYY-MM-DD');
                console.log(startDate);
                //Lay khoang
                const start1 = new Date(startDate);
                const start = start1.setHours(0, 0, 0, 0);
                const end1 = new Date(endDate);
                const end = end1.setHours(0, 0, 0, 0);
                //Filter
                const filterDate = convertDates.filter(
                    (date) => date >= start && date <= end
                );
                //Working data
                const startArr = convertDates.indexOf(filterDate[0]);
                const endArr = convertDates.indexOf(filterDate[filterDate.length-1]);
                const profitByDayIn10YearCopy = [...profitByDayIn10Year];
                const filterData = profitByDayIn10YearCopy.slice(startArr, endArr+1)
                console.log(filterData);
                salesGraphChart.data.datasets[0].data = filterData;
                //Update chart
                salesGraphChart.data.labels = filterDate;
                salesGraphChart.update();
            });
        });
    </script>
@endsection
