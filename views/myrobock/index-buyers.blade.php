@extends('layouts.myrobock')

@section('breadcrumbs')
    {{ Breadcrumbs::render('myAccount') }}
@endsection

@if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

@section('content')
    {{-- First Row Dashboard --}}
    <div class="row" style="max-height: 30vh;">
        <div class="col-4 dashboard-head"> 
            <div class="card dashboard-card-ico dashboard-card-ico-orders">
                <div class="card-body">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-right">Your Orders</h5>
                    <p class="card-text text-center dashboard-size-ico">No recent orders.</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="#">View orders</a>
                </div>
            </div>
        </div>
        <div class="col-4 dashboard-head">
            <div class="card dashboard-card-ico dashboard-card-ico-favorites">
                <div class="card-body">
                    <i class="fas fa-heart"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-right">Favorites</h5>
                    <p class="card-text text-center dashboard-size-ico"><span style="color: #d50000">17</span> new favorites.</p>
                </div>
                <div class="card-footer text-muted">
                    <i class="far fa-clock"></i> Last 24 hours
                    <span class="float-right">
                        <a href="#">View all</a>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-4 dashboard-head"> 
            <div class="card dashboard-card-ico dashboard-card-ico-messages">
                <div class="card-body">
                    <i class="fas fa-envelope"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-right">Messages</h5>
                    <p class="card-text text-center dashboard-size-ico"><span style="color: #d50000">2</span> new messages.</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="#">View messages</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End First Row Dashboard --}}
    {{-- Second Row Dashboard --}}
    <div class="row" style="margin-bottom: 25px;">
        <div class="col-6"> 
            <div class="card dashboard-card-ico-two dashboard-card-ico-addresses">
                <div class="card-body">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-titled dashboard-card-title">My Addresses</h4>
                    <div class="content-addresses">
                        {{-- Init card addresses --}}
                        <div class="card mb-3 addresses">
                            <div class="row no-gutters">
                                <div class="col-md-2">
                                    <table style="height: 100%;">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: larger;"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><i class="far fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item" href="#"><i class="far fa-trash-alt"></i> Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">My mother's house</h5>
                                        <p class="card-text">QPS Electric, 323 Commerce Parkway Miramar Florida. 33025. United States. +1 954 674 2042</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <table style="height: 100%;">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <a href="#"><i class="far fa-heart dashboard-size-ico"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- End card addresses --}}
                    </div>
                </div>
                {{-- Botton add address --}}
                <div>
                    <a href="#" class="add-address">
                        <i class="fa fa-plus add-ico"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6"> 
            <div class="card dashboard-card-ico-two dashboard-card-ico-whislist">
                <div class="card-body">
                    <i class="far fa-star-half"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title dashboard-card-title">Whislist</h4>
                    <div class="text-right" style="margin-right: 25px;">
                        <form class="card-whislist-select">
                            <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option disabled selected>Select Whislist</option>
                                <option>My new list 1</option>
                                <option>My new list 2</option>
                                <option>My new list 3</option>
                                <option>My new list 4</option>
                                </select>
                            </div>
                        </form>
                        <a href="#" style="margin-left: 15px;">Show all</a>
                    </div>
                    <div class="content-whislist">
                        {{-- Init card whislist --}}
                        <div class="card mb-3 whislist">
                            <div class="row no-gutters">
                                <div class="col-md-1">
                                    <table style="height: 100%;">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <a href="#"><i class="far fa-trash-alt dashboard-size-ico" data-toggle="tooltip" title="Quit from Whistlist"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2">
                                    <img src={{ asset('img/demo/11295.jpg') }}  alt="">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <p class="card-text text-center">ALT MITS 12V 95A CW S6 HONDA CIVIC HR-V ILX L4 1.8 2.0 12-16</p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <table style="height: 100%;">
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    <button type="button" class="btn btn-primary btn-sm card-whislist-btn-cart" ><i class="fas fa-shopping-cart"></i> Add to card</button>
                                                    <div class="form-group">
                                                        <select class="form-control" id="exampleFormControlSelect1" style="margin: 0;">
                                                        <option disabled selected>Move</option>
                                                        <option>My new list 1</option>
                                                        <option>My new list 2</option>
                                                        <option>My new list 3</option>
                                                        <option>My new list 4</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- End card whislist --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection