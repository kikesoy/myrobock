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
    <div class="row" style="max-height: 30vh; margin-bottom: 50px;">
        <div class="col-3 dashboard-head"> 
            <div class="card dashboard-card-ico dashboard-card-ico-delivered">
                <div class="card-body">
                    <i class="fas fa-dolly"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-right">Delivered</h5>
                    <p class="card-text text-center dashboard-size-ico"><b>48 / 50</b> Released</p>
                </div>
                <div class="card-footer text-muted">
                    <i class="fas fa-truck-loading"></i> Tracked global
                </div>
            </div>
        </div>
        <div class="col-3 dashboard-head">
            <div class="card dashboard-card-ico dashboard-card-ico-favorites">
                <div class="card-body">
                    <i class="fas fa-store"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-right">Your Sales</h5>
                    <p class="card-text text-center dashboard-size-ico"><span style="color: #d50000">2</span> new sales</p>
                </div>
                <div class="card-footer text-muted">
                    <a href="#">View sales</a>
                </div>
            </div>
        </div>
        <div class="col-3 dashboard-head"> 
            <div class="card dashboard-card-ico dashboard-card-ico-pay">
                <div class="card-body">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-right">Payments</h5>
                    <p class="card-text text-center dashboard-size-ico"><b>$965</b>
                </div>
                <div class="card-footer text-muted">
                    <i class="far fa-clock"></i> Last 24 hours
                </div>
            </div>
        </div>
        <div class="col-3 dashboard-head"> 
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
    <div class="row" style=" margin-block-end: -35px;">
        <div class="col-12 dashboard-head"> 
            <div class="card dashboard-card-ico-two dashboard-card-ico-product">
                <div class="card-body">
                    <i class="fas fa-box-open"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="dashboard-card-title-onecard">
                        <h4 class="card-title">Products</h4> 
                        <h6 class="card-subtitle mb-2 text-muted"><b>2.123.456</b> Available Products</h6>
                    </div>
                    <div class="content-product-table">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Stocks</th>
                                    <th scope="col">Units</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody> <!-- Solo se consideran 5 filas -->
                                <tr>
                                    <th scope="row">0015697</th>
                                    <td>ALT FORD 12V 135A CW S6 6G 
                                        MUSTANG V6 4.0 08-08</td>
                                    <td>Alternator</td>
                                    <td><span class="kpi-table-product-active">Active</span></td>
                                    <td>380</td>
                                    <td>Box</td>
                                    <td>3.560,00</td>
                                    <td><button type="button" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button></td>
                                </tr>
                                <tr>
                                    <th scope="row">0015697</th>
                                    <td>ALT FORD 12V 135A CW S6 6G 
                                        MUSTANG V6 4.0 08-08</td>
                                    <td>Alternator</td>
                                    <td><span class="kpi-table-product-disabled">Disabled</span></td>
                                    <td>380</td>
                                    <td>Box</td>
                                    <td>3.560,00</td>
                                    <td><button type="button" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button></td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Second Row Dashboard --}}
    {{-- Third Row Dashboard --}}
    <div class="row" style="margin-bottom: 25px;">
        <div class="col-6"> 
            <div class="card dashboard-card-ico-two dashboard-card-ico-bank">
                <div class="card-body">
                    <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-titled dashboard-card-title">My Bank Accounts</h4>
                    <div class="content-bank">
                        {{-- Init card addresses --}}
                        <div class="card mb-3 bank-account">
                            <div class="row no-gutters">
                                <div class="col-md-1">
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
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title margin-zero">Wester Union</h5>
                                        <p class="card-text margin-zero">0134 0865 4596 3274 0148</p>
                                        <p class="margin-zero">Corriente</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <p class="card-text margin-zero">Denger Zamora</p>
                                        <p class="card-text margin-zero">P-6543218907-7</p>
                                    </div>
                                </div>
                                <div class="col-md-1">
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
                    <a href="#" class="add-bank">
                        <i class="fa fa-plus add-ico"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6"> 
            <div class="card dashboard-card-ico-two dashboard-card-ico-order">
                <div class="card-body">
                    <i class="fas fa-file-invoice-dollar"></i>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="dashboard-card-title-twocard">
                        <h4 class="card-title">Orders</h4> 
                        <h6 class="card-subtitle mb-2 text-muted"><b>123.456</b> Orders, from: <b>USD $99.999.999,00</b></h6>
                    </div>
                    <div class="content-order-table">
                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total (USD $)</th>
                                </tr>
                            </thead>
                            <tbody> <!-- Solo se consideran 5 filas -->
                                <tr>
                                    <th scope="row"><a href="#">A9D85R</a></th>
                                    <td>09 APR 2019</td>
                                    <td><span class="kpi-table-order-invoiced">Invoiced</span></td>
                                    <td>65.749,14</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">FA9DE9</a></th>
                                    <td>14 FEB 2019</td>
                                    <td><span class="kpi-table-order-cancelled">Cancelled</span></td>
                                    <td>345.678,93</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">PO8D41</a></th>
                                    <td>31 JAN 2019</td>
                                    <td><span class="kpi-table-order-returned">Returned</span></td>
                                    <td>98.765.432,00</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="#">13D8ED</a></th>
                                    <td>02 NOV 2018</td>
                                    <td><span class="kpi-table-order-released">Released</span></td>
                                    <td>234.567.890,20</td>
                                </tr>
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection