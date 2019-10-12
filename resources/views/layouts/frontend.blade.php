<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ isset($title) ? $title .' | '. config('app.name', 'Laravel') :  config('app.name', 'Laravel')}}</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" type="image/png" sizes="16x16" href="{{asset(get_option('favicon')?'storage/favicon/'.get_option('favicon'):'assets/images/favicon.png')}}">
  <!-- All css files are included here. -->
  <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/iconfont.min.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/plugins.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/helper.css')}}">
  <link href="{{asset('assets/node_modules/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/parsley.css')}}">
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css')}}" rel="stylesheet">
  <style>
    .modal-newsletter {
      color: #999;
      font-size: 15px;
    }

    .modal-newsletter .modal-content {
      padding: 30px;
      border-radius: 0;
      border: none;
    }

    .modal-newsletter .modal-header {
      border-bottom: none;
      position: relative;
      border-radius: 0;
    }

    .modal-newsletter h3 {
      color: #f00c0c;
      font-size: 30px;
      margin: 0;
      font-weight: bold;
    }

    .modal-newsletter .close {
      position: absolute;
      top: -15px;
      right: -15px;
      text-shadow: none;
      opacity: 0.3;
      font-size: 24px;
    }

    .modal-newsletter .close:hover {
      opacity: 0.8;
    }

    .modal-newsletter .icon-box {
      color: #7265ea;
      display: inline-block;
      z-index: 9;
      text-align: center;
      position: relative;
      margin-bottom: 10px;
    }

    .modal-newsletter .icon-box i {
      font-size: 110px;
    }

    .modal-newsletter .form-control,
    .modal-newsletter .btn {
      min-height: 46px;
      border-radius: 0;
    }

    .modal-newsletter .form-control {
      box-shadow: none;
      border-color: #dbdbdb;
    }

    .modal-newsletter .form-control:focus {
      border-color: #f95858;
      box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
    }

    .modal-newsletter .btn {
      color: #fff;
      background: #f95858;
      text-decoration: none;
      transition: all 0.4s;
      line-height: normal;
      padding: 6px 20px;
      min-width: 150px;
      margin-left: 6px !important;
      border: none;
    }

    .modal-newsletter .btn:hover,
    .modal-newsletter .btn:focus {
      box-shadow: 0 0 8px rgba(249, 88, 88, 0.4);
      background: #f72222;
      outline: none;
    }

    .modal-newsletter .input-group {
      margin-top: 30px;
    }

    .hint-text {
      margin: 100px auto;
      text-align: center;

    }

    .text {
      color: #101010;
      font-size: 25px;
      font-weight: 900;

    }

    .text-danger {
      font-size: 25px;
    }

    #fb-root > div.fb_dialog.fb_dialog_advanced.fb_shrink_active {
     right: initial !important;
     left: 18pt;
     z-index: 9999999 !important;
   }
   .fb-customerchat.fb_invisible_flow.fb_iframe_widget iframe {
     right: initial !important;
     left: 18pt !important;
   }
 </style>
 @stack('css')
 <!-- Modernizr JS -->
 <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>


<body id="fb-root">

  <div id="myModal" class="modal fade bd-example-modal-lg">
    <div class="modal-dialog modal-lg modal-newsletter modal-dialog-centered">
      <div class="modal-content">

        <div class="row">
          <div class="col-md-6">
            <h3 class="text-center text-dark mb-3"> CALL US FOR UMRAH</h3>

            <div class="card text-white bg-primary mb-3">
              <div class="card-header">+880 1856442024</div>
            </div>

            <div class="card text-white bg-secondary  mb-3">
              <div class="card-header">+880 1856442024</div>
            </div>

            <div class="card text-white bg-success  mb-3">
              <div class="card-header">+880 1856442024</div>
            </div>


            <div class="card text-white  bg-info mb-3">
              <div class="card-header">+880 1856442024</div>
            </div>

          </div>
          <div class="col-md-6">

            <h3 class="text-center text-dark mb-3"> CONTACT US:</h3>
            <div class="contact-form-wrap col-12">
              <div class="contact-form">
                <form id="modal" action="{{ route('post_contact') }}" method="post">
                  <div class="row">
                    <div class="col-12 mb-10"><input name="name" id="name" type="text" placeholder="Name"></div>

                    <div class="col-12 mb-10"><input name="email" id="email" type="email" placeholder="Email"></div>

                    <div class=" col-12 mb-10"><input name="phone" id="phone" type="text" placeholder="Phone"></div>

                    <div class=" col-12 mb-10"><input name="subject" id="subject" type="text" placeholder="Subject"></div>

                    <div class="col-12 text-center"><button class="btn">submit</button></div>
                  </div>
                </form>
                <p class="form-messege"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="main-wrapper">

    <!--Header section start-->
    <header class="header header-sticky">
     @include('_partial.frontend.navbar')
   </header>
   <!--Header section end-->
   @section('content')
   @show  

   {{Visitor::log()}}

   <!--Footer section start-->
   <footer class="footer-section section" style="background:#212121">
     @include('_partial.frontend.footer')

   </footer>
   <!--Footer section end-->
 </div>

 <!-- Placed js at the end of the document so the pages load faster -->

 <!-- All jquery file included here -->
 <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyDAq7MrCR1A2qIShmjbtLHSKjcEIEBEEwM"></script>
 <script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('frontend/assets/js/plugins.js')}}"></script>
 <script src="{{asset('frontend/assets/js/map-place.js')}}"></script>
 <script src="{{asset('assets/node_modules/toast-master/js/jquery.toast.js')}}"></script>
 <script src="{{ asset('js/parsley.min.js') }}"></script>
 <script src="{{asset('frontend/assets/js/main.js')}}"></script>

 @if (get_option('pop_up')=='ON' && !Cache::has('contact'))
 <script type="text/javascript">
  $(document).ready(function() {
    $("#myModal").modal('show');
  });
