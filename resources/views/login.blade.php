<!DOCTYPE html>
<html lang="en">

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
    <link href="{{asset('js/common/myproject.css')}}" rel="stylesheet" type="text/css" />
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body>
    <div id="wrapper">
        <div class="loader-page">
            <div class="loading-page-inner">
                <i class="fa fa-circle-o-notch fa-pulse fa-pulse-ani"></i>
            </div>
        </div>
        <div class="page-wrapper">
            <section class="top-heading-wrap">
                <div class="container-fluid">
                    <div class="row justify-content-center align-items-center login-row">
                        <div class="col-md-6 col-lg-5 col-xl-4">
                            <div class="login-form">
                                <div class="main-div">
                                    @if (session('data'))
                                        <div class="alert alert-danger">
                                            {{ session('data') }}
                                        </div>
                                    @endif
                                    @if($errors->any())
                                     <div class="alert alert-danger">
                                            @foreach($errors->all() as $e)
                                                {{ $e }}<br>
                                            @endforeach
                                     </div> 
                                    @endif
                                    <div class="panel">
                                        <h2>Login</h2>
                                        <p>Please enter email ID and password</p>
                                    </div>
                                    <form id="userLogin" method="post" action="/login">
                                        @csrf

                                        <div class="form-group c-form-group">
                                            <label>Employee Code</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="inputEmail" placeholder="Email Address" name="username">
                                                <span class="focus-border"><i></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group c-form-group">
                                            <label>Password</label>
                                            <div class="form-control-wrap">
                                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                                                <span class="focus-border"><i></i></span>
                                            </div>
                                        </div>
                                        <div class="forgot">
                                            <a href="forgot-password.html" class="bttn st btn-links-blue">Forgot
                                                password?</a>
                                        </div>
                                        <button type="submit" class="bttn st btn-orange btn-block text-uppercase">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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
    <script src="{{asset('js/common/myforms.js')}}"></script>
</body>

</html>