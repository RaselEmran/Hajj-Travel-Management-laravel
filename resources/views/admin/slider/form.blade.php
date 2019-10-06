@php
$route = 'admin.slider.';
@endphp
@extends('layouts.app', ['title' => _lang('slider'), 'modal' => 'lg'])
@push('admin.css')
<link href="{{asset('assets/node_modules/summernote/dist/summernote.css')}}" rel="stylesheet" />
@endpush
@section('pageheader')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{_lang('slider')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('slider')}}</li>
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

  <div class="col-lg-12">
    <div class="form-group">
        {{ Form::label('title', _lang('title') , ['class' => 'col-form-label required']) }}
        {{ Form::text('title', Null, ['class' => 'form-control', 'placeholder' =>  _lang('title'), 'required' => '']) }}
    </div>
  </div>

  <div class="col-lg-12">
    <div class="form-group">
        {{ Form::label('btn_text', _lang('btn_text') , ['class' => 'col-form-label required']) }}
        {{ Form::text('btn_text', Null, ['class' => 'form-control', 'placeholder' =>  _lang('btn_text'), 'required' => '']) }}
    </div>
  </div>

  <div class="col-lg-12">
    <div class="form-group">
        {{ Form::label('sub_title', _lang('sub_title') , ['class' => 'col-form-label required']) }}
        {{ Form::text('sub_title', Null, ['class' => 'form-control', 'placeholder' =>  _lang('sub_title'), 'required' => '']) }}
    </div>
  </div>


     <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('image', _lang('image') , ['class' => 'col-form-label']) }}
            <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{isset($model)?asset('storage/slider/'.$model->image):''}}" />
        </div>
        @if(isset($model) && isset($model->image))
        <input type="hidden" name="oldimage" value="{{$model->image}}">
        @endif

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