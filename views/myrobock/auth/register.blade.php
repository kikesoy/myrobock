@extends('layouts.form')
{{-- TITLE --}}
@section('title',ucfirst(str_replace(".", " ", Route::currentRouteName())))

{{-- CONTENT --}}
@section('content')
<form method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name">First name:</label>
        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First name" required autofocus>

            @if ($errors->has('first_name'))
                <small class="help-block text-danger">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </small>
            @endif
    </div>

    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name">Last name:</label>
        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" required autofocus>

            @if ($errors->has('last_name'))
                <small class="help-block text-danger">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </small>
            @endif
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">Email address:</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@mail.com" required>

            @if ($errors->has('email'))
                <small class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </small>
            @endif
    </div>

    <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
        <label for="contact_number">Contact number:</label>
        <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ old('contact_number') }}" placeholder="+1 (555) 555-5555" required>
            @if ($errors->has('contact_number'))
                <small class="help-block text-danger">
                    <strong>{{ $errors->first('contact_number') }}</strong>
                </small>
            @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Password:</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="******" required>
            <small id="passwordHelp" class="form-text text-muted">Minimum six characters.</small>

            @if ($errors->has('password'))
                <small class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </small>
            @endif
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirm password:</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="******" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">
            Register
        </button>
    </div>
    <hr>
    <p class="mb-0 text-center">Do you have an account?</p>
    <a href="{{ route('login') }}" class="btn btn-sm btn-secondary btn-block">Go to login</a>
</form>
@endsection