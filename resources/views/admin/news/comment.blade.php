@extends('layouts.app', ['title' => _lang('comment'), 'modal' => 'xl'])
@push('admin.css')

@endpush
@section('pageheader')

<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{_lang('comment')}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">{{_lang('comment')}}</li>
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
<p style="padding-bottom: 20px;">Go to the facebook developer section (<a href="https://developers.facebook.com/docs/plugins/comments/" target="_blank">https://developers.facebook.com/docs/plugins/comments/</a>) to get your comment codes.</p>
<div class="card">
    <div class="card-body">
      {!! Form::open(['route' =>'admin.news.post-comment', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
      <div class="row">
         <div class="col-md-12">
            <div class="form-group">
                {{ Form::label('code_body', _lang('code_body') , ['class' => 'col-form-label']) }}
                {{ Form::textarea('code_body', $comment?$comment->code_body:null, ['class' => 'form-control', 'placeholder' =>  _lang('code_body'), 'style' => 'resize: none;', 'rows' => '4']) }}
            </div>
        </div>
    </div>


    <div class="form-group row">
        <div class="col-lg-4 offset-lg-4">
          <button type="submit" class="btn btn-block btn-lg btn-info"  id="submit">{{_lang('Update')}}<i class="icon-arrow-right14 position-right"></i></button>
          <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{__('Processing')}} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>
      </div>
  </div>


  {!! Form::close() !!}

</div>
</div>
<!-- /basic initialization -->
@stop
@push('admin.scripts')
<script src="{{asset('js/news.js')}}"></script>

<!-- start - This is for export functionality only -->
@endpush