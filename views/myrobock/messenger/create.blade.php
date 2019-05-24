@extends('layouts.myrobock')
{{--PAGE TITLE--}}
@section('title', trans('myrobock/messenger/create.title'))

{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')

@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>{{ trans('myrobock/messenger/create.error') }}:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-auto" style="width: 65%;">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('messenger.create') }}">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="subject" placeholder="{{ trans('myrobock/messenger/create.placeholder') }}"
                                value="{{ old('subject') }}">
                        </div>
                        <div class="input-group mb-3">
                            <select class="custom-select" id="inputGroupSelect01" name="id_message_category">
                                <option value="" disabled selected>{{ trans('myrobock/messenger/create.select') }}</option>
                                    @foreach ($messageCategory as $category)
                                        <option value="{{$category->id_message_category}}">
                                            {{ trans('myrobock/messenger/create.'.$category->name) }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                                
                        <div class="input-group">
                            <textarea class="form-control" name="message" rows="5" placeholder="Type a message">{{ old('message') }}</textarea>
                        </div>
                        
                        <div class="float-right" style="margin: 15px 0px 0px 0px;">
                            <button type="submit" class="btn btn-primary mb-2">{{ trans('myrobock/messenger/create.send') }}</button>
                        </div>
                    </form>
                    <p style="margin-top: 15px;">
                        <a href="{{ route('messenger.index') }}"
                            class="btn btn-secondary mb-3"><i class="fas fa-envelope"></i> {{ trans('myrobock/messenger/create.show') }}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection