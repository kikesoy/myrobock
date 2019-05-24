@extends('layouts.admin')

{{-- SECTION TITLE --}}
@section('title', trans('myrbckadmin.barraLateralIzquierda.home'))

{{-- SECTION CONTENT --}}
@section('content')
    <section class="container-fluid">
        <div class="row">
            <article id="activity" class="col-12 mb-3 box-content-admin">
                <form action="">
                    <header class="filters form-inline d-flex flex-row justify-content-end ml-0 mr-0">
                        <label for="overviewCurrency">{{ trans('myrbckadmin.article0.header.currency') }}</label>
                        <select class="form-control form-control-sm" id="overviewCurrency">
                            <option selected>{{ trans('myrbckadmin.article0.header.choose') }}</option>
                            <option value="1">{{ trans('myrbckadmin.article0.header.one') }}</option>
                            <option value="2">{{ trans('myrbckadmin.article0.header.two') }}</option>
                            <option value="3">{{ trans('myrbckadmin.article0.header.three') }}</option>
                        </select>
                        <label for="startDateRange">{{ trans('myrbckadmin.article0.header.dateRange') }}</label>
                        <input type="date" name="period" id="startDateRange" class="form-control form-control-sm">
                        <input type="date" name="period" id="endDateRange" class="form-control form-control-sm">
                    </header>
                    <hr>
                    <div id="overview" class="d-flex flex-row ">
                        <div class="stores flex-fill">
                            <div class="mb-0">{{ trans('myrbckadmin.article0.div.stores') }}</div>
                            <h3 class="mb-0">99.999.999</h3>
                            <small class="mb-0 text-success"><i class="fas fa-arrow-up"></i> 6,3%</small>
                        </div>
                        <div class="sales flex-fill">
                            <div class="mb-0">{{ trans('myrbckadmin.article0.div.sales') }}</div>
                            <h3 class="mb-0">999.999.999.999,00</h3>
                            <small class="mb-0 text-success"><i class="fas fa-arrow-up"></i> 10,50%</small>
                        </div>
                        <div class="conversion flex-fill">
                            <div class="mb-0">{{ trans('myrbckadmin.article0.div.conversionRate') }}</div>
                            <h3 class="mb-0">99,99%</h3>
                            <small class="mb-0 text-danger"><i class="fas fa-arrow-down"></i> 3,50%</small>
                        </div>
                        <div class="messages flex-fill">
                            <div class="mb-0">{{ trans('myrbckadmin.article0.div.newMessages') }}</div>
                            <h3 class="mb-0">99.999.999</h3>
                            <small class="mb-0 text-success"><i class="fas fa-arrow-up"></i> 15,50%</small>
                        </div>
                    </div>
                </form>
            </article>
        </div><!--.row-->
    </section><!--.container-fluid-->
    <section class="card-columns">
        <article class="card box-content-admin" id="overview-user">
            <header>
                <h3>{{ Auth::user()->first_name . " " . Auth::user()->last_name }}</h3>
                <small><a href="#">{{ Auth::user()->email }}</a></small>
            </header>
            <div class="mx-3">
                <table class="table table-sm table-borderless">
                    <tr>
                        <th class="pl-0" scope="row">{{ trans('myrbckadmin.article1.div.phone') }}:</th>
                        <td>{{ Auth::user()->contact_number }}</td>
                    </tr>
                    <tr>
                        <th class="pl-0" scope="row">{{ trans('myrbckadmin.article1.div.activeSince') }}:</th>
                        @if (App::getLocale() == 'es')
                        <td>
                            {{ Date::setLocale(App::getLocale())}}
                            {{ Date::parse(Auth::user()->created_at)->format('l j \\d\\e F Y h:i:s A')}}
                        </td>
                        @else
                            <td>{{ Auth::user()->created_at->format('l jS \\of F Y h:i:s A') }}</td>
                        @endif
                    </tr>
                </table>
            </div>
            <footer class="p-2">
                <a href="{{ route("employees.edit", Auth::user()->id_employee) }}" class="btn btn-sm btn-primary"><i class="fas fa-pen-square"></i>{{ trans('myrbckadmin.article1.div.editProfile') }}</a>
            </footer>
        </article><!-- .overview-user-->
        <article class="card box-content-admin" id="overview-customers">
            <header>
                <h3>{{ trans('myrbckadmin.article1.article.customer') }}</h3>
                <small><strong>{{$users->total()}}</strong>{{ trans('myrbckadmin.article1.article.registered') }}</small>
            </header>

            @if ($users->isNotEmpty())
            <div class="table-responsive">
                <table id="overview-customers-table" class="table table-borderless table-striped table-sm table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ trans('myrbckadmin.article1.article.table.firstName') }}</th>
                            <th scope="col">{{ trans('myrbckadmin.article1.article.table.lastName') }}</th>
                            <th scope="col">Email</th>
                            <th scope="col">{{ trans('myrbckadmin.article1.article.table.role.role') }}</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{ trans("myrbckadmin.article1.article.table.role.$user->rol") }}</td>
                            <td class="tinycell">
                                <a href="{{ route("customers.show", $user) }}"
                                data-userid="{{ $user->id }}"
                                data-firstname="{{ $user->first_name }}" 
                                data-lastname="{{ $user->last_name }}"
                                data-email="{{ $user->email }}"
                                data-phone="{{ $user->contact_number }}"
                                data-rol={{ trans("myrbckadmin.article1.article.table.role.$user->rol") }}
                                data-lang="{{ $user->lang->name }}"
                                data-active="{{ $user->active }}"
                                data-validate="{{ $user->validate }}"
                                data-certificate="{{ $user->certificate }}" 
                                data-created="{{ $user->created_at->format('F jS, Y @ H:i:s') }}" 
                                data-updated="{{ $user->updated_at->diffForHumans() }}"
                                data-target="#modal-show-customer" 
                                data-toggle="modal" 
                                class="btn btn-sm btn-primary btn-show-customer">
                                    <i class="fas fa-search"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p>{{ trans('myrbckadmin.article1.nor') }}.</p>
            @endif 
            <footer class="p-2">
                <a href="{{ route('customers.index') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i>{{ trans('myrbckadmin.article1.') }}</a>
            </footer>
        </article><!-- overview-customer -->
        <article class="card box-content-admin" id="overview-orders">
            <header>
                <h3>{{ trans('myrbckadmin.article2.order.order') }}</h3>
                <small><strong>123.456</strong>{{ trans('myrbckadmin.article2.order.for') }}: <strong>US$ 99.99.999,00</strong></small>
            </header>
            <table id="overview-orders-table" class="table table-sm table-borderless table-striped mb-0">
                <thead class="thead-aqua">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{ trans('myrbckadmin.article2.table.date') }} </th>
                        <th scope="col">{{ trans('myrbckadmin.article2.table.status.status') }} </th>
                        <th scope="col">Total (US$)</th>
                        <th scope="col" class="tinycell"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12343</td>
                        <td>21/07/2018</td>
                        <td><span class="badge badge-success">{{ trans('myrbckadmin.article2.table.status.Billed') }}</span></td>
                        <td class="text-right">999.999.999.999,00</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>9854</td>
                        <td>15/06/2018</td>
                        <td><span class="badge badge-success">{{ trans('myrbckadmin.article2.table.status.Delivered') }}</span></td>
                        <td class="text-right">12.345.678,00</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>7534</td>
                        <td>04/05/2018</td>
                        <td><span class="badge badge-danger">{{ trans('myrbckadmin.article2.table.status.Canceled') }}</span></td>
                        <td class="text-right">345.678,00</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>2342</td>
                        <td>12/04/2018</td>
                        <td><span class="badge badge-info">{{ trans('myrbckadmin.article2.table.status.Returned') }}</span></td>
                        <td class="text-right">98.765.432,00</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>234</td>
                        <td>30/03/2018</td>
                        <td><span class="badge badge-success">{{ trans('myrbckadmin.article2.table.status.Billed') }}</span></td>
                        <td class="text-right">234.567.890,00</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <footer class="p-2">
            <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i>{{ trans('myrbckadmin.article2.table.status.see') }}</a>
            </footer>
        </article><!-- #overview-orders -->
        <article class="card box-content-admin" id="overview-products">
            <header>
                <h3>{{ trans('myrbckadmin.article3.products') }}</h3>
                <small><strong>21.123.456</strong>{{ trans('myrbckadmin.article3.available') }}</small>
            </header>
            <table id="overview-products-table" class="table table-sm table-borderless table-striped mb-0">
                <thead class="thead-aqua">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">{{ trans('myrbckadmin.article3.name') }}</th>
                        <th scope="col">{{ trans('myrbckadmin.article3.category') }}</th>
                        <th scope="col">{{ trans('myrbckadmin.article3.status') }}</th>
                        <th scope="col" class="tinycell"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12345</td>
                        <td>ALT FORD 12V 135A CW S6 6G MUSTANG V6 4.0 05-08</td>
                        <td>Alternator</td>
                        <td>QPS Electric</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>ALT MITS 12V 95A CW S6 HONDA CIVIC HR-V ILX L4 1.8 2.0 12-16</td>
                        <td>Alternator</td>
                        <td>QPS Electric</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>ALT FORD 12V 135A CW S6 6G MUSTANG V6 4.0 05-08</td>
                        <td>Alternator</td>
                        <td>QPS Electric</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>ALT FORD 12V 135A CW S6 6G MUSTANG V6 4.0 05-08</td>
                        <td>Alternator</td>
                        <td>QPS Electric</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                    <tr>
                        <td>12345</td>
                        <td>ALT FORD 12V 135A CW S6 6G MUSTANG V6 4.0 05-08</td>
                        <td>Alternator</td>
                        <td>QPS Electric</td>
                        <td><a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i></a></td>
                    </tr>
                </tbody>
            </table>
            <footer class="p-2">
                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i>{{ trans('myrbckadmin.article3.see') }}</a>
            </footer>
        </article><!-- #overview-products -->
    </section><!-- .card-columns -->
