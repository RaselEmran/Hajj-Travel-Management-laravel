@php
$route = 'admin.package.';
@endphp
@extends('layouts.app', ['title' => _lang('package'), 'modal' => 'lg'])
@push('admin.css')
<link href="{{asset('assets/node_modules/summernote/dist/summernote.css')}}" rel="stylesheet" />
@endpush
@section('pageheader')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{_lang('package')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('package')}}</li>
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
 <div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('name', _lang('name') , ['class' => 'col-form-label required']) }}
        {{ Form::text('name', Null, ['class' => 'form-control', 'placeholder' =>  _lang('name'), 'required' => '']) }}
    </div>
</div>
 <div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('duration', _lang('duration') , ['class' => 'col-form-label required']) }}
        {{ Form::text('duration', Null, ['class' => 'form-control', 'placeholder' =>  _lang('duration'), 'required' => '']) }}
    </div>
</div>

 <div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('start', _lang('start_date') , ['class' => 'col-form-label required']) }}
        {{ Form::text('start', Null, ['class' => 'form-control mdate', 'placeholder' =>  _lang('start_date'), 'required' => '']) }}
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        {{ Form::label('end', _lang('end_date') , ['class' => 'col-form-label required']) }}
        {{ Form::text('end', Null, ['class' => 'form-control mdate', 'placeholder' =>  _lang('end_date'), 'required' => '']) }}
    </div>
</div>
</div>
<div class="row">
     <div class="col-lg-6">
            <div class="form-group">
             {{ Form::label('type', _lang('Package Type') , ['class' => 'col-form-label']) }}
              {{ Form::select('type',['Hajj' => 'Hajj','Umrah'=>'Umrah'], null, ['class' => 'form-control select', 'data-placeholder' =>  _lang('Package type'), 'required' => '', 'data-parsley-errors-container' => '#parsley_district_error_area']) }}
             <span id="client_category_error"></span>
         </div>
      </div> 

        <div class="col-lg-6">
            <div class="form-group">
             {{ Form::label('option_id', _lang('Option') , ['class' => 'col-form-label']) }}
             {{ Form::select('option[id]',$option,null, ['class' => 'form-control select', 'data-placeholder' =>  _lang('Option'), 'data-parsley-errors-container' => '#client_category_error']) }}
             <span id="client_category_error"></span>
         </div>
      </div> 
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('description', _lang('description') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('description', Null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('description'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('location', _lang('location') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('location', Null, ['class' => 'form-control', 'placeholder' =>  _lang('location'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('itinary', _lang('itinary') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('itinary', Null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('itinary'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('price', _lang('price') , ['class' => 'col-form-label']) }}
            {{ Form::text('price', Null, ['class' => 'form-control', 'placeholder' =>  _lang('price'), 'required' => '']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('policy', _lang('policy') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('policy', Null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('policy'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('hotel', _lang('hotel') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('hotel', Null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('hotel'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('term_condition', _lang('term_condition') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('term_condition', Null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('term_condition'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('photo', _lang('photo') , ['class' => 'col-form-label']) }}
            <input type="file" name="photo" id="input-file-now-custom-1" class="dropify" data-default-file="{{isset($model)?asset('storage/packege/'.$model->photo):''}}" />
        </div>
        @if(isset($model) && isset($model->photo))
        <input type="hidden" name="oldphoto" value="{{$model->photo}}">
        @endif

    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('banner', _lang('banner') , ['class' => 'col-form-label']) }}
            <input type="file" name="banner" id="input-file-now-custom-1" class="dropify" data-default-file="{{isset($model)?asset('storage/packege/'.$model->banner):''}}" />
            
        </div>
        @if(isset($model) && isset($model->banner))
        <input type="hidden" name="oldbanner" value="{{$model->banner}}">
        @endif
    </div>

</div>
<legend class="badge badge-info pt-1">
    {{_lang('SEO Information')}}
</legend>
<div class="row">
   <div class="col-lg-12">
    <div class="form-group">
        {{ Form::label('meta_title', _lang('meta_title') , ['class' => 'col-form-label']) }}
        {{ Form::text('meta_title', Null, ['class' => 'form-control', 'placeholder' =>  _lang('meta_title'),]) }}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {{ Form::label('meta_keyword', _lang('meta_keyword') , ['class' => 'col-form-label']) }}
        {{ Form::textarea('meta_keyword', Null, ['class' => 'form-control', 'placeholder' =>  _lang('meta_keyword'), 'style' => 'resize: none;', 'rows' => '3']) }}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {{ Form::label('meta_description', _lang('meta_description') , ['class' => 'col-form-label']) }}
        {{ Form::textarea('meta_description', Null, ['class' => 'form-control', 'placeholder' =>  _lang('meta_description'), 'style' => 'resize: none;', 'rows' => '3']) }}
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