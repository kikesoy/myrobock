@extends('layouts.admin')

@section('title', trans('admin/messenger/show.title'))

@section('content')
    <h3>{{ trans('admin/messenger/show.title') }}<br></h3>
    <div class="panel-body">
        <h4>
                {{ trans('admin/messenger/show.subject') }}: {{ $message[0]->messageHeader->subject }}
        </h4>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>{{ trans('admin/messenger/show.please') }}:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @foreach ($message as $content)
        @if ($content->flag == 1)
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    {{$content->userRemitter->first_name}} {{$content->userRemitter->last_name}}<br><br>
                    <p class="card-text text-right">{{ $content->message }} {{ $content->updated_at }} </p>
                </div>
            </div>
        @else
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-body">
                    {{$content->userReceiver->first_name}} {{$content->userReceiver->last_name}}<br><br>
                    <p class="card-text text-left">{{ $content->message }} {{ $content->updated_at }} </p>
                </div>
            </div>
        @endif
    @endforeach
    @if (!($message[0]->messageHeader->is_closed))
        <form class="form-horizontal" method="POST" action="{{ route('messenger-admin.response') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id_message_header" value="{{$message[0]->id_message_header}}">
            <div class="form-group">
                <label class="col-lg-2">{{ trans('admin/messenger/show.message') }}:</label>
                <textarea name="message" rows="7" cols="30">{{ old('message')}}</textarea><br/>
            </div>
            <button type="submit">{{ trans('admin/messenger/show.send') }}</button>
        </form>
    @endif
    <p>
        <a href="{{ route('dashboard.index') }}">{{ trans('admin/messenger/show.home') }}</a> || <a href="{{ route('messenger-admin.index') }}">{{ trans('admin/messenger/show.show') }}
    </p>
@endsection