@endsection

{{-- SECTION EXTRAS: Para agregar codigo adicional al contenido, por ejemplo: modales, etc.--}}
@section('extras')

    {{-- MODAL SHOW CUSTOMER --}}
    @component('components.modal',['modal_id' => 'show-customer', 'modal_title' => ''])
        @slot('modal_content')
            @include('admin.customers.show')
        @endslot
        @slot('modal_actions')
            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-check-circle"></i> <span>{{ trans('myrbckadmin.modal.close') }}</span></button>
        @endslot
    @endcomponent

@endsection

{{-- SECTION SCRIPTS --}}
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            
            // SHOW --------------------------------------------------------------------

            // Carga la data del usuario correcto a traves de los 'atributos data' del boton 'btn-show' al abrir el modal

            $('#modal-show-customer').on('show.bs.modal', function (e) {

                var button = $(e.relatedTarget);
                var modal = $(this);
                $('#app').addClass('blurred');
                modal.find('.modal-title').text(button.data('firstname')+' '+button.data('lastname'));
                modal.find('#s-email a').text(button.data('email'));
                modal.find('#s-email a').attr('href','mailto:'+button.data('email'));
                modal.find('#s-phone td').text(button.data('phone'));
                modal.find('#s-lang-name td').text(button.data('lang'));
                modal.find('#s-rol td').text(button.data('rol'));
                modal.find('#s-created td').text(button.data('created'));
                modal.find('#s-updated td').text(button.data('updated'));
                if (button.data('active') < 1){
                    modal.find('#s-active').removeClass('text-success').addClass('text-danger');
                    modal.find('#s-active i').removeClass('fa-check-circle').addClass('fa-times-circle');
                } else {
                    modal.find('#s-active').removeClass('text-danger').addClass('text-success');
                    modal.find('#s-active i').removeClass('fa-times-circle').addClass('fa-check-circle');
                }
                if (button.data('validate') < 1){
                    modal.find('#s-validate').removeClass('text-success').addClass('text-danger');
                    modal.find('#s-validate i').removeClass('fa-check-circle').addClass('fa-times-circle');
                } else {
                    modal.find('#s-validate').removeClass('text-danger').addClass('text-success');
                    modal.find('#s-validate i').removeClass('fa-times-circle').addClass('fa-check-circle');
                }
                if (button.data('certificate') < 1){
                    modal.find('#s-certificate').removeClass('text-success').addClass('text-danger');
                    modal.find('#s-certificate i').removeClass('fa-check-circle').addClass('fa-times-circle');
                } else {
                    modal.find('#s-certificate').removeClass('text-danger').addClass('text-success');
                    modal.find('#s-certificate i').removeClass('fa-times-circle').addClass('fa-check-circle');
                }
            });

            // Remueve la clase blurred, para que la pagina sea legible
            $('#modal-show-customer').on('hidden.bs.modal', function (e) {
                $('#app').removeClass('blurred');
            });
        });
    </script>
@endsection