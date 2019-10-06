@extends('layouts.app', ['title' => _lang('profile'), 'modal' => false])
@push('admin.css')
@endpush
@section('pageheader')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{_lang('profile')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('profile')}}</li>
            </ol>

        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
@stop
@section('content')
<!-- Basic initialization -->
<!-- Row -->  {!! Form::open(['route' => 'admin.profile', 'id'=>'content_form','files' => true, 'method' => 'POST']) !!}
<div class="row">
    <!-- Column -->

    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30"> 
                    <input type="file" name="image" id="input-file-now-custom-1" class="dropify" data-default-file="{{asset('storage/user/photo/'.auth()->user()->image)}}" />
                </center>
            </div>
            <div>
                <hr> </div>
                <div class="card-body"> 
                    <div class="map-box">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">

                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                    <!--second tab-->
                    <div class="tab-pane active" id="profile" role="tabpanel">
                        <div class="card-body">
                          <div class="row">
                           <input type="hidden" name="id" value="{{$user->id}}">
                           <div class="col-md-2">
                              <div class="form-group">
                                {{ Form::label('surname', _lang('prefix') , ['class' => 'col-form-label required']) }}

                                {{ Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => 'Dr/Mr/Mrs','required'=>'']) }}
                            </div>
                        </div>

                        <div class="col-md-5">
                          <div class="form-group">
                            {{ Form::label('first_name', _lang('first_name') , ['class' => 'col-form-label']) }}

                            {{ Form::text('first_name', $user->first_name, ['class' => 'form-control', 'placeholder' => _lang('first_name')]) }}
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                          {{ Form::label('last_name', _lang('last_name') , ['class' => 'col-form-label']) }}

                          {{ Form::text('last_name', $user->last_name, ['class' => 'form-control', 'placeholder' => _lang('last_name')]) }}
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          {{ Form::label('email', _lang('email') , ['class' => 'col-form-label']) }}

                          {{ Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => _lang('email'),'readonly'=>'']) }}
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('username', _lang('user_name') , ['class' => 'col-form-label']) }}

                        {{ Form::text('username', $user->username, ['class' => 'form-control', 'placeholder' => _lang('user_name'),'readonly'=>'']) }}
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                  {{ Form::label('name', _lang('name') , ['class' => 'col-form-label']) }}

                  {{ Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => _lang('name')]) }}
                </div>
              </div>


              <div class="col-md-6">
                    <div class="form-group">
                    {{ Form::label('phone', _lang('phone') , ['class' => 'col-form-label']) }}

                    {{ Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => _lang('phone')]) }}
                  </div>
                </div>
             </div>
        </div>

        <div class="text-right">
              <button type="submit" class="btn btn-primary"  id="submit">{{_lang('update_profile')}}<i class="icon-arrow-right14 position-right"></i></button>
              <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{_lang('processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

             </div>
             {!!Form::close()!!}
    </div>
    <div class="tab-pane" id="settings" role="tabpanel">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.password', 'class'=>'ajax_form','files' => true, 'method' => 'POST']) !!}
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        {{ Form::label('password', _lang('New Password') , ['class' => 'col-form-label']) }}

                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' =>_lang('New Password')]) }}
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        {{ Form::label('password_confirmation', _lang('Confirm Password') , ['class' => 'col-form-label']) }}

                        {{ Form::password('password_confirmation',  ['class' => 'form-control', 'placeholder' =>_lang('Confirm Password')]) }}
                      </div>
                    </div>
                    </div>
                        <div class="text-right">
                        <button type="submit" class="btn btn-primary"  id="submit">{{_lang('Change Password')}}<i class="icon-arrow-right14 position-right"></i></button>
                        <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{_lang('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

                       </div>
                  {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
</div>
<!-- Column -->
</div>
<!-- Row -->
<!-- /basic initialization -->
@stop
@push('admin.scripts')
<script src="{{asset('js/user.js')}}"></script>


<!-- start - This is for export functionality only -->
@endpush