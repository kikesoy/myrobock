@extends('layouts.form')
{{-- TITLE --}}
@section('title',ucfirst(str_replace(".", " ", Route::currentRouteName())))

{{-- CONTENT --}}
@section('content')
<form class="form-horizontal" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Your email">
        @if ($errors->has('email'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </small>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">Password</label>
        <input id="password" type="password" class="form-control" name="password" required placeholder="Your password">
        @if ($errors->has('password'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-inline">
        <button type="submit" class="btn btn-primary mr-1">
            Login
        </button>
        <div class="form-check">
            <label for="remember" class="form-check-label"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
        </div>
    </div>
    <hr>
    <p class="mb-0 text-center">Don't have an account?</p>
    <a href="{{ route('register') }}" class="btn btn-sm btn-primary btn-block">Create an account</a>
    <p class="mb-0 text-center">or</p>
    <a href="{{ route('password.request') }}" class="btn btn-sm btn-secondary btn-block">Forgot Your Password?</a>
</form>
@endsection