@extends('layouts.frontend', ['title' => _lang('Package-Details')])
@push('css')
@endpush

@section('content')
<img src="{{asset('img/load.gif')}}" alt="" style="position: absolute;bottom: -20%;left: 50%;z-index: 1;display: none;" id="submiting">
<!--Page Banner Section start-->
<div class="page-banner-section section" style="    background-image: url({{asset('storage/packege/'.$package->banner)}})">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1 class="page-banner-title">{{strtoupper($package->name)}}</h1>
        <ul class="page-breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">{{$package->name}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!--Page Banner Section end-->
<!--Agent Section start-->
<div class="agent-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
  <div class="container">

    <div class="row row-25">


      <div class="col-lg-8">
        <table class="table table-bordered pb-8">
         <thead>
           <tr>
             <th>Booking Strat:</th>
             <th>{{date('F jS, Y ', strtotime($package->start))}}</th>
             <th><-To-></th>
             <th>{{date('F jS, Y ', strtotime($package->end))}}</th>
           </tr>

           <tr>
             <th>{{$package->option->name}}</th>
             <th>{{$package->duration}} Duration</th>
             <th>Price Per Persion</th>
             <th>{{$package->price}} {{get_option('currency_symbol')}}</th>
           </tr>
         </thead> 
       </table>
       <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">PACKAGE OVERVIEW</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">ITINERARY</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">HOTEL DETAILS</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-faq-tab" data-toggle="pill" href="#pills-faq" role="tab" aria-controls="pills-faq" aria-selected="false">FAQ</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-policy-tab" data-toggle="pill" href="#pills-policy" role="tab" aria-controls="pills-policy" aria-selected="false">POLICY</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" id="pills-rate-tab" data-toggle="pill" href="#pills-rate" role="tab" aria-controls="pills-rate" aria-selected="false">Terms And Condition</a>
        </li>
      </ul>

      <!--     tab details -->
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <!--  first   tab details -->
          <div class="agent-content border p-4">
            <h3 class="title"> Overview: </h3>
            <p class="text-justify">Hajj is one of the five pillars of Islam. At Hajjumrahbd we try our level best to help the pilgrims of holy Makkah & Medinah. We offer affordable hajj packages at a reasonable cost. Our regular / exclusive / custom hajj packages are designed to provide the best experience and satisfaction to Pilgrims or the guest of Allah (SWT). Please check out our list of hajj packages 2017 from Bangladesh.</p>
            <div class="row">
              <div class="col-md-12 col-12 mb-30">
                {!! $package->description !!}
              </div>
            </div>
          </div>
        </div>

        <!--                            secand tab details -->
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

          <div class="border p-4" style="color: black !important">
            {!! $package->itinary !!}
          </div>
        </div>

        <!--  three tab details -->
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

          <div class="border p-4">
            {!! $package->hotel !!}
          </div>
        </div>

        <!--  four tab details -->
        <div class="tab-pane fade" id="pills-faq" role="tabpanel" aria-labelledby="pills-faq-tab">
          <div class="border p-4">
            <div class="row">
              @foreach ($package->question as $ques)
              @if ($ques->ans)
             
              <ul>
                <li> <i data-brackets-id="4234" class="fa fa-share" aria-hidden="true"></i> &nbsp; <span>জিজ্ঞাসাঃ {{$ques->ques}}</span></li>
                <li><span style="color: #008000;">উত্তরঃ {{$ques->ans}}</span></li>
              </ul>
               @endif
              @endforeach

              <hr>
              <div class="col-12">
                <p ><b style="color: #f00">Ask Question </b><span style="color: #008000;">
                  Please Fill Up and Submit
                </span> </p>
                <form action="{{ route('question') }}" id="question" method="post">
                  <div class="form-group">

                    <input type="text" class="form-control" name="qname" id="qname" placeholder="Name">
                    <input type="hidden" name="package_id" value="{{$package->id}}">
                  </div>
                  <div class="form-group">

                    <input type="text" class="form-control" name="qemail" id="qemail" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <textarea name="ques" id="ques" cols="4" rows="4" placeholder="Question"></textarea>
                  </div>
                   <div class="col-12 text-center"><button class="btn" id="submit" type="submit">Ask</button></div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>

        <!--  five tab details -->
        <div class="tab-pane fade" id="pills-policy" role="tabpanel" aria-labelledby="pills-policy-tab">
          <div class="border p-4">
            {!! $package->policy !!}
          </div>
        </div>

        <!--  six tab details -->
        <div class="tab-pane fade" id="pills-rate" role="tabpanel" aria-labelledby="pills-rate-tab">
          <div class="border p-4">
            {!! $package->term_condition !!}
          </div>
        </div>
      </div>
      @php
      $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/details/".$package->id;

      @endphp

      <div class="sharethis-inline-share-buttons st-left st-has-labels  st-inline-share-buttons st-animated" id="st-1" style="margin-top: 10px">
        <div class="st-btn st-first" data-network="facebook" style="display: inline-block; color: #fff">
          <a href="javascript:void(0)"  onclick="javascript:genericSocialShare('https://www.facebook.com/sharer/sharer.php?u=<?php echo $actual_link; ?>')">
            <img src="https://platform-cdn.sharethis.com/img/facebook.svg">
            <span class="st-label">Share</span>
          </a>
        </div>
        <div class="st-btn" data-network="twitter" style="display: inline-block; color: #fff">
          <a href="javascript:void(0)"  onclick="javascript:genericSocialShare('https://twitter.com/home?status=<?php echo $actual_link; ?>')">
            <img src="https://platform-cdn.sharethis.com/img/twitter.svg">
            <span class="st-label">Tweet</span>
          </a>
        </div>
        <div class="st-btn" data-network="pinterest" style="display: inline-block;color: #fff">
          <a href="javascript:void(0)" onclick="javascript:genericSocialShare('http://pinterest.com/pin/create/button/?url=<?php echo $actual_link; ?>]')">
            <img src="https://platform-cdn.sharethis.com/img/pinterest.svg">
            <span class="st-label">Pin</span>
          </a>
        </div>

      </div>


    </div>

    <!--Agent Content-->
    <div class="col-lg-4">
      <h3 class="pt-15 pb-10">Book Now</h3>
      <div class="contact-form-wrap">
        <div class="contact-form">
          <form id="content_form" action="{{ route('book') }}" method="post">
            <div class="row">
              <div class="col-12 mb-10">
                <input name="name" id="name" type="text" placeholder="Name">
                <input type="hidden" name="package_id" value="{{$package->id}}">
              </div>

              <div class="col-12 mb-10">
                <input name="email" id="email" type="email" placeholder="Email">
              </div>

              <div class=" col-12 mb-10">
                <input name="phone" id="phone" type="text" placeholder="Phone">
              </div>

              <div class=" col-12 mb-10">
                <input name="subject" id="subject" type="text" placeholder="Subject">
              </div>

              <div class=" col-12 mb-10">
                <textarea name="messege" id="messege" cols="30" rows="10" class="" resize="false" placeholder="Messege"></textarea>
              </div>

              <div class="col-12 text-center"><button class="btn" id="submit" type="submit">submit</button></div>
            </div>
          </form>
          <p class="form-messege"></p>
        </div>
      </div>
    </div>

  </div>

</div>
</div>
<!--Agent Section end-->
@stop
@push('scripts')
<script>
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

    $('#question').on('submit', function(e) {
    e.preventDefault();
    $('#submit').hide();
    $('#submiting').show();
    $(".parsley-required").remove();
    var submit_url = $('#question').attr('action');
        //Start Ajax
        var formData = new FormData($("#question")[0]);
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
                  $("#question")[0].reset();
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
      function genericSocialShare(url){
        window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
        return true;
      }

    </script>
    <!-- start - This is for export functionality only -->
    @endpush