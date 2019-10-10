@extends('layouts.app', ['title' => _lang('pages'), 'modal' => false])
@push('admin.css')
<link href="{{asset('assets/node_modules/summernote/dist/summernote.css')}}" rel="stylesheet" />
@endpush
@section('pageheader')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">{{_lang('pages')}} </h4>
  </div>
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{_lang('pages')}}</li>
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

        <h4 class="card-title">Page Information</h4>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item"> 
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
              <span class="hidden-sm-up"><i class="ti-home"></i></span> 
              <span class="hidden-xs-down">{{_lang('home')}}</span>
            </a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-user"></i></span> 
              <span class="hidden-xs-down">{{_lang('about')}}</span>
            </a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-email"></i></span> 
              <span class="hidden-xs-down">{{_lang('contact')}}</span>
            </a> 
          </li>

          <li class="nav-item"> 
            <a class="nav-link" id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-email"></i></span> 
              <span class="hidden-xs-down">{{_lang('news')}}</span>
            </a> 
          </li>

            <li class="nav-item"> 
            <a class="nav-link" id="profile2-tab" data-toggle="tab" href="#profile2" role="tab" aria-controls="profile2" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-email"></i></span> 
              <span class="hidden-xs-down">{{_lang('Hajj')}}</span>
            </a> 
          </li>

            <li class="nav-item"> 
            <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile3" aria-selected="false">
              <span class="hidden-sm-up"><i class="ti-email"></i></span> 
              <span class="hidden-xs-down">{{_lang('umrah')}}</span>
            </a> 
          </li>
        </ul>
        <!-- Tab panes -->
        {!! Form::open(['route' => 'admin.pages.store', 'id' => 'content_form','files' => true, 'method' => 'POST']) !!}
        <div class="tab-content tabcontent-border" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
             <div class="col-md-12">
               {{ Form::label('meta_title', _lang('meta_title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('meta_title', $homeinfo?$homeinfo->meta_title:null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
             </div>
     
           <div class="col-md-12">
            {{ Form::label('meta_keyword', _lang('meta_keyword') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('meta_keyword', $homeinfo?$homeinfo->meta_keyword:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
            {{ Form::label('meta_description', _lang('meta_description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('meta_description', $homeinfo?$homeinfo->meta_description:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>


        </div>
      </div>
      <div class="tab-pane fade p-20" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="row">
         <div class="col-md-6">
           {{ Form::label('about_banner', _lang('about_banner') , ['class' => 'col-form-label']) }}
           <input type="file" name="about_banner" id="input-file-now-custom-1" class="dropify" data-default-file="{{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_banner):''}}" />
           @if($aboutinfo && isset($aboutinfo->about_banner))
           <input type="hidden" name="old_about_banner" value="{{$aboutinfo->about_banner}}">
           @endif

         </div>

         <div class="col-md-6">
           {{ Form::label('about_image', _lang('about_image') , ['class' => 'col-form-label']) }}
           <input type="file" name="about_image" id="input-file-now-custom-1" class="dropify" data-default-file="{{$aboutinfo?asset('storage/pages/'.$aboutinfo->about_image):''}}" />
           @if($aboutinfo && isset($aboutinfo->about_image))
           <input type="hidden" name="old_about_image" value="{{$aboutinfo->about_image}}">
           @endif
         </div>

           <div class="col-md-12">
            {{ Form::label('about_content', _lang('about_content') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('about_content', $aboutinfo?$aboutinfo->about_content:null, ['class' => 'form-control summernote', 'rows'=>3]) }}
          </div>

              <div class="col-md-12">
               {{ Form::label('about_meta_title', _lang('about_meta_title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('about_meta_title', $aboutinfo?$aboutinfo->about_meta_title:null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
             </div>

          <div class="col-md-12">
            {{ Form::label('about_meta_keyword', _lang('about_meta_keyword') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('about_meta_keyword', $aboutinfo?$aboutinfo->about_meta_keyword:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
            {{ Form::label('about_meta_description', _lang('about_meta_description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('about_meta_description', $aboutinfo?$aboutinfo->about_meta_description:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>



       </div>
     </div>
     <div class="tab-pane fade p-20" id="contact" role="tabpanel" aria-labelledby="contact-tab">
       <div class="row">

          <div class="col-md-12">
           {{ Form::label('contact_image', _lang('contact_image') , ['class' => 'col-form-label']) }}
           <input type="file" name="contact_image" id="input-file-now-custom-1" class="dropify" data-default-file="{{$contactinfo?asset('storage/pages/'.$contactinfo->contact_image):''}}" />
           @if($contactinfo && isset($contactinfo->contact_image))
           <input type="hidden" name="old_contact_image" value="{{$contactinfo->contact_image}}">
           @endif
         </div>
        <div class="col-md-12">
         {{ Form::label('contact_heading', _lang('contact_heading') , ['class' => 'col-form-label ']) }}
         {{ Form::text('contact_heading', $contactinfo?$contactinfo->contact_heading:null, ['class' => 'form-control ', 'placeholder' => _lang('contact_heading')]) }}
       </div>
        <div class="col-md-12">
            {{ Form::label('contact_address', _lang('contact_address') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('contact_address', $contactinfo?$contactinfo->contact_address:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>
          <p><a href="https://www.embedgooglemap.net/" target="_blank">Click Here</a> Copy and Pase Here</p>
         <div class="col-md-12">
            {{ Form::label('contact_email', _lang('contact_email') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('contact_email', $contactinfo?$contactinfo->contact_email:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

           <div class="col-md-12">
            {{ Form::label('contact_phone', _lang('contact_phone') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('contact_phone', $contactinfo?$contactinfo->contact_phone:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>
          <div class="col-md-12">
            {{ Form::label('contact_map', _lang('contact_map') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('contact_map', $contactinfo?$contactinfo->contact_map:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
               {{ Form::label('contact_meta_title', _lang('contact_meta_title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('contact_meta_title', $contactinfo?$contactinfo->contact_meta_title:null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
             </div>

          <div class="col-md-12">
            {{ Form::label('contact_meta_keyword', _lang('contact_meta_keyword') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('contact_meta_keyword', $contactinfo?$contactinfo->contact_meta_keyword:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
            {{ Form::label('contact_meta_description', _lang('contact_meta_description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('contact_meta_description', $contactinfo?$contactinfo->contact_meta_description:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>
     </div>
   </div>
   <div class="tab-pane fade p-20" id="profile1" role="tabpanel" aria-labelledby="profile1-tab">

       <div class="row">
            <div class="col-md-12">
             {{ Form::label('news_heading', _lang('news_heading') , ['class' => 'col-form-label ']) }}
             {{ Form::text('news_heading', $newsinfo?$newsinfo->news_heading:null, ['class' => 'form-control ', 'placeholder' => _lang('news_heading')]) }}
           </div>
             <div class="col-md-12">
               {{ Form::label('news_meta_title', _lang('news_meta_title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('news_meta_title', $newsinfo?$newsinfo->news_meta_title:null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
             </div>

          <div class="col-md-12">
            {{ Form::label('news_meta_keyword', _lang('news_meta_keyword') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('news_meta_keyword', $newsinfo?$newsinfo->news_meta_keyword:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
            {{ Form::label('news_meta_description', _lang('news_meta_description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('news_meta_description', $newsinfo?$newsinfo->news_meta_description:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>
     </div>

   </div>

   <div class="tab-pane fade p-20" id="profile2" role="tabpanel" aria-labelledby="profile2-tab">
     <div class="row">
            <div class="col-md-12">
             {{ Form::label('hajj_heading', _lang('hajj_heading') , ['class' => 'col-form-label ']) }}
             {{ Form::text('hajj_heading', $hajjinfo?$hajjinfo->hajj_heading:null, ['class' => 'form-control ', 'placeholder' => _lang('hajj_heading')]) }}
           </div>
             <div class="col-md-12">
               {{ Form::label('hajj_meta_title', _lang('hajj_meta_title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('hajj_meta_title', $hajjinfo?$hajjinfo->hajj_meta_title:null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
             </div>

          <div class="col-md-12">
            {{ Form::label('hajj_meta_keyword', _lang('hajj_meta_keyword') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('hajj_meta_keyword', $hajjinfo?$hajjinfo->hajj_meta_keyword:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
            {{ Form::label('hajj_meta_description', _lang('hajj_meta_description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('hajj_meta_description', $hajjinfo?$hajjinfo->hajj_meta_description:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>
     </div>
   </div>

  <div class="tab-pane fade p-20" id="profile3" role="tabpanel" aria-labelledby="profile3-tab">
    <div class="row">
            <div class="col-md-12">
             {{ Form::label('umrah_heading', _lang('umrah_heading') , ['class' => 'col-form-label ']) }}
             {{ Form::text('umrah_heading', $umrahinfo?$umrahinfo->umrah_heading:null, ['class' => 'form-control ', 'placeholder' => _lang('umrah_heading')]) }}
           </div>
             <div class="col-md-12">
               {{ Form::label('umrah_meta_title', _lang('umrah_meta_title') , ['class' => 'col-form-label ']) }}
               {{ Form::text('umrah_meta_title', $umrahinfo?$umrahinfo->umrah_meta_title:null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
             </div>

          <div class="col-md-12">
            {{ Form::label('umrah_meta_keyword', _lang('umrah_meta_keyword') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('umrah_meta_keyword', $umrahinfo?$umrahinfo->umrah_meta_keyword:null, ['class' => 'form-control', 'rows'=>3]) }}
          </div>

            <div class="col-md-12">
            {{ Form::label('umrah_meta_description', _lang('umrah_meta_description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('umrah_meta_description', $umrahinfo?$umrahinfo->umrah_meta_description:null, ['class' => 'form-control', 'rows'=>3]) }}
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
<script src="{{asset('js/pages.js')}}"></script>

<!-- start - This is for export functionality only -->
@endpush