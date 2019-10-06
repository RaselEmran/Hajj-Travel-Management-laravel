@php
$route = 'admin.news.';
@endphp
@if(isset($model))
{!! Form::model($model, ['route' => [$route.'update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT', 'files' => true]) !!}
@else
{!! Form::open(['route' => $route.'store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}
@endif
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">{{isset($model) ? _lang('update') : _lang('Create')}} <span class="text-danger">*</span> <small> {{ _lang('required') }} </small></legend>
<div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('title', _lang('title') , ['class' => 'col-form-label required']) }}
                {{ Form::text('title', Null, ['class' => 'form-control', 'placeholder' =>  _lang('title'), 'required' => '']) }}
            </div>
        </div>

        <div class="col-lg-12">
            <div class="form-group">
             {{ Form::label('category_id', _lang('Category') , ['class' => 'col-form-label']) }}
             {{ Form::select('category[id]',$category,null, ['class' => 'form-control select', 'data-placeholder' =>  _lang('Category'), 'data-parsley-errors-container' => '#client_category_error']) }}
             <span id="client_category_error"></span>
         </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('short_content', _lang('short_content') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('short_content', Null, ['class' => 'form-control', 'placeholder' =>  _lang('short_content'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
     </div>

     <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('news_content', _lang('news_content') , ['class' => 'col-form-label']) }}
            {{ Form::textarea('news_content', Null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('news_content'), 'style' => 'resize: none;', 'rows' => '3']) }}
        </div>
     </div>
     <div class="col-lg-12">
        <div class="form-group">
            {{ Form::label('date', _lang('date') , ['class' => 'col-form-label required']) }}
            {{ Form::text('date', Null, ['class' => 'form-control', 'id'=>'mdate', 'placeholder' =>  _lang('date'), 'required' => '']) }}
        </div>
     </div>

     <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('photo', _lang('photo') , ['class' => 'col-form-label']) }}
            <input type="file" name="photo" id="photo" class="dropify" data-default-file="{{isset($model)?asset('storage/news/'.$model->photo):''}}" />
        </div>
        @if(isset($model) && isset($model->photo))
        <input type="hidden" name="oldphoto" value="{{$model->photo}}">
        @endif

    </div>

    <div class="col-md-12">
        <div class="form-group">
            {{ Form::label('banner', _lang('banner') , ['class' => 'col-form-label']) }}
            <input type="file" name="banner" id="banner" class="dropify" data-default-file="{{isset($model)?asset('storage/news/'.$model->banner):''}}" />
        </div>
        @if(isset($model) && isset($model->banner))
        <input type="hidden" name="oldbanner" value="{{$model->banner}}">
        @endif

    </div>

    <div class="col-md-12">
     {{ Form::label('meta_title', _lang('meta_title') , ['class' => 'col-form-label ']) }}
     {{ Form::text('meta_title', null, ['class' => 'form-control', 'placeholder' => _lang('meta_title')]) }}
 </div>

 <div class="col-md-12">
    {{ Form::label('meta_keyword', _lang('meta_keyword') , ['class' => 'col-form-label']) }}
    {{ Form::textarea('meta_keyword', null, ['class' => 'form-control', 'rows'=>3]) }}
</div>

<div class="col-md-12">
    {{ Form::label('meta_description', _lang('meta_description') , ['class' => 'col-form-label']) }}
    {{ Form::textarea('meta_description', null, ['class' => 'form-control', 'rows'=>3]) }}
</div>
</div>

<div class="form-group row">
    <div class="col-lg-4 offset-lg-4">
        {{ Form::submit(isset($model) ? _lang('update'):_lang('create'), ['class' => 'btn btn-primary ml-3l', 'id' => 'submit']) }}
        <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}"></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"> {{  _lang('close') }} </button>
    </div>
</div>
</fieldset>
{!! Form::close() !!}
