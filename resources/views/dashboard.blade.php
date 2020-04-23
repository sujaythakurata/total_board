<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
    <link rel="icon" href="{{asset('images/logo.ico')}}" type="image/x-icon"/>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="3600" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry">
    <meta name="keywords" content="Lorem Ipsum is simply dummy text of the printing and typesetting industry">
    <meta name="author" content="Iam Christian">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('js/widget/datepicker/datepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
</head>
<body>
	@include('include/header')
    <div id="wrapper">
        <div class="loader-page">
            <div class="loading-page-inn+er">
                <i class="fa fa-circle-o-notch fa-pulse fa-pulse-ani"></i>
            </div>
        </div>
        <div class="page-wrapper mb0">
            <section class="main-content-wrap">
                <div class="container-fluid">
                    <div class="row">
                        @include('component/dashboardsec1')
                        @include('component/dashboardsec2')
                        @include('component/dashboardsec3')
                        @include('component/dashboardsec4')
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
    <script type="text/javascript">
        const batch_id = 0;
        const masterurl = '{{ url("api/masterdetails") }}';
        const dturl = '{{ url("api/wkwisedt")}}';
        const oeehourwiseurl = '{{ url("api/oee")}}';
        function currtime() {
                let curr_time = moment().format('HH:mm:ss');
                $('#currentTime').text(curr_time);
        }
        setInterval(currtime, 1000);

        //reason api
        const reason = "{{url('api/topreason')}}";
        //shift reason api
        const shiftreason = "{{url('api/shiftrea')}}";

        //prod 
        const prod_url = "{{url('api/machinedata')}}";
        //dt
        const dt_url = "{{url('api/machinedata/dt')}}";
        //prod 
        const oee_url = "{{url('api/machinedata/oee')}}";

    </script>
    <!-- <script src="js/jquery.min.js"></script> -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/widget/datepicker/moment.js')}}"></script>
    <script src="{{asset('js/widget/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/widget/datepicker/picker-init.js')}}"></script>
    <script src="{{asset('js/widget/chart-js-master/dist/Chart.bundle.js')}}" type="text/javascript"></script>
     <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-colorschemes@0.4.0"></script>
    <script src="{{asset('js/common/myforms.js')}}"></script>
    <script src="{{asset('js/Controller/header/time.js')}}"></script>
    <script src="{{asset('js/Controller/header/header.js')}}"></script>
    <script src="{{asset('js/Controller/header/produceqty.js')}}"></script>
    <script src="{{asset('js/Controller/header/shiftqty.js')}}"></script>
    <script src="{{asset('js/Controller/dashboardgraph/charts.js')}}"></script>
    <script src="{{asset('js/Controller/dashboardgraph/todayProduction.js')}}"></script>
    <script src="{{asset('js/Controller/dashboardgraph/downtimeweek.js')}}"></script>
    <script src="{{asset('js/Controller/master.js')}}"></script>
    <script src="{{asset('js/Controller/dashboardgraph/oeehourswise.js')}}"></script>
    <script src="{{asset('js/Controller/topreason.js')}}"></script>
    <script src="{{asset('js/Controller/shiftreason.js')}}"></script>
    <script src="{{asset('js/Controller/prod.js')}}"></script>
    <script src="{{asset('js/Controller/dt.js')}}"></script>
    <script src="{{asset('js/Controller/oee.js')}}"></script>
    <script src="{{asset('js/Controller/all.js')}}"></script>
</body>
</html>