@extends('layouts.app', ['title' => _lang('setting'), 'modal' => false])
@push('admin.css')

@endpush
@section('pageheader')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Dashboard </h4>
  </div>
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{_lang('setting')}}</li>
      </ol>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->

@stop
@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <h4 class="card-title">System Setting</h4>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item"> 
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
              <span class="hidden-sm-up"><i class="ti-home"></i></span> 
              <span class="hidden-xs-down">{{_lang('setting')}}</span>
            </a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-user"></i></span> 
              <span class="hidden-xs-down">{{_lang('logo')}}</span>
            </a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-email"></i></span> 
              <span class="hidden-xs-down">{{_lang('messege')}}</span>
            </a> 
          </li>

            <li class="nav-item"> 
            <a class="nav-link" id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-email"></i></span> 
              <span class="hidden-xs-down">{{_lang('email')}}</span>
            </a> 
          </li>
        </ul>
        <!-- Tab panes -->
        {!! Form::open(['route' => 'admin.setting', 'id' => 'content_form','files' => true, 'method' => 'POST']) !!}
        <div class="tab-content tabcontent-border" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
             <div class="col-md-6">
               {{ Form::label('company_name', _lang('company_name') , ['class' => 'col-form-label ']) }}
               {{ Form::text('company_name', get_option('company_name'), ['class' => 'form-control', 'placeholder' => _lang('company_name')]) }}
             </div>
             <div class="col-md-6">
               {{ Form::label('site_title', _lang('title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('site_title', get_option('site_title'), ['class' => 'form-control', 'placeholder' => _lang('title')]) }}
             </div>
             <div class="col-md-6">
               {{ Form::label('email', _lang('email') , ['class' => 'col-form-label ']) }}
               {{ Form::text('email', get_option('email'), ['class' => 'form-control', 'placeholder' => _lang('email')]) }}
             </div>
             <div class="col-md-6">
               {{ Form::label(_lang('phone'), _lang('phone') , ['class' => 'col-form-label ']) }}
               {{ Form::text('phone',get_option('phone'), ['class' => 'form-control', 'placeholder' => _lang('phone')]) }}
             </div>
             <div class="col-md-6">
               {{ Form::label('alt_phone', _lang('alernative_phone') , ['class' => 'col-form-label ']) }}
               {{ Form::text('alt_phone', get_option('alt_phone'), ['class' => 'form-control', 'placeholder' => _lang('alernative_phone')]) }}
             </div>
             <div class="col-md-6">
               {{ Form::label('start_date', _lang('starting_date') , ['class' => 'col-form-label ']) }}
               {{ Form::text('start_date', get_option('start_date'), ['class' => 'form-control date', 'id'=>'mdate', 'placeholder' => _lang('starting_date')]) }}
             </div>
             <div class="col-md-6">
               {{ Form::label('timezone', _lang('timezone') , ['class' => 'col-form-label ']) }}
               <select name="timezone" class="form-control select">
                @foreach (tz_list() as $key=> $time)
                <option  value="{{$time['zone']}}">{{ $time['diff_from_GMT'] . ' - ' . $time['zone']}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              {{ Form::label('language', _lang('language') , ['class' => 'col-form-label ']) }}
              <select name="language" class="form-control select">
                {!! load_language( get_option('language') ) !!}
              </select>
            </div>
            <div class="col-md-4">
             {{ Form::label('land_mark', _lang('land_mark') , ['class' => 'col-form-label']) }}
             {{ Form::text('land_mark', get_option('land_mark'), ['class' => 'form-control', 'placeholder' => _lang('land_mark')]) }}
           </div>

            <div class="col-md-4">
             {{ Form::label('currency_symbol', _lang('currency_symbol') , ['class' => 'col-form-label']) }}
             {{ Form::text('currency_symbol', get_option('currency_symbol'), ['class' => 'form-control', 'placeholder' => _lang('currency_symbol')]) }}
           </div>
           <div class="col-md-4">
              <div class="form-group">
             {{ Form::label('pop_up', _lang('pop_up') , ['class' => 'col-form-label']) }}
               {{ Form::select('pop_up',['ON' => 'ON','Off'=>'Off'],  get_option('pop_up'), ['class' => 'form-control select', 'data-placeholder' =>  _lang('pop_up'), 'required' => '', 'data-parsley-errors-container' => '#parsley_district_error_area']) }}
                <span id="parsley_district_error_area"></span>
           </div>
           </div>
           <div class="col-md-12">
            {{ Form::label('address', _lang('address') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('address', get_option('address'), ['class' => 'form-control', 'rows'=>3]) }}
          </div>
        </div>
      </div>
      <div class="tab-pane fade p-20" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
         <div class="col-md-6">
           {{ Form::label('logo', _lang('logo') , ['class' => 'col-form-label']) }}
           <input type="file" name="logo" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('storage/logo/'.get_option('logo'))}}" />
           @if(get_option('logo'))
           <input type="hidden" name="oldLogo" value="{{get_option('logo')}}">
           @endif

         </div>

         <div class="col-md-6">
           {{ Form::label('favicon', _lang('favicon') , ['class' => 'col-form-label']) }}
           <input type="file" name="favicon" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('storage/favicon/'.get_option('favicon'))}}" />
           @if(get_option('favicon'))
           <input type="hidden" name="oldfavicon" value="{{get_option('favicon')}}">
           @endif
         </div>

       </div>
     </div>
     <div class="tab-pane fade p-20" id="contact" role="tabpanel" aria-labelledby="contact-tab">
       <div class="row">
        <div class="col-md-6">
         {{ Form::label('fb', _lang('facebook_link') , ['class' => 'col-form-label ']) }}
         {{ Form::text('fb', get_option('fb'), ['class' => 'form-control ', 'placeholder' => _lang('facebook_link')]) }}
       </div>
       <div class="col-md-6">
         {{ Form::label('twiter', _lang('twiter') , ['class' => 'col-form-label ']) }}
         {{ Form::text('twiter', get_option('twiter'), ['class' => 'form-control ', 'placeholder' => _lang('twiter')]) }}
       </div>

       <div class="col-md-6">
         {{ Form::label('youtube', _lang('youtube') , ['class' => 'col-form-label ']) }}
         {{ Form::text('youtube', get_option('youtube'), ['class' => 'form-control ', 'placeholder' => _lang('youtube')]) }}
       </div>

       <div class="col-md-6">
         {{ Form::label('linkedin', _lang('linkedin') , ['class' => 'col-form-label ']) }}
         {{ Form::text('linkedin', get_option('linkedin'), ['class' => 'form-control ', 'placeholder' => _lang('linkedin')]) }}
       </div>
     </div>
   </div>
   <div class="tab-pane fade p-20" id="profile1" role="tabpanel" aria-labelledby="profile1-tab">

       <div class="row">
         <div class="col-md-6">
         {{ Form::label('mail_type', _lang('mail_type') , ['class' => 'col-form-label ']) }}
         {{Form::select('mail_type', ['mail' => 'Php Mail', 'smtp' => 'Smtp'], Null, ['class' => 'form-control select','style'=>'width:100%','id'=>'mail_type' ])}}
       </div>
        <div class="col-md-6">
         {{ Form::label('from_email', _lang('from_email') , ['class' => 'col-form-label ']) }}
         {{ Form::text('from_email', get_option('from_email'), ['class' => 'form-control ', 'placeholder' => _lang('from_email')]) }}
       </div>
       <div class="col-md-6">
         {{ Form::label('from_name', _lang('from_name') , ['class' => 'col-form-label ']) }}
         {{ Form::text('from_name', get_option('from_name'), ['class' => 'form-control ', 'placeholder' => _lang('from_name')]) }}
       </div>

       <div class="col-md-6">
         {{ Form::label('smtp_host', _lang('smtp_host') , ['class' => 'col-form-label ']) }}
         {{ Form::text('smtp_host', get_option('smtp_host'), ['class' => 'form-control smtp ', 'placeholder' => _lang('smtp_host')]) }}
       </div>

       <div class="col-md-6">
         {{ Form::label('smtp_port', _lang('smtp_port') , ['class' => 'col-form-label ']) }}
         {{ Form::text('smtp_port', get_option('smtp_port'), ['class' => 'form-control smtp ', 'placeholder' => _lang('smtp_port')]) }}
       </div>

        <div class="col-md-6">
         {{ Form::label('smtp_username', _lang('smtp_username') , ['class' => 'col-form-label ']) }}
         {{ Form::text('smtp_username', get_option('smtp_username'), ['class' => 'form-control smtp ', 'placeholder' => _lang('smtp_username')]) }}
       </div>

        <div class="col-md-6">
         {{ Form::label('smtp_password', _lang('smtp_password') , ['class' => 'col-form-label ']) }}
         {{ Form::text('smtp_password', get_option('smtp_password'), ['class' => 'form-control smtp ', 'placeholder' => _lang('smtp_password')]) }}
       </div>

          <div class="col-md-6">
            {{ Form::label('smtp_encryption', _lang('SMTP Encryption') , ['class' => 'col-form-label ']) }}
            {{Form::select('smtp_encryption', ['ssl' => 'SSL', 'tls' => 'TLS'], Null, ['class' => 'form-control select','style'=>'width:100%' ])}}
       </div>
     </div>

   </div>
 </div>
 <div class="text-right mr-2">
  <button type="submit" class="btn btn-primary"  id="submit">{{_lang('update_setting')}}</button>
  <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{ _lang('processing') }} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

</div>
{!!Form::close()!!}
</div>
</div>
</div>
</div>
<!-- Row -->
<!-- /basic initialization -->
@stop
@push('admin.scripts')
<script src="{{asset('js/setting.js')}}"></script>
<script type="text/javascript">
if($("#mail_type").val() != "smtp"){
  $(".smtp").prop("disabled",true);
}
$(document).on("change","#mail_type",function(){
  if( $(this).val() != "smtp" ){
    $(".smtp").prop("disabled",true);
  }else{
    $(".smtp").prop("disabled",false);
  }
});

</script>
<!-- start - This is for export functionality only -->
@endpush