<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 09:33:39 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset(get_option('favicon')?'storage/favicon/'.get_option('favicon'):'assets/images/favicon.png')}}">
    <title>{{ isset($title) ? $title .' | '. config('app.name', 'Laravel') :  config('app.name', 'Laravel')}}</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin/" />
    <!-- This page CSS -->
    <!-- chartist CSS -->

    <link href="{{asset('assets/node_modules/morrisjs/morris.css')}}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
    <!--c3 plugins CSS -->
    <link href="{{asset('assets/node_modules/c3-master/c3.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/select2/dist/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

    <link href="{{asset('assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css')}}" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{asset('assets/node_modules/jquery-asColorPicker-master/dist/css/asColorPicker.css')}}" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{asset('assets/node_modules/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('assets/node_modules/dropify/dist/css/dropify.min.css')}}">

    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">

    <!-- Dashboard 1 Page CSS -->
    <link href="{{asset('dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
    .toggle.lg input[type="checkbox"] + .button-indecator:before {
      font-size: 30px;
  }

  .toggle input[type="checkbox"] {
      display: none;
  }

  .toggle input[type="checkbox"] + .button-indecator {
      cursor: pointer;
      display: block;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
  }

  .toggle input[type="checkbox"] + .button-indecator:before {
      content: "";
      font-family: "FontAwesome";
      speak: none;
      font-style: normal;
      font-weight: normal;
      font-variant: normal;
      text-transform: none;
      line-height: 1;
      font-size: 25px;
      -webkit-font-smoothing: antialiased;
      display: inline-block;
      margin-right: 5px;
      vertical-align: -2px;
  }

  .toggle input[type="checkbox"]:checked + .button-indecator:before {
      content: "";
      color: #009688;
      -webkit-animation: toggleBtn 0.3s ease-in-out;
      animation: toggleBtn 0.3s ease-in-out;
  }

  .toggle input[type="checkbox"]:disabled + .button-indecator {
      cursor: not-allowed !important;
  }

  .toggle input[type="checkbox"]:disabled + .button-indecator:before {
      color: #ccc;
  }
</style>
@stack('admin.css')
<script>
    const Base_url = '/admin/';
</script>
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">{{ get_option('site_title')}}</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
           @include('_partial.admin.header')
       </header>
       <!-- ============================================================== -->
       <!-- End Topbar header -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- Left Sidebar - style you can find in sidebar.scss  -->
       <!-- ============================================================== -->
       <aside class="left-sidebar">
           @include('_partial.admin.sidebar')
       </aside>
       <!-- ============================================================== -->
       <!-- End Left Sidebar - style you can find in sidebar.scss  -->
       <!-- ============================================================== -->
       <!-- ============================================================== -->
       <!-- Page wrapper  -->
       <!-- ============================================================== -->
       <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
           @section('pageheader')
           @show    

           @section('content')
           @show
           @include('_partial.admin.rightbar')
       </div>
       <!-- ============================================================== -->
       <!-- End Container fluid  -->
       <!-- ============================================================== -->

   </div>

   <!-- ============================================================== -->
   <!-- End Page wrapper  -->
   <!-- ============================================================== -->
   <!-- ============================================================== -->
   <!-- footer -->
   <!-- ============================================================== -->
   <footer class="footer">
    © 2019 {{ get_option('company_name')}}
</footer>
<!-- ============================================================== -->
<!-- End footer -->
<!-- ============================================================== -->
</div>
@if(isset($modal))
<!-- Add Contact Popup Model -->        

<div id="modal_remote" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-{{ $modal }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{$title}}</h4> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div id="modal-loader" style="display: none; text-align: center;"> <img src="{{ asset('img/loading.gif') }}"> </div>
            <div class="modal-body">
             
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    @endif

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('dist/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('dist/js/custom.min.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{asset('assets/node_modules/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/morrisjs/morris.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!--c3 JavaScript -->
    <script src="{{asset('assets/node_modules/d3/d3.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/c3-master/c3.min.js')}}"></script>
    <!-- Popup message jquery -->
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
    <script src="{{ asset('js/parsley.min.js') }}"></script>
    <script src="{{asset('assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-select/bootstrap-select.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/node_modules/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('assets/node_modules/moment/moment.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="{{asset('assets/node_modules/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="{{asset('assets/node_modules/jquery-asColor/dist/jquery-asColor.js')}}"></script>
    <script src="{{asset('assets/node_modules/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{asset('assets/node_modules/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{asset('assets/node_modules/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/node_modules/moment/moment.js')}}"></script>
    <script src="{{asset('assets/node_modules/dropify/dist/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/summernote/dist/summernote.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('dist/js/dashboard1.js')}}"></script>
    
    <script src="{{asset('js/main.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- /core JS files -->

    @stack('admin.scripts')
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/dark/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 09:34:13 GMT -->
</html>
