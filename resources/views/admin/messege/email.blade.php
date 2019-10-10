@php
$route = 'admin.messege.';
@endphp
{!! Form::open(['route' => $route.'reaply', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}

    <div class="row">

         <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('Messege', _lang('Messege') , ['class' => 'col-form-label required']) }}
                {{ Form::textarea('messege', $messege->messege, ['class' => 'form-control', 'placeholder' =>  _lang('Answer'), 'style' => 'resize: none;', 'rows' => '3','readonly'=>'']) }}
            </div>
        </div>

       <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('email', _lang('email') , ['class' => 'col-form-label required']) }}
                {{ Form::text('email', $messege->email, ['class' => 'form-control', 'placeholder' =>  _lang('email'), 'required' => '','readonly'=>'']) }}
            </div>
        </div>
        <div class="col-lg-12">
        	<input type="hidden" name="id" value="{{$messege->id}}">
            <div class="form-group">
                {{ Form::label('reaply', _lang('Reaply') , ['class' => 'col-form-label required']) }}

                {{ Form::textarea('reaply', null, ['class' => 'form-control', 'placeholder' =>  _lang('Reaply'), 'style' => 'resize: none;', 'rows' => '3']) }}
        
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