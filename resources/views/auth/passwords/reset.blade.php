@extends('layouts.auth')

@section('auth')

        <form class="form-horizontal" id="recoverform" action="{{ route('password.update') }}" method="post">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>{{ __('Reset Password') }}</h3>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus type="text" required="" placeholder="{{ __('E-Mail Address') }}"> 
                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xs-12">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-xs-12">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                              
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Reset Password') }}</button>
                            </div>
                        </div>
            </form>
@endsection
