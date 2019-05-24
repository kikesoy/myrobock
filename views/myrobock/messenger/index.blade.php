@extends('layouts.myrobock')

{{--PAGE TITLE--}}
{{-- @section('title', trans('myrobock/messenger/index.table.message') ) --}}

@section('breadcrumbs')
    {{-- {{ Breadcrumbs::render('messenger') }} --}}
@endsection

{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')

@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    <div class="row">
        <div class="col-2">
            <div class="card" style="height: 450px;">
                <div class="card-body">
                    <a href="{{ route('messenger.create') }}" class="btn btn-info btn-primary btn-block btn-sm" style="margin-bottom: 20px;">
                        <i class="fas fa-plus"></i> {{ trans('myrobock/messenger/index.table.create') }}
                    </a>
                    <h5 class="card-title">Folder</h5>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link @if (Route::getCurrentRoute()->uri() === 'my-account/messenger' || Route::getCurrentRoute()->uri() === 'my-account/messenger/order-asc' || substr(Request::path(), 0, 29) === 'my-account/messenger/status/2' || substr(Request::path(), 0, 29) === 'my-account/messenger/status/3' || substr(Request::path(), 0, 29) === 'my-account/messenger/status/4' || substr(Request::path(), 0, 29) === 'my-account/messenger/status/5') active @endif" href="{{ route('messenger.index') }}" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-inbox"></i> Inbox</a>
                        <a class="nav-link @if (substr(Request::path(), 0, 29) === 'my-account/messenger/status/1') active @endif" href="{{ route('messenger.status', ['option' => 1]) }}" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="far fa-paper-plane"></i> Send</a>
                        <h5 class="card-title">Filter</h5>
                        <a class="nav-link @if (substr(Request::path(), 0, 31) === 'my-account/messenger/category/1') active @endif" href="{{ route('messenger.category', ['option' => 1]) }}" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-user-friends"></i> Customer Support</a>
                        <a class="nav-link @if (substr(Request::path(), 0, 31) === 'my-account/messenger/category/3') active @endif" id="v-pills-settings-tab" href="{{ route('messenger.category', ['option' => 3]) }}" role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-chalkboard-teacher"></i> Support</a>
                        <a class="nav-link @if (substr(Request::path(), 0, 31) === 'my-account/messenger/category/2') active @endif" href="{{ route('messenger.category', ['option' => 2]) }}" role="tab" aria-controls="v-pills-claims" aria-selected="false"><i class="fas fa-exclamation-triangle"></i> Claims</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-10">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <div class="card" style="height: 450px; overflow: auto;">
                        <div class="card-body">
                            @include('components.myrobock-nav-messenger')
                            @include('components.myrobock-messenger-inbox')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection