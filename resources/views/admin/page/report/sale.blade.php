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
                    <section class="col-lg-8 col-md-8 col-8 connectedSortable">
                        <!-- BAR CHART -->
                        <div class="card">
                            <div class="card-body" style="height: 430px !important;">
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
                                    <canvas id="lineChart" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </section>
                    <section class="col-lg-4 col-md-4 col-4 connectedSortable">
                        <!-- /.info-box -->
                        <div class="card">
                            <div class="card-body" style="height: 430px !important;">
                                <div
                                    class="chart tab-pane"
                                    id="sales-chart"
                                    style="position: relative; height: 300px"
                                >
                                    <canvas
                                        id="sales-chart-canvas"
                                        height="300"
                                        style="height: 300px"
                                    ></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.info-box -->
                    </section>
                </div>
                <!-- /.row (main row) -->
                <div class="row">
                    <section class="col-lg-6 col-md-6 col-6 connectedSortable" style="height: 500px; min-height: 500px; max-height: 500px">
                        <div class="card">
                            <div class="card-header" style="margin-bottom: 15px">
                                <h3 class="card-title" style="color: blue; font-weight: 600">Top 3 dược phẩm có doanh thu cao nhất</h3>
                            </div>
                            <div style="text-align: end; margin: 5px 20px 15px 0px">
                                Năm: <select name="selectYear" id="selectYear" style="padding: 2px">
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
                                &nbsp;
                                Quý: <select name="selectQuy" id="selectQuy" style="padding: 2px">
                                    <option value="allQuy" selected>Cả năm</option>
                                    <option value="quy1">Quý 1</option>
                                    <option value="quy2">Quý 2</option>
                                    <option value="quy3">Quý 3</option>
                                    <option value="quy4">Quý 4</option>
                                </select>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Tên dược phẩm</th>
                                        <th>Số lượng bán ra</th>
                                        <th>Tổng doanh thu</th>
                                        <th>Thông tin</th>
                                    </tr>
                                    </thead>
                                    <tbody id="listTopProduct">
                                        <tr>
                                            <td colspan="4" style="text-align: center">
                                                Không có doanh thu
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                    <section class="col-lg-6 col-md-6 col-6 connectedSortable" style="height: 500px; min-height: 500px; max-height: 500px">
                        <div class="card">
                            <div class="card-header" style="margin-bottom: 15px">
                                <h3 class="card-title" style="color: green; font-weight: 600">Top 3 nhà cung cấp chính</h3>
                            </div>
                            <div style="text-align: end; margin: 5px 20px 15px 0px">
                                Năm: <select name="selectYear1" id="selectYear1" style="padding: 2px">
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
                                &nbsp;
                                Quý: <select name="selectQuy1" id="selectQuy1" style="padding: 2px">
                                    <option value="allQuy" selected>Cả năm</option>
                                    <option value="quy1">Quý 1</option>
                                    <option value="quy2">Quý 2</option>
                                    <option value="quy3">Quý 3</option>
                                    <option value="quy4">Quý 4</option>
                                </select>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Tên nhà cung cấp</th>
                                        <th>Số đơn hàng đã nhập</th>
                                        <th>Tổng chi phí</th>
                                        <th>Thông tin</th>
                                    </tr>
                                    </thead>
                                    <tbody id="listTopSupplier">
                                    <tr>
                                        <td colspan="4" style="text-align: center">
                                            Không có đơn hàng
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div><!-- /.container-fluid -->
            <!--View Modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chi tiết sản phẩm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <img src="" class="card-img-top" id="card-img-top" alt="...">
                                <div class="card-body">
                                    <h3 class="product-name" id="product-name" style="margin-bottom: 20px">Card title</h3>
                                    <p class="product-code" id="product-code"></p>
                                    <p class="category" id="category"></p>
                                    <p class="route_of_use" id="route_of_use"></p>
                                    <p class="dosage" id="dosage"></p>
                                    <p class="content" id="content"></p>
                                    <p class="instruction" id="instruction"></p>
                                    <button type="button" class="btn btn-danger" style="float: right" data-dismiss="modal">Thoát</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            stepSize: 200000,
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

            // Donut Chart (don hang)
            var thkOrder = @json($thkOrder);
            var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Đơn hàng đã được đặt',
                    'Đơn hàng đã xác nhận',
                    'Đơn hàng nhận thành công'
                ],
                datasets: [
                    {
                        data: thkOrder,
                        backgroundColor: ['#dc3545', '#17a2b8', '#00a65a']
                    }
                ]
            }
            var pieOptions = {
                legend: {
                    position: 'bottom',

                },
                title: {
                    display: true,
                    text: 'Thống kê số lượng đơn hàng (2023)',
                    // padding: {
                    //     bottom: 10
                    // },
                    font: {
                        size: 54,
                        style: 'italic',
                        family: 'Helvetica Neue'
                    }
                },
                maintainAspectRatio: false,
                responsive: true
            }
            // Create douhnut chart
            var pieChart = new Chart(pieChartCanvas, { // lgtm[js/unused-local-variable]
                type: 'doughnut',
                data: pieData,
                options: pieOptions
            })

            //-------------
            //- LINE CHART (don hang) -
            //--------------
            var thkExpenseByTime = @json($thkExpenseByTime);
            var areaChartData = {
                labels  : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                    'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [
                    {
                        label               : 'Chi phí',
                        backgroundColor     : '#dc3545',
                        borderColor         : '#dc3545',
                        // pointRadius          : true,
                        // pointColor          : '#3b8bba',
                        // pointStrokeColor    : 'rgba(60,141,188,1)',
                        // pointHighlightFill  : '#fff',
                        // pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : thkExpenseByTime[0]["countExpendByTime"]
                    },
                ]
            }
            var areaChartOptions = {
                maintainAspectRatio : false,
                responsive : true,
                legend: {
                    display: false,
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
                    text: 'Thống kê chi phí nhập hàng (VNĐ)',
                }
            }

            var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
            var lineChartOptions = $.extend(true, {}, areaChartOptions)
            var lineChartData = $.extend(true, {}, areaChartData)
            lineChartData.datasets[0].fill = false;
            lineChartOptions.datasetFill = false
            var lineChart = new Chart(lineChartCanvas, {
                type: 'line',
                data: lineChartData,
                options: lineChartOptions
            })
            $('#select_year1').change(function(){
                for(let i = 0; i < thkExpenseByTime.length; i++) {
                    if(thkExpenseByTime[i]["currentYear"] === $(this).val()) {
                        //-------------
                        //- LINE CHART SELECT YEAR-
                        //--------------
                        lineChart.data.datasets[0].data = thkExpenseByTime[i]["countExpendByTime"];
                        lineChart.update();
                        break;
                    }
                }
            })
            //Thong ke san pham ban chay theo nam, theo
            getTopProductReload();
            var thkProductSaleByTime = @json($thkProductSaleByTime);
            var sortable = [];
            console.log(thkProductSaleByTime);
            $('#selectYear').change(function(){
                sortable = [];
                $("#listTopProduct").empty();
                console.log($(this).val());
                console.log($("select[name='selectQuy']").val());
                const arrQuy = ["quy1", "quy2", "quy3", "quy4", "allQuy"];
                for (const productSale of thkProductSaleByTime) {
                    if(productSale["currentYear"] === $(this).val()) {
                        const index = arrQuy.indexOf($("select[name='selectQuy']").val());
                        const getSaleByQuy = productSale["getSaleByYear"][index];
                        // sort by sale
                        console.log(getSaleByQuy);

                        for (let sale in getSaleByQuy) {
                            sortable.push([sale, getSaleByQuy[sale]]);
                        }
                        sortable.sort(function(a, b) {
                            return b[1][1] - a[1][1];
                        });
                        console.log(sortable);
                        //Lay 3 san pham co doanh thu cao nhat;
                        if(sortable.length === 0) {
                            let newTrHtml = `
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        Không có doanh thu
                                    </td>
                                </tr>`
                            console.log(newTrHtml);
                            $("#listTopProduct").append(newTrHtml);
                        } else {
                            for(let i=0; i<sortable.length; i++) {
                                if(i===3) break;
                                let newTrHtml = `
                                <tr>
                                    <td>
                                        `+sortable[i][0]+`
                                    </td>
                                    <td>`+sortable[i][1][0]+`</td>
                                    <td>
                                        `+sortable[i][1][1]+` VNĐ
                                    </td>
                                    <td>
                                        <button class="btn" onclick="viewProduct(`+sortable[i][1][2]+`)">
                                            <i class="fas fa-eye" style="color: blue"></i>

                                        </button>
                                    </td>
                                </tr>`
                                console.log(newTrHtml);
                                $("#listTopProduct").append(newTrHtml);
                            }
                        }
                    }
                }
            });
            $('#selectQuy').change(function(){
                sortable = [];
                $("#listTopProduct").empty();
                //console.log($("select[name='selectYear']").val());
                //console.log($(this).val());
                const arrQuy = ["quy1", "quy2", "quy3", "quy4", "allQuy"];
                for (const productSale of thkProductSaleByTime) {
                    if(productSale["currentYear"] === $("select[name='selectYear']").val()) {
                        const index = arrQuy.indexOf($(this).val());
                        const getSaleByQuy = productSale["getSaleByYear"][index];
                        // sort by sale
                        console.log(getSaleByQuy);

                        for (let sale in getSaleByQuy) {
                            sortable.push([sale, getSaleByQuy[sale]]);
                        }
                        sortable.sort(function(a, b) {
                            return b[1][1] - a[1][1];
                        });
                        console.log(sortable);
                        //Lay 3 san pham co doanh thu cao nhat;
                        if(sortable.length === 0) {
                            let newTrHtml = `
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        Không có doanh thu
                                    </td>
                                </tr>`
                            console.log(newTrHtml);
                            $("#listTopProduct").append(newTrHtml);
                        } else {
                            for(let i=0; i<sortable.length; i++) {
                                if(i===3) break;
                                let newTrHtml = `
                                <tr>
                                    <td>
                                        `+sortable[i][0]+`
                                    </td>
                                    <td>`+sortable[i][1][0]+`</td>
                                    <td>
                                        `+sortable[i][1][1]+` VNĐ
                                    </td>
                                    <td>
                                        <button class="btn" onclick="viewProduct(`+sortable[i][1][2]+`)">
                                            <i class="fas fa-eye" style="color: blue"></i>

                                        </button>
                                    </td>
                                </tr>`
                                console.log(newTrHtml);
                                $("#listTopProduct").append(newTrHtml);
                            }
                        }
                    }
                }
            });

            //Thong ke nha cung cap
            getTopSuppierReload();
            var thkSupplierByTime = @json($thkSupplierByTime);
            var sortSupplierTable = [];
            console.log(thkSupplierByTime);
            $('#selectYear1').change(function(){
                sortSupplierTable = [];
                $("#listTopSupplier").empty();
                console.log($(this).val());
                console.log($("select[name='selectQuy1']").val());
                const arrQuy = ["quy1", "quy2", "quy3", "quy4", "allQuy"];
                for (const productSupplier of thkSupplierByTime) {
                    if(productSupplier["currentYear"] === $(this).val()) {
                        const index = arrQuy.indexOf($("select[name='selectQuy1']").val());
                        const getSaleByQuy = productSupplier["getProductSupplierByYear"][index];
                        // sort by sale
                        console.log(getSaleByQuy);

                        for (let sale in getSaleByQuy) {
                            sortSupplierTable.push([sale, getSaleByQuy[sale]]);
                        }
                        sortSupplierTable.sort(function(a, b) {
                            return b[1][0] - a[1][0];
                        });
                        console.log(sortSupplierTable);
                        //Lay 3 nha cung cap co nhieu don hang nhat;
                        if(sortSupplierTable.length === 0) {
                            let newTrHtml = `
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        Không có đơn hàng
                                    </td>
                                </tr>`
                            console.log(newTrHtml);
                            $("#listTopSupplier").append(newTrHtml);
                        } else {
                            for(let i=0; i<sortSupplierTable.length; i++) {
                                if(i===3) break;
                                let newTrHtml = `
                                <tr>
                                    <td>
                                        `+sortSupplierTable[i][0]+`
                                    </td>
                                    <td>`+sortSupplierTable[i][1][0]+`</td>
                                    <td>
                                        `+sortSupplierTable[i][1][1]+` VNĐ
                                    </td>
                                    <td>
                                        <button class="btn" onclick="viewSupplier(`+sortSupplierTable[i][1][2]+`)">
                                            <i class="fas fa-eye" style="color: blue"></i>

                                        </button>
                                    </td>
                                </tr>`
                                console.log(newTrHtml);
                                $("#listTopSupplier").append(newTrHtml);
                            }
                        }
                    }
                }
            });
            $('#selectQuy1').change(function(){
                sortSupplierTable = [];
                $("#listTopSupplier").empty();
                console.log($(this).val());
                console.log($("select[name='selectQuy1']").val());
                const arrQuy = ["quy1", "quy2", "quy3", "quy4", "allQuy"];
                for (const productSupplier of thkSupplierByTime) {
                    if(productSupplier["currentYear"] === $("select[name='selectYear1']").val()) {
                        const index = arrQuy.indexOf($(this).val());
                        const getSaleByQuy = productSupplier["getProductSupplierByYear"][index];
                        // sort by sale
                        console.log(getSaleByQuy);

                        for (let sale in getSaleByQuy) {
                            sortSupplierTable.push([sale, getSaleByQuy[sale]]);
                        }
                        sortSupplierTable.sort(function(a, b) {
                            return b[1][0] - a[1][0];
                        });
                        console.log(sortSupplierTable);
                        //Lay 3 nha cung cap co nhieu don hang nhat;
                        if(sortSupplierTable.length === 0) {
                            let newTrHtml = `
                                <tr>
                                    <td colspan="4" style="text-align: center">
                                        Không có đơn hàng
                                    </td>
                                </tr>`
                            console.log(newTrHtml);
                            $("#listTopSupplier").append(newTrHtml);
                        } else {
                            for(let i=0; i<sortSupplierTable.length; i++) {
                                if(i===3) break;
                                let newTrHtml = `
                                <tr>
                                    <td>
                                        `+sortSupplierTable[i][0]+`
                                    </td>
                                    <td>`+sortSupplierTable[i][1][0]+`</td>
                                    <td>
                                        `+sortSupplierTable[i][1][1]+` VNĐ
                                    </td>
                                    <td>
                                        <button class="btn" onclick="viewSupplier(`+sortSupplierTable[i][1][2]+`)">
                                            <i class="fas fa-eye" style="color: blue"></i>

                                        </button>
                                    </td>
                                </tr>`
                                console.log(newTrHtml);
                                $("#listTopSupplier").append(newTrHtml);
                            }
                        }
                    }
                }
            });
        });

        /**
         *
         */
        const getTopProductReload = () => {
            let thkProductSale = @json($thkProductSaleByTime);
            let sortPro = [];
            $("#listTopProduct").empty();
            const getSaleByQuy = thkProductSale[0]["getSaleByYear"][4];
            // sort by sale
            console.log(getSaleByQuy);

            for (let sale in getSaleByQuy) {
                sortPro.push([sale, getSaleByQuy[sale]]);
            }
            sortPro.sort(function(a, b) {
                return b[1][1] - a[1][1];
            });
            console.log(sortPro);
            //Lay 3 san pham co doanh thu cao nhat;
            for(let i=0; i<sortPro.length; i++) {
                if(i===3) break;
                let newTrHtml = `
                        <tr>
                            <td>
                                `+sortPro[i][0]+`
                            </td>
                            <td>`+sortPro[i][1][0]+` </td>
                            <td>
                                `+sortPro[i][1][1]+` VNĐ
                            </td>
                            <td>
                                <button class="btn" onclick="viewProduct(`+sortPro[i][1][2]+`)">
                                    <i class="fas fa-eye" style="color: blue"></i>

                                </button>

                            </td>
                        </tr>`
                console.log(newTrHtml);
                $("#listTopProduct").append(newTrHtml);
            }
        }

        /**
         *
         */
        const getTopSuppierReload = () => {
            var thkSupplierByTime = @json($thkSupplierByTime);
            let sortSup = [];
            $("#listTopSupplier").empty();
            const getSaleByQuy = thkSupplierByTime[0]["getProductSupplierByYear"][4];
            // sort by sale
            console.log(getSaleByQuy);

            for (let sale in getSaleByQuy) {
                sortSup.push([sale, getSaleByQuy[sale]]);
            }
            sortSup.sort(function(a, b) {
                return b[1][0] - a[1][0];
            });
            console.log(sortSup);
            //Lay 3 nha cung cap co nhieu don cao nhat;
            for(let i=0; i<sortSup.length; i++) {
                if(i===3) break;
                let newTrHtml = `
                        <tr>
                            <td>
                                `+sortSup[i][0]+`
                            </td>
                            <td>`+sortSup[i][1][0]+` </td>
                            <td>
                                `+sortSup[i][1][1]+` VNĐ
                            </td>
                            <td>
                                <button class="btn" onclick="viewSupplier(`+sortSup[i][1][2]+`)">
                                    <i class="fas fa-eye" style="color: blue"></i>

                                </button>

                            </td>
                        </tr>`
                console.log(newTrHtml);
                $("#listTopSupplier").append(newTrHtml);
            }
        }
        /**
         * Confirm view product
         * @param id
         */
        const viewProduct = (id) => {
            $.ajax({
                url: "/admin/products/detail",
                type:'GET',
                data: { id:id },
                success: function(response) {
                    console.log(response["data"]);
                    if(response["code"] === 200) {
                        document.getElementById("card-img-top").src = '{{ URL::asset('image/products') }}' + '/' + response["data"][0]["product_image"];
                        document.getElementById("product-name").innerHTML = response["data"][0]["product_name"];
                        document.getElementById("product-code").innerHTML = "<span class='text-muted'><i>Mã sản phẩm: </i></span>" + response["data"][0]["product_code"];
                        document.getElementById("category").innerHTML = "<span class='text-muted'><i>Danh mục: </i></span>" + response["data"][0]["category_name"];
                        document.getElementById("route_of_use").innerHTML = "<span class='text-muted'><i>Đường dùng: </i></span>" + response["data"][0]["route_of_use"];
                        document.getElementById("dosage").innerHTML = "<span class='text-muted'><i>Dạng bào chế: </i></span>" + response["data"][0]["dosage"];
                        document.getElementById("content").innerHTML = "<span class='text-muted'><i>Hàm lượng: </i></span>" + response["data"][0]["content"];
                        if(response["data"][0]["instruction"]) {
                            document.getElementById("instruction").innerHTML = "<span style='color: red'>Hướng dẫn sử dụng: </span>" + response["data"][0]["instruction"];
                        } else {
                            document.getElementById("instruction").innerHTML = "";
                        }
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
            $("#viewModal").modal("show");
        }

        const viewSupplier = (id) => {
            window.location.href = "/admin/suppliers/" + id + "/detail";
        }
    </script>
@endsection
