<!DOCTYPE html>
<html>
<head>
	<title>machine</title>
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
</head>
<body>
	@include('include/header')
<div id="wrapper" class="left-sider-wrapper">
    <div id="wrapper">
        <div class="loader-page">
            <div class="loading-page-inner">
                <i class="fa fa-circle-o-notch fa-pulse fa-pulse-ani"></i>
            </div>
        </div>
        @include('include/left-bar')
        <div class="page-wrapper mb0">
            <section class="main-content-wrap">
                <div class="container-fluid">
                    <div class="row">
                        @include('component/machine/machinesec1')
                        @include('component/machine/machinesec2')
                        @include('component/machine/machinesec3')
                        @include('component/machine/machinesec4')
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
</div>

    <script type="text/javascript">
        //get the machine index
        const m_id = '{{ $id }}';
        //api to get the machine master details
        const M_url = "{{url('api/machine')}}"+"/"+m_id;
        //api to get the machine 
        const M_WSDD = "{{url('api/machine/wsdd')}}"+"/"+m_id;
        ///batch details url
        const time = "{{ url('api/batchdetails')}}";
        ///api to get oee 
        const oeeurl = "{{url('api/machine/oee')}}"+"/"+m_id;
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

    <!---my js controllers --->
    <script src="{{ asset('js/Controller/machine/batchtimeupdate.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/activemachine.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/machinegraph.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/machinerategraph.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/machinetodayprod.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/weekwiseshiftprod.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/weekshiftdown.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/weekwisedata.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/machineoee.js')}}"></script>
    <script src="{{ asset('js/Controller/machine/masterupdate.js')}}"></script>
</body>
</html>