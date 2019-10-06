@component('mail::message')
<p>Hello Sir {{$user->name}}




</p>
 {!! $messege !!}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
