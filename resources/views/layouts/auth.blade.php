<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/dark/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 09:35:24 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>{{ isset($title) ? $title .' | '. config('app.name', 'Satt ') :  config('app.institue_name', config('app.name', 'Satt'))}}</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin/" />
    <!-- page css -->
    <link href="{{asset('dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elegant admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url({{asset('assets/images/background/login-register.jpg')}});">
            <div class="login-box card">
                <div class="card-body">
                      @section('auth')
                      @show
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('assets/node_modules/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
       <script>
   $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
    $(function() {
        $(".preloader").fadeOut();
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    });
    </script>

    <script>
  $('#loginform').on('submit', function(e){
   e.preventDefault();
   $(".loader").show();
   $(".ajax_error").remove();
   var form = $(this).serialize();
   var url = $(this).attr('action');

            $.ajax({
              method:'POST',
              url: url,
              data :form,
              dateType: 'json',
              success: function(data){
              $(".loader").hide();
               $.toast({
                heading: 'Welcome to SATT',
                text: data.message,
                position: 'top-right',
                loaderBg:'#ff6849',
                icon: 'success',
                hideAfter: 3500, 
                stack: 6
                
              });

              setTimeout(function(){

              window.location.href=data.goto;
              },2500);
               },
               error:function (data) {
                $("#loader").hide();
                var jsonValue = $.parseJSON(data.responseText);
                const errors = jsonValue.errors;
                var i = 0;
                $.each(errors, function(key, value) {
                    const first_item = Object.keys(errors)[i]
                    const message = errors[first_item][0]
                    $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                      $.toast({
                        heading: 'Error',
                        text: value,
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'error',
                        hideAfter: 3500
                        
                      });
                  
                    i++;
                });
               }

         });
  });
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/elegant-admin/dark/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 18 Sep 2019 09:35:24 GMT -->
</html>