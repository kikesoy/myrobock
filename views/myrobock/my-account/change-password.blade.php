@extends('layouts.myrobock')

{{--PAGE TITLE--}}
@section('title', trans('myrobock/myaccount/change.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('myAccountChangePassword') }}
@endsection

{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        @if($errors->any())
            <div class="alert alert-danger">
                <p class="alert-heading mb-0"><i class="fas fa-exclamation-circle"></i>
                    <strong>{{ trans('myrobock/myaccount/change.div0.problem') }}
                        .</strong> {{ trans('myrobock/myaccount/change.div0.please') }}:</p>
            </div>
        @endif
        <form method="POST" action="{{ route('my-account.update-password') }}">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                <label for="current_password">{{ trans('myrobock/myaccount/change.div0.current') }}</label>
                <input id="current_password" type="password" class="form-control" name="current_password"
                       placeholder="******" required>
                @if ($errors->has('current_password'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('current_password') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                <label for="new_password">{{ trans('myrobock/myaccount/change.div0.new') }}</label>
                <input id="new_password" type="password" class="form-control" name="new_password"
                       placeholder="******" required>
                <small id="new_passwordHelp"
                       class="form-text text-muted">{{ trans('myrobock/myaccount/change.div0.newm') }}.
                </small>

                @if ($errors->has('new_password'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('new_password') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group">
                <label for="new_password_confirm">{{ trans('myrobock/myaccount/change.div0.confirm') }}</label>
                <input id="new_password_confirm" type="password" class="form-control" name="new_password_confirmation"
                       placeholder="******" required>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-1">
                    {{ trans('myrobock/myaccount/change.div0.change') }}
                </button>
                <a href="{{ route('my-account.index') }}"
                   class="text-nowrap">{{ trans('myrobock/myaccount/change.div0.back') }}</a>
            </div>
        </form>
    </div>
@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')

@endsection