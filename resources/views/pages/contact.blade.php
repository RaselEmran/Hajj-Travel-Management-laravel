@extends('layouts.frontend', ['title' => _lang('Contact')])
@push('css')
@endpush

@section('content')

  <!--Page Banner Section start-->
    <div class="page-banner-section section" style="background-image: url({{$contactinfo?asset('storage/pages/'.$contactinfo->contact_image):''}})">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-banner-title">{{$contactinfo?$contactinfo->contact_heading:null}}</h1>
                    <ul class="page-breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">{{$contactinfo?$contactinfo->contact_heading:null}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Page Banner Section end-->

    <!--New property section start-->
    <div class="contact-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
        <div class="container">
            <div class="row">
                
                <div class="col-12 mb-50">
               
                      {!! $contactinfo?$contactinfo->contact_map:null!!}
              
                </div>
                
                <div class="col-12">
                    <div class="row">
                        
                        <div class="contact-info col-md-4 col-12 mb-30" data-aos="zoom-in-down"data-aos-duration="1000">
                            <i class="pe-7s-map"></i>
                            <h4>address</h4>
                            <p>{{$contactinfo?$contactinfo->contact_address:null}}</p>
                        </div>
                        
                        <div class="contact-info col-md-4 col-12 mb-30" data-aos="zoom-in-down" data-aos-duration="2000">
                            <i class="pe-7s-phone"></i>
                            <h4>Phone</h4>
                            {!! $contactinfo?$contactinfo->contact_phone:null!!}
                        </div>
                        
                        <div class="contact-info col-md-4 col-12 mb-30" data-aos="zoom-in-down" data-aos-duration="1000">
                            <i class="pe-7s-global"></i>
                            <h4>Website</h4>
                            <p>{!! $contactinfo?$contactinfo->contact_email:null  !!}</p>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!--New property section end-->

    <!--New property section start-->
    <div class="contact-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container">
           
            <!--Section Title start-->
            <div class="row">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Leave a Message</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                
                <div class="contact-form-wrap col-12">
                    <div class="contact-form">
                        <form id="content_form" action="{{ route('post_contact') }}" method="post">
                            <div class="row">
                                <div class="col-md-6 col-12 mb-30"><input name="name" id="name" type="text" placeholder="Name"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="email" id="email" type="email" placeholder="Email"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="phone" id="phone" type="text" placeholder="Phone"></div>
                                <div class="col-md-6 col-12 mb-30"><input name="subject" type="text" placeholder="Subject" id="subject"></div>
                                <div class="col-12 mb-30"><textarea name="messege" id="messege" placeholder="Message"></textarea></div>
                                <div class="col-12 text-center"><button class="btn" type="submit" id="submit">submit</button></div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
            <img src="{{asset('img/load.gif')}}" alt="" style="position: absolute;top: 250%;left: 50%;z-index: 1; display: none;" id="submiting">    
            </div>
        </div>
    </div>
    <!--New property section end-->
@stop
@push('scripts')
<script>
    $('#content_form').on('submit', function(e) {
        e.preventDefault();
        $('#submit').hide();
        $('#submiting').show();
        $(".ajax_error").remove();
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