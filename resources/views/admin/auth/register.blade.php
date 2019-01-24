<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('css/jquery-jvectormap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>Admin</b>LTE</a>
    </div>
    <div class="register-box-body">
        <p class="login-box-msg">Register a new user</p>
        {!! Form::open(['url'=> '/send']) !!}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Please enter the number ex. +374XXXXXX" name="phone">
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Verify by sending SMS</button>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        {!! Form::close() !!}
        <a href="login" class="text-center">I already have a user</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('js/fastclick.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}" type="text/javascript"></script>
<!-- Sparkline -->
<script src="{{asset('js/jquery.sparkline.min.js')}}" type="text/javascript"></script>
<!-- jvectormap  -->
<script src="{{asset('js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('js/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('js/Chart.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('js/dashboard2.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('js/icheck.min.js')}}"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>



















