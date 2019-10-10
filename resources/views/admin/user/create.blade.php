@extends('layouts.app', ['title' => 'User', 'modal' => false])
@push('admin.css')
<link rel="stylesheet" type="text/css"
href="{{asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css')}}">
<link rel="stylesheet" type="text/css"
href="{{asset('assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css')}}">
@endpush
@section('pageheader')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
  <div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">{{_lang('user')}}</h4>
  </div>
  <div class="col-md-7 align-self-center text-right">
    <div class="d-flex justify-content-end align-items-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{_lang('user')}}</li>
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
        <h4 class="m-b-0 text-white">Other Sample form</h4>
      </div>
      <div class="card-body">
        {!! Form::open(['route' => 'admin.user.create', 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
        <fieldset class="mb-3" id="form_field">
         <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              {{ Form::label('surname', __('Prefix') , ['class' => 'col-form-label required']) }}

              {{ Form::text('surname', null, ['class' => 'form-control', 'placeholder' => 'Dr/Mr/Mrs','required'=>'']) }}
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
              {{ Form::label('first_name', __('First Name') , ['class' => 'col-form-label required']) }}

              {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => __('First Name'),'required'=>'']) }}
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
              {{ Form::label('last_name', __('last Name') , ['class' => 'col-form-label required']) }}

              {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __('last Name'),'required'=>'']) }}
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              {{ Form::label('email', __('Email') , ['class' => 'col-form-label required']) }}

              {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Email'),'required'=>'']) }}
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              {{ Form::label('role', __('Role Name') , ['class' => 'col-form-label required']) }}
              {!! Form::select('role', $roles, null, ['class' => 'form-control select', 'data-placeholder' => 'Select A Role']); !!}
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              {{ Form::label('username', __('Username') , ['class' => 'col-form-label required']) }}

              {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => __('Username'),'required'=>'']) }}
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              {{ Form::label('password', __('Password') , ['class' => 'col-form-label required']) }}

              {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Password'),'required'=>'']) }}
            </div>
          </div>

          <div class="col-md-6">
           <div class="form-group">
            {{ Form::label('password_confirmation', __('Confirm Password') , ['class' => 'col-form-label required']) }}

            {{ Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => __('Confirm Password'),'required'=>'']) }}
          </div>
        </div>
      </div>
      @can('user.create')
      <div class="text-right">
        <button type="submit" class="btn btn-primary"  id="submit">{{__('Create User')}}<i class="icon-arrow-right14 position-right"></i></button>
        <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{__('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

      </div>
      @endcan
      <fieldset class="mb-3" id="form_field">
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
<!-- Row -->
<!-- /basic initialization -->
@stop
@push('admin.scripts')
<script src="{{asset('js/user.js')}}"></script>

<!-- start - This is for export functionality only -->
@endpush