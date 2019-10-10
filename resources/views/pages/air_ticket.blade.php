@extends('layouts.frontend', ['title' => _lang('Air Ticket')])
@push('css')
<link href="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
 <link href="{{asset('assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
@endpush

@section('content')
<img src="{{asset('img/load.gif')}}" alt="" style="position: absolute;bottom: -40%;left: 50%;z-index: 1;display: none;" id="submiting">

        <!--Page Banner Section start-->
        <div class="page-banner-section section" style="    background-image: url({{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_banner):''}})">
            <div class="container">
                <div class="row">
                    <div class="col" data-aos="zoom-in-up" data-aos-duration="1500" >
                        <h1 class="page-banner-title">Tricket</h1>
                        <ul class="page-breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Tricket</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    <!--New property section start-->
    <div class="contact-section section  pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1> Call Anytime And Get A Quote </h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                
                <div class="contact-form-wrap col-12">
                    <div class="contact-form">
                        <form id="content_form" action="{{ route('book_ticket') }}" method="post">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-30"><input name="name" id="name" type="text" placeholder="Name"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="email" id="email" type="email" placeholder="Email"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="phone" id="phone" type="text" placeholder="Phone"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="departure_city" id="departure_city" type="text" placeholder="Departure City"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="destination_city" id="destination_city" type="text" placeholder="Destination City"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="departure_date" id="departure_date" class="mydatepicker" type="text" placeholder="Departure Date"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="arrival_date" id="arrival_date" class="mydatepicker" type="text" placeholder="Arrival Date"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="numberz_of_persons" id="numberz_of_persons" type="text" placeholder="Number Of Persons"></div>
                                
                                <div class="col-12 mb-30"><textarea name="message" placeholder="Message"></textarea></div>
                                
                                <div class="col-12 text-center"><button class="btn" type="submit">submit</button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->

@stop
@push('scripts')
 <script src="{{asset('assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
 <script>
     jQuery('.mydatepicker, #datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true
     });


 $('#content_form').on('submit', function(e) {
    e.preventDefault();
    $('#submit').hide();
    $('#submiting').show();
    $(".parsley-required").remove();
    var submit_url = $('#content_form').attr('action');
        //Start Ajax
        var formData = new FormData($("#content_form")[0]);
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
                $('#submit').show();
                $('#submiting').hide();
                  $("#content_form")[0].reset();
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
@endpush