{!! Form::open(['route' => 'admin.language.create', 'id' => 'content_form','files' => true,'class'=>'', 'method' => 'POST']) !!}
<div class="row">
	<div class="col-md-12">
		{{ Form::label('language_name', _lang('language_name') , ['class' => 'col-form-label required']) }}
	   {{ Form::text('language_name', null, ['class' => 'form-control', 'id'=>'language_name', 'placeholder' => _lang('language_name'),'required'=>'']) }}
	</div>
</div>

 <div class="text-right mt-2">
  <button type="submit" class="btn btn-primary btn-lg"  id="submit">{{_lang('create')}}</button>
  <button type="button" class="btn btn-link" id="submiting" style="display: none;">{{ _lang('processing') }} <img src="{{ asset('ajaxloader.gif') }}" width="80px"></button>

 </div>
{!!Form::close()!!}