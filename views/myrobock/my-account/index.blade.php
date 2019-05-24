@extends('layouts.myrobock')

{{--PAGE TITLE--}}
@section('title', trans('myrobock/myaccount/index.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('myAccount') }}
@endsection

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    <section class="col-12">
        {{-- User Activity --}}
        <div id="userActivity" class="row mb-3">
            <div class="col-12 col-md-3 border-right">
                <h3>{{ trans('myrobock/myaccount/index.div0.hi') }}, {{ $user->first_name }} {{ $user->last_name }}</h3>
            </div>
            <div class="col-12 col-md-9">
                <div class="row">
                    <div class="col-4 border-right">
                        <p class="mb-0"><i class="fas fa-shopping-cart"></i>{{ trans('myrobock/myaccount/index.div0.yorder') }}</p>
                        <h3>{{ trans('myrobock/myaccount/index.div0.norder') }}</h3>
                        <a href="">{{ trans('myrobock/myaccount/index.div0.vorder') }}</a>
                    </div>
                    <div class="col-4 border-right">
                        <p class="mb-0"><i class="fas fa-store"></i>{{ trans('myrobock/myaccount/index.div0.ysale') }}</p>
                        <h3>17 {{ trans('myrobock/myaccount/index.div0.nsale') }}</h3>
                        <a href="">{{ trans('myrobock/myaccount/index.div0.vsale') }}</a>
                    </div>
                    <div class="col-4">
                        <p class="mb-0"><i class="fas fa-envelope"></i>{{ trans('myrobock/myaccount/index.div0.message') }}</p>
                        <h3>{{ trans('myrobock/myaccount/index.div0.nmessage') }}</h3>
                        <a href="{{ route('messenger.index') }}">{{ trans('myrobock/myaccount/index.div0.vmessage') }}</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- User Settings --}}
        <div id="userSettings" class="row">
            <div class="col-md-4">
                {{-- User Info --}}
                <article id="userInfo" class="card mb-2">
                    <section class="card-body">
                        <h4 class="card-title"><i class="fas fa-user-circle"></i>{{ trans('myrobock/myaccount/index.div1.info') }}</h4>
                        <ul class="list-unstyled">
                            <li><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></li>
                            <li>{{ $user->contact_number }}</li>
                            <li>{{ trans('myrobock/myaccount/index.div1.language') }}: {{ $user->lang->name }}</li>
                            <li>{{ trans('myrobock/myaccount/index.div1.since') }}: {{ $user->created_at->format('d M Y') }}</li>
                        </ul>
                    </section>
                    <footer class="card-footer">
                        <a href="{{ route('my-account.edit') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div1.edit') }}</a>
                    </footer>
                </article>
                {{-- User Change Password --}}
                <article id="userPassword" class="card mb-2">
                    <section class="card-body">
                        <h4 class="card-title"><i class="fas fa-lock"></i>{{ trans('myrobock/myaccount/index.div1.security') }}</h4>
                        <p class="card-text">{{ trans('myrobock/myaccount/index.div1.msecurity') }}.</p>
                    </section>
                    <footer class="card-footer">
                        <a href="{{ route('my-account.edit-password') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div1.change') }}</a>
                    </footer>
                </article>
            </div>
            <div class="col-md-4">
                {{-- User Addresses --}}
                <article id="userAddresses" class="card mb-2">
                    <section class="card-body">
                        <h4 class="card-title mb-0"><i class="fas fa-map-marker-alt"></i>{{ trans('myrobock/myaccount/index.div2.address') }}</h4>
                    </section>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ trans('myrobock/myaccount/index.div2.address1') }}</h5>
                                <small><i class="fas fa-star"></i></small>
                            </div>
                            <p class="mb-1">QPS Electric, 3233 Commerce Parkway Miramar Florida. 33025. United
                                States</p>
                            <p>+1 954 674 2042</p>
                            <a href="#"><i class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div2.edit') }}</a>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ trans('myrobock/myaccount/index.div2.address2') }}</h5>
                            </div>
                            <p class="mb-1">QPS Electric, 3233 Commerce Parkway Miramar Florida. 33025. United
                                States</p>
                            <p>+1 954 674 2042</p>
                            <a href="#"><i class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div2.edit') }}</a>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ trans('myrobock/myaccount/index.div2.address3') }}</h5>
                            </div>
                            <p class="mb-1">QPS Electric, 3233 Commerce Parkway Miramar Florida. 33025. United
                                States</p>
                            <p>+1 954 674 2042</p>
                            <a href="#"><i class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div2.edit') }}</a>
                        </li>
                    </ul>
                    <footer class="card-footer">
                        <a href="{{ route('my-account.edit') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus-square"></i> {{ trans('myrobock/myaccount/index.div2.new') }}</a>
                    </footer>
                </article>
            </div>
            <div class="col-md-4">
                {{-- User Payment Methods --}}
                <article id="userPayments" class="card mb-2">
                    <section class="card-body">
                        <h4 class="card-title mb-0"><i class="fas fa-credit-card"></i>{{ trans('myrobock/myaccount/index.div3.payment') }}</h4>
                    </section>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0"><i class="fab fa-cc-amex"></i> 4532 3145 0012 0034</h5>
                                <small><i class="fas fa-star"></i></small>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <p>09-20</p>
                                <p class="mb-0">Enrique Soto Sanchez</p>
                            </div>
                            <a href="#"><i class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div3.edit') }}</a>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0"><i class="fab fa-cc-visa"></i> 4532 3145 0012 0034</h5>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <p>09-20</p>
                                <p class="mb-0">Enrique Soto Sanchez</p>
                            </div>
                            <a href="#"><i class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div3.edit') }}</a>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-0"><i class="fab fa-cc-mastercard"></i> 4532 3145 0012 0034</h5>
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <p>09-20</p>
                                <p class="mb-0">Enrique Soto Sanchez</p>
                            </div>
                            <a href="#"><i class="fas fa-edit"></i>{{ trans('myrobock/myaccount/index.div3.edit') }}</a>
                        </li>
                    </ul>
                    <footer class="card-footer">
                        <a href="{{ route('my-account.edit') }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-plus-square"></i>{{ trans('myrobock/myaccount/index.div3.new') }}</a>
                    </footer>
                </article>
            </div>
        </div>
    </section>
@endsection