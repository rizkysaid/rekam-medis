<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

  	<!-- {{-- CSRF TOKEN --}} -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- ICON -->
    <link rel="icon" href="{{ asset('dist/img/icon-pkm.png') }}">

  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  	<!-- Ionicons -->
  	<link rel="stylesheet" href="{{ asset('dist/css/ionicons.min.css') }}">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css') }}">
    <!-- Moris chart -->
    <!-- <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}"> -->
    <!-- jvector map -->
    <!-- <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}"> -->
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('dist/css/google_font_api.css') }}">
    <!-- datatable -->
   <!--  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}">
    --> 
    <link rel="stylesheet" href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/select2/select2.min.css') }}">

    @yield('css')
    

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand bg-success navbar-light border-bottom">
            <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li>
        <a href="#" class="nav-link" data-togglr="dropdown">
          <i class="fa fa-user"></i>
          
        </a>  
      </li>
    </ul>
        </nav>

        @include('layouts.module.sidebar')

        @yield('content')
  
        @include('layouts.module.footer')

        @include('layouts.module.modal')

    </div>

<!-- jQuery -->

 <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<!-- 
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
 -->
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- datatables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/datetime.js') }}"></script>

<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/sweetalert.min.js') }}"></script>

@stack('scripts')

<script>
  $('.select2').select2({
    dropdownParent: $('#modal')
  });

</script>

</body>
</html>
