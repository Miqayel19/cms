<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->

    <link href="<?php echo e(asset('css/iEdit.css')); ?>" rel="stylesheet"/>

    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <!-- Font Awesome -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('css/ionicons.min.css')); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo e(asset('css/jquery-jvectormap.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('css/_all-skins.min.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

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
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('admin.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="content-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('admin.includes.control-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</div>

<script src="<?php echo e(asset('js/iEdit.js')); ?>"></script>

<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
<!-- FastClick -->
<script src="<?php echo e(asset('js/fastclick.js')); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('js/adminlte.min.js')); ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('js/jquery.sparkline.min.js')); ?>" type="text/javascript"></script>
<!-- jvectormap  -->
<script src="<?php echo e(asset('js/jquery-jvectormap-1.2.2.min.js')); ?>"></script>

<script src="<?php echo e(asset('js/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo e(asset('js/jquery.slimscroll.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('js/Chart.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('js/dashboard2.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('js/demo.js')); ?>"></script>

</body>
</html>


















