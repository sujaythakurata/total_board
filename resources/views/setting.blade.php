<!DOCTYPE html>
<html>
<head>
	<title>Product | Login</title>
    <meta charset="utf-8">
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
        <style>
        .callout-info {
            background-color: #038CE8;
        }

        .callout-danger {
            background-color: #E71D36;
        }
    </style>
</head>
<body>
	@include('include/header')
    <section class="main-content-wrap">
        <div class="container-fluid">
        	@include('component/settings/setsec1')
            <br />
            @include('component/settings/setsec2')
            <br />
            @include('component/settings/setsec3')
        </div>
    </section>
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
</body>
</html>