</script>
@endif   

<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
</script>

<script>
  $('#mc_form').on('submit', function(e) {
    e.preventDefault();
    $(".parsley-required").remove();
    var submit_url = $('#mc_form').attr('action');
        //Start Ajax
        var formData = new FormData($("#mc_form")[0]);
        $.ajax({
          url: submit_url,
          type: 'POST',
          data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
              if(data.status == 'danger'){
                $.toast({
                  heading: 'Success',
                  text: data.message,
                  position: 'toast-bottom-center',
                  loaderBg:'#ff6849',
                  icon: 'success',
                  hideAfter: 3500

                });
                
              }
              else {
                $.toast({
                  heading: 'Success',
                  text: data.message,
                  position: 'toast-bottom-center',
                  loaderBg:'#ff6849',
                  icon: 'success',
                  hideAfter: 3500

                });
                $("#mc_form")[0].reset();
                if (data.goto) {
                 setTimeout(function(){

                   window.location.href=data.goto;
                 },2500);
               }
             }
           },
           error: function(data) {
            var jsonValue = $.parseJSON(data.responseText);
            const errors = jsonValue.errors;
            if (errors) {
              var i = 0;
              $.each(errors, function(key, value) {
                const first_item = Object.keys(errors)[i]
                const message = errors[first_item][0];

                if ($('#' + first_item).length>0) {

                  $('#' + first_item).parsley().removeError('required', {
                    updateClass: true
                  });
                  $('#' + first_item).parsley().addError('required', {
                    message: value,
                    updateClass: true
                  });
                }
                        // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                        $.toast({
                          heading: 'Error',
                          text: value,
                          position: 'toast-bottom-center',
                          loaderBg:'#ff6849',
                          icon: 'error',
                          hideAfter: 3500

                        });
                        i++;
                      });
            } else {
             $.toast({
              heading: 'Error',
              text: jsonValue.message,
              position: 'toast-bottom-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 3500

            });

           }
           $('#submit').show();
           $('#submiting').hide();
         }
       });
      });
    </script>

    <script>
    $('#modal').on('submit', function(e) {
    e.preventDefault();
    $(".parsley-required").remove();
    var submit_url = $('#modal').attr('action');
        //Start Ajax
        var formData = new FormData($("#modal")[0]);
        $.ajax({
          url: submit_url,
          type: 'POST',
          data: formData,
            contentType: false, // The content type used when sending data to the server.
            cache: false, // To unable request pages to be cached
            processData: false,
            dataType: 'JSON',
            success: function(data) {
              if(data.status == 'danger'){
                $.toast({
                  heading: 'Success',
                  text: data.message,
                  position: 'toast-bottom-center',
                  loaderBg:'#ff6849',
                  icon: 'success',
                  hideAfter: 3500

                });
                
              }
              else {
                $.toast({
                  heading: 'Success',
                  text: data.message,
                  position: 'toast-bottom-center',
                  loaderBg:'#ff6849',
                  icon: 'success',
                  hideAfter: 3500

                });
                $("#modal")[0].reset();
                $("#myModal").modal('close');
                if (data.goto) {
                 setTimeout(function(){

                   window.location.href=data.goto;
                 },2500);
               }
             }
           },
           error: function(data) {
            var jsonValue = $.parseJSON(data.responseText);
            const errors = jsonValue.errors;
            if (errors) {
              var i = 0;
              $.each(errors, function(key, value) {
                const first_item = Object.keys(errors)[i]
                const message = errors[first_item][0];

                if ($('#' + first_item).length>0) {

                  $('#' + first_item).parsley().removeError('required', {
                    updateClass: true
                  });
                  $('#' + first_item).parsley().addError('required', {
                    message: value,
                    updateClass: true
                  });
                }
                        // $('#' + first_item).after('<div class="ajax_error" style="color:red">' + value + '</div');
                        $.toast({
                          heading: 'Error',
                          text: value,
                          position: 'toast-bottom-center',
                          loaderBg:'#ff6849',
                          icon: 'error',
                          hideAfter: 3500

                        });
                        i++;
                      });
            } else {
             $.toast({
              heading: 'Error',
              text: jsonValue.message,
              position: 'toast-bottom-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 3500

            });

           }
           $('#submit').show();
           $('#submiting').hide();
         }
       });
      });
  
    </script>
    <!-- /core JS files -->
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d9f0d6efbec0f2fe3b90e56/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    @stack('scripts')

  </body>

  </html>
