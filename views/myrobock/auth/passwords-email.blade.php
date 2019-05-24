@extends('layouts.form')

{{-- TITLE --}}
@section('title',ucfirst(str_replace(".", " ", Route::currentRouteName())))

{{-- CONTENT --}}
@section('content')
<form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email">E-Mail Address</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email" required>
        @if ($errors->has('email'))
        <small class="help-block text-danger">
            <strong>{{ $errors->first('email') }}</strong>
        </small>
        @endif
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-block btn-primary">
            Send Password Reset Link
        </button>
    </div>
    <hr>
    <p class="mb-0 text-center">Don't have an account?</p>
    <a href="{{ route('register') }}" class="btn btn-sm btn-primary btn-block">Create an account</a>
    <a href="{{ route('login') }}" class="btn btn-sm btn-secondary btn-block">Back to login</a>
</form>
@endsection