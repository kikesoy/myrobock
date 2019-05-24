@extends('layouts.form')

{{-- TITLE --}}
@section('title',ucfirst(str_replace(".", " ", Route::currentRouteName())))

{{-- CONTENT --}}
@section('content')
<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="example@mail.com" required autofocus>
        @if ($errors->has('email'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </small>
            @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="******" required>
            <small id="passwordHelp" class="form-text text-muted">Minimum six characters.</small>

            @if ($errors->has('password'))
                <small class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </small>
            @endif
    </div>

    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="******" required>
            @if ($errors->has('password_confirmation'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('password_confirmation') }}</strong>
            </small>
            @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">
            Reset Password
        </button>
    </div>
    <hr>
    <p class="mb-0 text-center">Don't have an account?</p>
    <a href="{{ route('register') }}" class="btn btn-sm btn-primary btn-block">Create an account</a>
    <a href="{{ route('login') }}" class="btn btn-sm btn-secondary btn-block">Back to login</a>
</form>
@endsection