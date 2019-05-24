@extends('layouts.myrobock')
{{--PAGE TITLE--}}
{{-- @section('title', trans('myrobock/messenger/show.title') ) --}}

{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')

@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-auto">
                            <a href="{{ route('messenger.index') }}"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <div class="col-auto">
                            <h5 class="card-title">{{ trans('myrobock/messenger/show.subject') }}: <b>{{ $message[0]->messageHeader->subject }}</b></h5>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6>{{ trans('myrobock/messenger/show.error') }}:</h6>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="content-show-message">
                        @foreach ($message as $content)
                            @if ($content->flag == 1)
                                <div class="card mb-3 bubble-message-show-cli">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <div class="card-body text-white bg-primary" style="border-radius: 50px;">
                                                <h6 class="card-title text-justify">{{ $content->message }}</h6>
                                                <p class="card-text text-left"><small class="text-muted">{{ $content->updated_at }} </small></p>
                                            </div>
                                        </div>
                                        {{-- Avatar Message Cli --}}
                                        {{-- <div class="col-md-2 text-center">
                                            <table style="height: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                                <img src="{{ asset('img/logo-my-r.png') }}" alt="..." style="    width: 60%;
                                                                background-color: #00B8D4;
                                                                padding: 10px;
                                                                border-radius: 30px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                         </div> --}}
                                    </div>
                                </div>
                            @else
                                <div class="card mb-3" style="max-width: 40rem;">
                                    <div class="row no-gutters">
                                      <div class="col-md-2 text-center">
                                            <table style="height: 100%;">
                                                <tbody>
                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="{{ asset('img/logo-my-r.png') }}" alt="avatar-admin" class="logo-msg-show">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                      </div>
                                      <div class="col-md-10">
                                        <div class="card-body text-white bg-info" style="border-radius: 50px;">
                                            <p class="card-text text-center">{{$content->userReceiver->first_name}} {{$content->userReceiver->last_name}}</p>
                                            <h6 class="card-title text-justify">{{ $content->message }}</h6>
                                            <p class="card-text text-right"><small class="text-muted">{{ $content->updated_at }} </small></p>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (!$message[0]->messageHeader->is_closed)
        <div class="row">
            <div class="col">
                <div class="card content-chat">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <form class="form-row" method="POST" action="{{ route('messenger.response') }}">
                                    <div class="col-auto">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$message[0]->id_message_header}}">
                                        <div class="input-group">
                                            <textarea class="form-control" name="message" rows="3" cols="110" placeholder="Type a message"></textarea>  
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">{{ trans('myrobock/messenger/show.send') }}</button> 
                                    </div>
                                </form>
                            </div>
                            <form method="POST" action="{{ route('messenger.close') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id_0" value="{{$message[0]->id_message_header}}">
                                <button type="submit" class="btn btn-primary btn-warning">{{ trans('myrobock/messenger/show.close') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection