@php
$route = 'admin.service-slider.';
@endphp
@extends('layouts.app', ['title' => _lang('service-slider'), 'modal' => 'lg'])
@push('admin.css')
<link href="{{asset('assets/node_modules/summernote/dist/summernote.css')}}" rel="stylesheet" />
@endpush
@section('pageheader')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{_lang('service-slider')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('service-slider')}}</li>
            </ol>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
@stop
@section('content')
@if(isset($model))
{!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
@else
{!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
@endif


<div class="row">

   <div class="col-md-12">
    <div class="form-group">
        {{ Form::label('image', _lang('image') , ['class' => 'col-form-label']) }}
        <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{isset($model)?asset('storage/service/slider/'.$model->image):''}}" />
    </div>
    @if(isset($model) && isset($model->image))
    <input type="hidden" name="oldimage" value="{{$model->image}}">
    @endif

</div>
<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('title1', _lang('title1') , ['class' => 'col-form-label required']) }}
        {{ Form::text('title1', Null, ['class' => 'form-control', 'placeholder' =>  _lang('title1'), 'required' => '']) }}
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
      {{ Form::label('sub_title1', _lang('sub_title1') , ['class' => 'col-form-label required']) }}
      {{ Form::text('sub_title1', Null, ['class' => 'form-control', 'placeholder' =>  _lang('sub_title1'), 'required' => '']) }}
  </div>
</div>

<div class="col-md-6">
    <div class="form-group">
      {{ Form::label('title2', _lang('title2') , ['class' => 'col-form-label required']) }}
      {{ Form::text('title2', Null, ['class' => 'form-control', 'placeholder' =>  _lang('title2'), 'required' => '']) }}
  </div>
</div>

<div class="col-md-6">
    <div class="form-group">
      {{ Form::label('sub_title2', _lang('sub_title2') , ['class' => 'col-form-label required']) }}
      {{ Form::text('sub_title2', Null, ['class' => 'form-control', 'placeholder' =>  _lang('sub_title2'), 'required' => '']) }}
  </div>
</div>

</div>

<div class="form-group row">
    <div class="col-lg-4 offset-lg-4">
      <button type="submit" class="btn btn-block btn-lg btn-info"  id="submit">{{isset($model)? _lang('Update'):_lang('Create')}}<i class="icon-arrow-right14 position-right"></i></button>
      <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{__('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
  </div>
</div>


{!! Form::close() !!}
<!-- /basic initialization -->
@stop
@push('admin.scripts')

<script src="{{asset('js/package.js')}}"></script>

<!-- start - This is for export functionality only -->
@endpush