@php
$route = 'admin.faq.';
@endphp
{!! Form::open(['route' => $route.'post_answer', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-lg-12">
        	<input type="hidden" name="id" value="{{$faq->id}}">
            <div class="form-group">
                {{ Form::label('ans', _lang('Answer') , ['class' => 'col-form-label required']) }}

                {{ Form::textarea('ans', $faq->ans, ['class' => 'form-control', 'placeholder' =>  _lang('Answer'), 'style' => 'resize: none;', 'rows' => '3']) }}
        
            </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-lg-4 offset-lg-4">
            {{ Form::submit(isset($model) ? _lang('update'):_lang('Post create'), ['class' => 'btn btn-primary ml-3l', 'id' => 'submit']) }}
            <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}"></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"> {{  _lang('close') }} </button>
        </div>
    </div>


{!! Form::close() !!}