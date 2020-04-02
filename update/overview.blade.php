<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product | Overview</title>
    <base href="<?= base_url() ?>" target="_blank">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry">
    <meta name="keywords" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry">
    <meta name="author" content="Iam Christian">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('widget/datepicker/datepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body>
    <?php include("import/header.php"); ?>
    <div id="wrapper" class="left-sider-wrapper">
        <div class="loader-page">
            <div class="loading-page-inner">
                <i class="fa fa-circle-o-notch fa-pulse fa-pulse-ani"></i>
            </div>
        </div>
        <?php include("import/left-bar.php"); ?>
        <div class="page-wrapper mb0">
            <section class="main-content-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="list-group comman-list-group list-group-horizontal">
                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-white">Target (<?= $machineType ?>)</p>
                                    <h5 class="h-26 cl-green" id="target">0</h5>
                                </li>
                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-white">Produced Quantity</p>
                                    <h5 class="h-26 cl-green" id="producedQty">0</h5>
                                </li>
                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-white">Shift Production</p>
                                    <h5 class="h-26 cl-green" id="shiftProduction">0</h5>
                                </li>

                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-green">Batch Start Time</p>
                                    <h5 class="h-20 cl-white badge badge-success mt5" id="batchStartTime">00:00:00</h5>
                                </li>
                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-red">Shift Downtime duration</p>
                                    <h5 class="h-20 cl-white badge badge-danger mt5" id="shiftDownTime">00:00:00</h5>
                                </li>
                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-white">Time</p>
                                    <h5 class="h-20 cl-white badge badge-info mt5" id="currentTime">00:00:00</h5>
                                </li>
                                <li class="list-group-item bgl-dblack">
                                    <p class="h-16 cl-white">Shift</p>
                                    <div class="comman-btn-group btn-group btn-group-sm btn-group-toggle mt5" data-toggle="buttons">
                                        <?php print_r($currentShift->shift_id); ?>
                                        <label class="btn btn-light <?= ($currentShift->shift_id == 1) ? "active" : "" ?>">
                                            <input type="radio" name="selectedShift" value="1" autocomplete="off" <?= ($currentShift->shift_id == 1) ? "checked" : "" ?>>1
                                        </label>
                                        <label class="btn btn-light <?= ($currentShift->shift_id == 2) ? "active" : "" ?>">
                                            <input type="radio" name="selectedShift" value="2" autocomplete="off" <?= ($currentShift->shift_id == 2) ? "checked" : "" ?>>2
                                        </label>
                                        <label class="btn btn-light <?= ($currentShift->shift_id == 3) ? "active" : "" ?>">
                                            <input type="radio" name="selectedShift" value="3" autocomplete="off" <?= ($currentShift->shift_id == 3) ? "checked" : "" ?>>3
                                        </label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">
                                Machine rate : <span id="machineRateCount"></span>
                            </h4>
                            <div class="card bgl-dblack card-same-height">
                                <div class="card-body">
                                    <div class="chart-wrap">
                                        <canvas id="cartonComplCanvas"></canvas>
                                        <div class="canvas-text-center text-info">
                                            <h5><br /><b id="machine-rate-txt">10</b>%</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Production- This Batch</h4>
                            <div class="card bgl-dblack card-same-height">
                                <div class="card-body">
                                    <div class="chart-wrap">
                                        <canvas id="todayProduction"></canvas>
                                        <div class="canvas-text-center text-success">
                                            <h5><b id="production-rate-txt">10</b>%</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Today's Shift-wise Production</h4>
                            <div class="card bgl-dblack card-same-height">
                                <div class="card-body">
                                    <div class="chart-wrap">
                                        <canvas id="shiftChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-6">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Shift wise: Daily
                                Production </h4>
                            <div class="bgl-dblack">
                                <div class="progress-wrap" style="max-width: 550px; margin: 0 auto 20px; padding: 0 15px;">
                                </div>
                            </div>

                            <div class="card bgl-dblack card-same-height" style="margin-top: -20px;">
                                <div class="card-body">
                                    <div class="chart-wrap" style="height: 300px; position: relative;">
                                        <canvas id="shiftWiseDailyProduction"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Shift wise: Downtime</h4>
                            <div class="card bgl-dblack card-same-height">
                                <div class="card-body">
                                    <div class="chart-wrap" style="height: 262px; position: relative;">
                                        <canvas id="downtimeChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Downtime Top Causes</h4>
                            <div class="card bgl-dblack card-same-height">
                                <div class="card-body comman-nicescroll no-padding" style="height: 300px; overflow: auto;">
                                    <table class="table table-hover table-dark bgl-dblack" style="vertical-align: middle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Opertor Missing
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Machine Maintenance
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Power Failure
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Opertor Missing
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Machine Maintenance
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Power Failure
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Opertor Missing
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Machine Maintenance
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Power Failure
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <h4 class="badge bgl-dblack d-block h-20 cl-white badge-heading">Shift Wise : DownTime</h4>
                            <div class="card bgl-dblack card-same-height downtime-table-wrapper">
                                <div class="card-body no-padding clearfix">
                                    <table class="table table-hover table-dark bgl-dblack mb0" style="vertical-align: middle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Today's Downtime
                                                </td>
                                                <td>
                                                    <span class="text-danger">16 Minutes</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-hover table-dark bgl-dblack mb0" style="vertical-align: middle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Average
                                                </td>
                                                <td>
                                                    <span class="text-warning">
                                                        16 Minutes<br />
                                                        0.04Hrs
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-hover table-dark bgl-dblack mb0" style="vertical-align: middle">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    DownTime
                                                </td>
                                                <td>
                                                    <span class="text-warning">
                                                        Weekly: 4Hrs <br />
                                                        Monthly:12Hrs
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="comman-footer-outer">
        <!-- FOOTER -->
        <footer>
            <div class="container text-center">
                <p class="para-14">&copy; 2017-2019 Company, Inc.</p>
            </div>
        </footer>
    </div>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js;)}}"></script>
    <script src="{{asset('js/bootstrap.min.js')"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('widget/datepicker/moment.js')}}"></script>
    <script src="{{asset('widget/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('widget/datepicker/picker-init.js')}}"></script>
    <script src="{{asset('widget/chart-js-master/dist/Chart.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes@0.4.0"></script>
    <script src="{{asset('common/myforms.js')}}"></script>
    <script type="text/javascript">
        var machineId = <?= $machineId ?>;

        function pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        }
        var batchStartTime = <?= $batchStartedBefore ?>;
        var currentTime = 5 * 60 * 60;

        function getBatchStartTime() {
            ++batchStartTime;
            var hour = parseInt(batchStartTime / 3600, 10);
            var min = parseInt((batchStartTime / 60) % 60, 10);
            var sec = parseInt(batchStartTime % 60, 10);
            $("#batchStartTime").html(pad(hour) + ":" + pad(min) + ":" + pad(sec))
        }

        function getShiftDownTime(shiftDownTime) {
            var hour = parseInt(shiftDownTime / 3600, 10);
            var min = parseInt((shiftDownTime / 60) % 60, 10);
            var sec = parseInt(shiftDownTime % 60, 10);
            $("#shiftDownTime").html(pad(hour) + ":" + pad(min) + ":" + pad(sec))
        }

        function getCurrentTime() {
            var d = new Date();
            $("#currentTime").html(pad(d.getHours()) + ":" + pad(d.getMinutes()) + ":" + pad(d.getSeconds()))
        }

        function updateBatchData() {
            var selectedShift = $("input[name='selectedShift']:checked").val();
            getDataFromURL(
                "<?= base_url() ?>machine/getLanData/" + machineId + "/" + selectedShift,
                function(data) {
                    $("#target").html(data.data.target);
                    $("#producedQty").html(data.data.producedQty);
                    $("#shiftProduction").html(data.data.shiftProduction);
                    getShiftDownTime(data.data.downTime);

                    renderMachineRate(data.data.machineRate);
                    $("#machineRateCount").html(data.data.machineRateCount);
                    renderProductionOfBatch(data.data.target, data.data.producedQty);
                    renderTodayShiftChart(data.data.todayShiftProduction);
                    setTimeout(function() {
                        updateBatchData();
                    }, 1500);
                },
                function(data) {
                    console.log("___F", data)
                },
            );
        }

        function renderProductionOfBatch(target, producedQty) {
            var doneRatio = Math.floor((producedQty * 100) / target);
            $("#production-rate-txt").html(doneRatio);
            this.todayProduction = new Chart('todayProduction', {
                type: 'pie',
                data: {
                    labels: ["Remaining", "Completed"],
                    datasets: [{
                        label: '',
                        data: [target - producedQty, producedQty],
                        backgroundColor: [
                            '#ffc107',
                            '#66cb7d'
                        ],
                        borderColor: [
                            '#ffc107',
                            '#66cb7d'
                        ],
                        borderWidth: 1
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 70,
                    tooltips: {
                        displayColors: true,
                        callbacks: {
                            mode: 'x',
                        },
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: '#cccbcb'
                        }
                    },
                }
            });
        }

        function renderMachineRate(count) {
            $("#machine-rate-txt").html(count);
            count = count > 100 ? 100 : count;
            this.cartonComplCanvas = new Chart('cartonComplCanvas', {
                type: 'pie',
                data: {
                    labels: ["", ""],
                    datasets: [{
                        label: '',
                        data: [count, 100 - count],
                        backgroundColor: [
                            '#66cb7d',
                            '#17a2b8'
                        ],
                        borderColor: [
                            '#66cb7d',
                            '#17a2b8'
                        ],
                        borderWidth: 1
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutoutPercentage: 70,
                    tooltips: false,
                    legend: {
                        position: 'bottom',
                        labels: false
                    },
                }
            });
        }

        function renderTodayShiftChart(data) {
            var shiftChart = new Chart("shiftChart", {
                type: 'bar',
                data: {
                    labels: ["Shift 1", "Shift 2", "Shift 3"],
                    datasets: [{
                        label: 'Shift',
                        backgroundColor: ["#bdfba3", "#c6d9f1", "#fed68d"],
                        data: data,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        displayColors: true,
                        callbacks: {
                            mode: 'x',
                        },
                    },
                    scales: {
                        xAxes: [{
                            stacked: true,
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }],
                        yAxes: [{
                            stacked: true,
                            gridLines: {
                                display: true,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            }
                        }]
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: '#cccbcb'
                        }
                    },
                }
            });
        }
        $(document).ready(function() {
            var intervalBatchStartTime = setInterval(getBatchStartTime, 1000);
            getShiftDownTime(0);
            var intervalCurrentTime = setInterval(getCurrentTime, 1000);
            // target
            // producedQty
            // shiftProduction
            updateBatchData();
            renderMachineRate(0);
            // pie chart:

            // shiftWiseDailyProduction
            var shiftWiseDailyProductionData = JSON.parse('<?= $shiftWiseDailyProduction ?>');
            var shiftOne = [],
                shiftTwo = [],
                shiftThree = [],
                dayLabels = [];
            $.each(shiftWiseDailyProductionData, function(key, item) {
                dayLabels.push(item.day);
                shiftOne.push(item[0]);
                shiftTwo.push(item[1]);
                shiftThree.push(item[2]);
            });
            var shiftWiseDailyProduction = new Chart('shiftWiseDailyProduction', {
                type: "bar",
                data: {
                    labels: dayLabels,
                    datasets: [{
                            label: 'Shift 1',
                            backgroundColor: "#bdfba3",
                            data: shiftOne
                        },
                        {
                            label: 'Shift 2',
                            backgroundColor: "#c6d9f1",
                            data: shiftTwo
                        },
                        {
                            label: 'Shift 3',
                            backgroundColor: "#fed68d",
                            data: shiftThree
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        displayColors: true,
                        callbacks: {
                            mode: 'x',
                        },
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: '#cccbcb'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Quanities',
                                labels: {
                                    fontColor: '#cccbcb'
                                }
                            },
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Shift Wise: Daily Production',
                                labels: {
                                    fontColor: '#cccbcb'
                                }
                            },
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }]
                    }
                }
            });
            shiftWiseDailyProduction.height = 200;
            // downtimeChart
            var shiftWiseDailyDowntimeData = JSON.parse('<?= $shiftWiseDailyDowntime ?>');
            var shiftOneDowntime = [],
                shiftTwoDowntime = [],
                shiftThreeDowntime = [],
                dayLabelsDowntime = [];
            $.each(shiftWiseDailyDowntimeData, function(key, item) {
                dayLabelsDowntime.push(item.day);
                shiftOneDowntime.push(item[0]);
                shiftTwoDowntime.push(item[1]);
                shiftThreeDowntime.push(item[2]);
            });
            var downtimeChart = new Chart('downtimeChart', {
                type: "bar",
                data: {
                    labels: dayLabelsDowntime,
                    datasets: [{
                            label: 'Shift 1',
                            backgroundColor: "#bdfba3",
                            data: shiftOneDowntime
                        },
                        {
                            label: 'Shift 2',
                            backgroundColor: "#c6d9f1",
                            data: shiftTwoDowntime
                        },
                        {
                            label: 'Shift 3',
                            backgroundColor: "#fed68d",
                            data: shiftThreeDowntime
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        displayColors: true,
                        callbacks: {
                            mode: 'x',
                        },
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            fontColor: '#cccbcb'
                        }
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            },
                            scaleLabel: {
                                display: true,
                                labelString: 'Quanities',
                                labels: {
                                    fontColor: '#cccbcb'
                                }
                            },
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: 'Shift Wise: Downtime',
                                labels: {
                                    fontColor: '#cccbcb'
                                }
                            },
                            gridLines: {
                                display: false,
                                color: 'rgba(255, 255, 255, 0.2)',
                                zeroLineColor: 'rgba(255, 255, 255, 0.5)'
                            },
                            ticks: {
                                beginAtZero: true,
                                fontColor: '#cccbcb'
                            },
                        }]
                    }
                }
            });
        });
    </script>
</body>

</html>