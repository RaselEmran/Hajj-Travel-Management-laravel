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

          {!! Form::open(['route' => 'admin.user.update', 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
          @method('PUT');
          <input type="hidden" name="id" value="{{$user->id}}">
          <fieldset class="mb-3" id="form_field">
           <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                {{ Form::label('surname', _lang('Prefix') , ['class' => 'col-form-label required']) }}

                {{ Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => 'Dr/Mr/Mrs','required'=>'']) }}
              </div>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                {{ Form::label('first_name', _lang('first_name') , ['class' => 'col-form-label required']) }}

                {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => _lang('first_name'),'required'=>'']) }}
              </div>
            </div>

            <div class="col-md-5">
              <div class="form-group">
                {{ Form::label('last_name', _lang('last_name') , ['class' => 'col-form-label required']) }}

                {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => _lang('last_name'),'required'=>'']) }}
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                {{ Form::label('email', _lang('email') , ['class' => 'col-form-label required']) }}

                {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => _lang('email'),'required'=>'']) }}
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                {{ Form::label('role', _lang('role_name') , ['class' => 'col-form-label required']) }}
                {!! Form::select('role', $roles, $user->roles->first()->id, ['class' => 'form-control select', 'data-placeholder' => _lang('select_role')]); !!}
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                {{ Form::label('username', _lang('user_name') , ['class' => 'col-form-label required']) }}

                {{ Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => _lang('user_name'),'required'=>'']) }}
              </div>
            </div>
          </div>
          @can('user.update')
          <div class="text-right">
            <button type="submit" class="btn btn-primary"  id="submit">{{_lang('update')}}<i class="icon-arrow-right14 position-right"></i></button>
            <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{_lang('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

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