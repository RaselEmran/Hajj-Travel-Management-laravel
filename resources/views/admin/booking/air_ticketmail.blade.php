<table class="table table-bordered" style="color: #000">
    <thead>
        <tr>
            <th>Name: {{$ticket->name}}</th>
            <th>Email: {{$ticket->email}}</th>
            <th>Phone: {{$ticket->phone}}</th>
        </tr>
        <tr>
            <th>Deparute City: {{$ticket->departure_city}}</th>
            <th>Destination City: {{$ticket->destination_city}}</th>
            <th>Departue Date: {{$ticket->departure_date}}</th>
        </tr>

          <tr>
            <th>Arrival Date: {{$ticket->arrival_date}}</th>
            <th>Number Of Person: {{$ticket->numberz_of_persons}}</th>
            <th>Messege: {{$ticket->message}}</th>
        </tr>
    </thead>
</table>
@php
$route = 'admin.air_ticket.';
@endphp
{!! Form::open(['route' => $route.'send_mail', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => true, 'method' => 'POST']) !!}

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                {{ Form::label('subject', _lang('Subject') , ['class' => 'col-form-label required']) }}
                {{ Form::text('subject', Null, ['class' => 'form-control', 'placeholder' =>  _lang('Subject'), 'required' => '']) }}
            </div>
            <input type="hidden" name="id" value="{{$ticket->id}}">
        </div>


        <div class="col-lg-12">
        	<input type="hidden" name="id" value="{{$ticket->id}}">
            <div class="form-group">
                {{ Form::label('reaply', _lang('Reaply') , ['class' => 'col-form-label required']) }}

                {{ Form::textarea('reaply', null, ['class' => 'form-control summernote', 'placeholder' =>  _lang('Reaply'), 'style' => 'resize: none;', 'rows' => '3']) }}
        
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