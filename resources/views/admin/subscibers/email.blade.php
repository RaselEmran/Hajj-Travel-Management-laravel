@php
$route = 'admin.subscibers.';
@endphp
{!! Form::open(['route' => $route.'send_mail', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}

    <div class="row">

        <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('subject', _lang('Subject') , ['class' => 'col-form-label required']) }}
                {{ Form::text('subject', Null, ['class' => 'form-control', 'placeholder' =>  _lang('Subject'), 'required' => '']) }}
            </div>
        </div>


        <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('messege', _lang('Messege') , ['class' => 'col-form-label required']) }}

                {{ Form::textarea('messege', null, ['class' => 'form-control', 'placeholder' =>  _lang('Messege'), 'style' => 'resize: none;', 'rows' => '3']) }}
        
            </div>
        </div>

      </div>

      <div class="form-group row">
        <div class="col-lg-4 offset-lg-4">
            {{ Form::submit(isset($model) ? _lang('update'):_lang('Send Mail'), ['class' => 'btn btn-primary ml-3l', 'id' => 'submit']) }}
            <button type="button" class="btn btn-link" id="submiting" style="display: none;" disabled="">{{ _lang('Submiting') }} <img src="{{ asset('ajaxloader.gif') }}" width="120"></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"> {{  _lang('close') }} </button>
        </div>
    </div>


{!! Form::close() !!}