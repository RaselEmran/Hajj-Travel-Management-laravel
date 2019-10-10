@extends('layouts.app', ['title' => _lang('translate'), 'modal' => false])
@push('admin.css')

@endpush
@section('pageheader')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">{{_lang('translate')}}</h4>
  </div>
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{_lang('translate')}}</li>
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
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">{{_lang('translate')}}</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => ['admin.language.update',$id], 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
        @method('patch')
        <div class="row">
         @foreach($language as $key=>$lang)
         <div class="col-md-6">
          {{ Form::label('language_name', ucwords($key) , ['class' => 'col-form-label required']) }}
          <input type="text" class="form-control" name="language[{{ str_replace(' ','_',$key) }}]" value="{{ $lang }}" required>
        </div>
        @endforeach
      </div>

      <div class="text-right mt-2">
        <button type="submit" class="btn btn-primary"  id="submit">{{_lang('translation')}}<i class="icon-arrow-right14 position-right"></i></button>
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

<!-- start - This is for export functionality only -->
@endpush