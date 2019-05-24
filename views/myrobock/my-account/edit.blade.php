@extends('layouts.myrobock')

{{--PAGE TITLE--}}
@section('title', trans('myrobock/myaccount/edit.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('myAccountEdit') }}
@endsection

{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        @if($errors->any())
            <div class="alert alert-danger">
                <p class="alert-heading mb-0"><i class="fas fa-exclamation-circle"></i>
                    <strong>{{ trans('myrobock/myaccount/edit.div0.problem') }}
                        .</strong>{{ trans('myrobock/myaccount/edit.div0.please') }}:</p>
            </div>
        @endif
        <form method="POST" action="{{ route('my-account.update') }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                <label for="first_name">{{ trans('myrobock/myaccount/edit.div0.first') }}:</label>
                <input id="first_name" type="text" class="form-control" name="first_name"
                       value="{{ old('first_name', $user->first_name) }}"
                       placeholder="{{ trans('myrobock/myaccount/edit.div0.first') }}" required autofocus>
                @if ($errors->has('first_name'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="control-label">{{ trans('myrobock/myaccount/edit.div0.last') }}:</label>
                <input id="last_name" type="text" class="form-control" name="last_name"
                       value="{{ old('last_name', $user->last_name) }}"
                       placeholder="{{ trans('myrobock/myaccount/edit.div0.last') }}" required autofocus>
                @if ($errors->has('last_name'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">{{ trans('myrobock/myaccount/edit.div0.direction') }}:</label>
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email', $user->email) }}" placeholder="example@mail.com" required>
                @if ($errors->has('email'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                <label for="contact_number" class="control-label">{{ trans('myrobock/myaccount/edit.div0.contact') }}
                    :</label>
                <input id="contact_number" type="text" class="form-control" name="contact_number"
                       value="{{ old('contact_number', $user->contact_number) }}" placeholder="+1 (555) 555-5555"
                       required>
                @if ($errors->has('contact_number'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('contact_number') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mr-1">
                    {{ trans('myrobock/myaccount/edit.div0.edit') }}
                </button>
                <a href="{{ route('my-account.index') }}"
                   class="text-nowrap">{{ trans('myrobock/myaccount/edit.div0.back') }}</a>
            </div>
        </form>
    </div>
@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')

@endsection