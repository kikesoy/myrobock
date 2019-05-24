@extends('layouts.admin')

{{-- SECTION TITLE --}}
@section('title', trans('admin/employee/index.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('employee') }}
@endsection

{{-- SECTION CONTENT --}}
@section('content')
    <div class="card box-content-admin mb-3">
        <header class="d-flex flex-row align-items-center justify-content-between">
            <div>
                @if ($users->count() > 0)
                    {{ trans('admin/employee/index.div.show') }} {{($users->currentpage()-1)*$users->perpage()+1}} {{ trans('admin/employee/index.div.to') }} {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} {{ trans('admin/employee/index.div.of') }} {{$users->total()}} {{ trans('admin/employee/index.div.entry') }}
                @else
                    {{ trans('admin/employee/index.div.no') }}.
                @endif
            </div>
            @role('Super administrador|Administrador')
                <button class="btn btn-secondary btn-create"
                        data-action="{{ route('employees.create') }}"
                        data-target="#modal-create"
                        data-toggle="modal">
                    <i class="fas fa-plus-circle"></i> {{ trans('admin/employee/index.div.button') }}
                </button>
            @else
                <a href="{{ route("employees.edit", Auth::user()->id_employee) }}" class="btn btn-secondary"><i
                            class="fas fa-pencil-alt"></i> {{ trans('admin/employee/index.div.edit') }}</a>
            @endrole
        </header>
        @if ($users->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-primary">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">{{ trans('admin/employee/index.div.table.first') }}</th>
                        <th scope="col">{{ trans('admin/employee/index.div.table.last') }}</th>
                        <th scope="col">{{ trans('admin/employee/index.div.table.email') }}</th>
                        <th scope="col">{{ trans('admin/employee/index.div.table.role') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td scope="row"><input type="checkbox" name="user-{{ $user->id_employee }}"
                                                   id="user-{{ $user->id_employee }}"></td>
                            <th scope="row">{{ $user->id_employee }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{ trans('admin/employee/index.role.'.$user->rol) }}</td>
                            <td class="tinycell">
                                <div class="dropdown">
                                    <button id="ddm-{{ $user->id_employee }}"
                                            class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                            data-title="Create Customer" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        {{ trans('admin/employee/index.div.table.action') }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="ddm-{{ $user->id_employee }}">
                                        <button class="dropdown-item btn-show"
                                                data-id="show"
                                                data-action="{{ route("employees.show", $user) }}"
                                                data-userid="{{ $user->id_employee }}"
                                                data-firstname="{{ $user->first_name }}"
                                                data-lastname="{{ $user->last_name }}"
                                                data-email="{{ $user->email }}"
                                                data-phone="{{ $user->contact_number }}"
                                                data-rol="{{ $user->rol }}"
                                                data-lang="{{ $user->lang->name }}"
                                                data-active="{{ $user->active }}"
                                                @if (App::getLocale() == 'es')
                                                {{ Date::setLocale(App::getLocale())}}
                                                data-created="{{ Date::parse($user->created_at)->format('l j \\d\\e F Y h:i:s a')}}"
                                                @else
                                                data-created="{{ Auth::user()->created_at->format('l jS \\of F Y h:i:s a') }}"
                                                @endif
                                                {{-- data-created="{{ $user->created_at->format('F jS, Y @ H:i:s') }}"  --}}
                                                data-updated="{{ $user->updated_at->diffForHumans() }}"
                                                data-target="#modal-show"
                                                data-toggle="modal">
                                            <i class="far fa-eye"></i>{{ trans('admin/employee/index.div.table.show') }}
                                        </button>
                                        @role('Super administrador|Administrador')
                                            <a href="{{ route("employees.edit", $user) }}"
                                               class="dropdown-item btn-edit">
                                                <i class="fas fa-edit"></i>{{ trans('admin/employee/index.div.table.edit') }}
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <button class="dropdown-item btn-delete"
                                                    data-action="{{ route('employees.destroy', $user->id_employee) }}"
                                                    data-userid="{{ $user->id_employee }}"
                                                    data-firstname="{{ $user->first_name }}"
                                                    data-lastname="{{ $user->last_name }}"
                                                    data-target="#modal-delete"
                                                    data-toggle="modal">
                                                <i class="far fa-trash-alt"></i>{{ trans('admin/employee/index.div.table.delete') }}
                                            </button>
                                        @endrole
                                    </div> {{-- dropdown-menu --}}
                                </div> {{-- dropdown --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="d-flex flex-row align-items-center justify-content-between">
                <div>{{ trans('admin/employee/index.div.show') }} {{($users->currentpage()-1)*$users->perpage()+1}} {{ trans('admin/employee/index.div.to') }} {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} {{ trans('admin/employee/index.div.of') }} {{$users->total()}} {{ trans('admin/employee/index.div.entry') }}</div>
                {{ $users->links('pagination::bootstrap-4',['class'=>'pagination-sm']) }}
            </footer>
        @else
            <header class="alert alert-warning" role="alert">
                <h4><i class="fas fa-exclamation-triangle"></i> {{ trans('admin/employee/index.div.table.warning') }}:</h4>
                <p>There's no employees yet.</p>
                @role('Super administrador|Administrador')
                    <button class="btn btn-warning btn-create"
                            data-action="{{ route('employees.create') }}"
                            data-target="#modal-create"
                            data-toggle="modal">
                        <i class="fas fa-plus-circle"></i>{{ trans('admin/employee/index.div.button') }}
                    </button>
                @endrole
            </header>
        @endif
    </div>{{-- .card box-content-admin mb-3 --}}
@endsection

{{-- SECTION EXTRAS: Para agregar codigo adicional al contenido, por ejemplo: modales, etc.--}}
@section('extras')
    {{-- MODAL CREATE --}}
    @component('components.modal',['modal_id' => 'create', 'modal_title' => trans('admin/employee/index.extras.cmodal')])
        @slot('modal_content')
            @include('admin.employees.create')
        @endslot
        @slot('modal_actions')
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i>{{ trans('admin/employee/index.extras.cancel') }}</button>
            <button type="button" class="btn btn-success"><i class="fas fa-check-circle"></i>
                <span>{{ trans('admin/employee/index.extras.cmodal') }}</span>
            </button>
        @endslot
    @endcomponent

    {{-- MODAL SHOW --}}
    @component('components.modal',['modal_id' => 'show', 'modal_title' => ''])
        @slot('modal_content')
            @include('admin.employees.show')
        @endslot
        @slot('modal_actions')
            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-check-circle"></i>
                <span>{{ trans('admin/employee/index.extras.close') }}</span>
            </button>
        @endslot
    @endcomponent

    {{-- MODAL EDIT  
    {{$fieldDisabled = false}}
    {{$roles = ''}}
    @component('components.modal',['modal_id' => 'edit', 'modal_title' => 'Edit Employee'])
        @slot('modal_content')
            @include('admin.employees.edit')
        @endslot    
        @slot('modal_actions')
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</button> 
            <button type="button" class="btn btn-success"><i class="fas fa-check-circle"></i> <span></span></button>
        @endslot
    @endcomponent
    --}}

    {{-- MODAL DELETE --}}
    @component('components.modal',['modal_id' => 'delete', 'modal_title' => trans('admin/employee/index.extras.dmodal')])
        @slot('modal_content')
            <p class="mb-0 delete-message">
                {{ trans('admin/employee/index.extras.sure') }}:
            </p>
            <h4 class="delete-user"></h4>

        @endslot

        @slot('modal_actions')
            <form method="POST" role="form" action="">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i>{{ trans('admin/employee/index.extras.cancel') }}</button>
            <button class="btn btn-success"><i
                        class="fas fa-check-circle"></i>{{ trans('admin/employee/index.extras.delete') }}<span></span>
            </button>
        @endslot
    @endcomponent
@endsection

{{-- SECTION SCRIPTS --}}
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function () {
            // CREATE --------------------------------------------------------------------
            // Abre el modal con el formulariopara crear usuarios
            $('#modal-create').on('show.bs.modal', function (e) {
                $('#app').addClass('blurred');
                $('#modal-create').find('input:text, input:password, input:file, select, textarea').val('');
                $('#modal-create').find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
            });

            // Reseteo del formulario a sus valores iniciales una vez que el modal se oculta
            $('#modal-create').on('hide.bs.modal', function (e) {
                $('#app').removeClass('blurred');
                $('.modal .alert-messages').remove();
            });

            // Boton para enviar el formulario de creacion
            $('#modal-create .btn-success').click(function () {
                $('#modal-create form').submit();
            });


            // SHOW --------------------------------------------------------------------

            // Carga la data del usuario correcto a traves de los 'atributos data' del boton 'btn-show' al abrir el modal
            $('#modal-show').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var modal = $(this);
                $('#app').addClass('blurred');
                modal.find('.modal-title').text(button.data('firstname') + ' ' + button.data('lastname'));
                modal.find('#s-email a').text(button.data('email'));
                modal.find('#s-email a').attr('href', 'mailto:' + button.data('email'));
                modal.find('#s-phone td').text(button.data('phone'));
                modal.find('#s-lang-name td').text(button.data('lang'));
                modal.find('#s-rol td').text(button.data('rol'));
                modal.find('#s-created td').text(button.data('created'));
                modal.find('#s-updated td').text(button.data('updated'));
                modal.find('#s-updated td').html(button.data('updated'));
                // if (button.data('active') < 1){
                //     modal.find('#s-active td').removeClass('text-success').addClass('text-danger');
                //     modal.find('#s-active i').removeClass('fa-check-circle').addClass('fa-times-circle');
                //     modal.find('#s-active span').text('No');
                // } else {
                //     modal.find('#s-active td').removeClass('text-danger').addClass('text-success');
                //     modal.find('#s-active i').removeClass('fa-times-circle').addClass('fa-check-circle');
                //     modal.find('#s-active span').text('Yes');
                // }
            });

            // Remueve la clase blurred, para que la pagina sea legible
            $('#modal-show').on('hidden.bs.modal', function (e) {
                $('#app').removeClass('blurred');
            });

            /*
            // EDIT --------------------------------------------------------------------

            // Carga la data del usuario correcto en los campos del formulario de edicion a traves de los 'atributos data' del boton 'btn-edit' al abrir el modal
            
            $('.btn-edit').click(function (e) {
                e.preventDefault();
                var editLink = $(this).attr('href');
                $.ajax({
                    url: editLink,
                    type: 'GET',
                    success: function(data) {
                        var modal = $('#modal-edit');
                        modal.find('.btn-success span').text('Edit ' + data.user.first_name);
                        modal.find('form').prop('action', function (i, old) {
                            return old.replace(':USER_ID', data.user.id_employee);
                        });
                        modal.find('#id_employee').val(data.user.id_employee);
                        modal.find('#first_name').val(data.user.first_name);
                        modal.find('#last_name').val(data.user.last_name);
                        modal.find('#email').val(data.user.email);
                        modal.find('#contact_number').val(data.user.contact_number);
                        modal.find('select, input:checkbox').prop(data.fieldDisabled);
                        modal.find('#rol').val(data.roles);
                    }
                }).fail(function () {
                    alert("Server error, please try again!");
                });  
            });   


            $('#modal-edit').on('show.bs.modal', function (e) {
                $('#app').addClass('blurred');
            });

            // Reseteo del formulario a sus valores iniciales una vez que el modal se oculta
            $('#modal-edit').on('hide.bs.modal', function (e) {
                var editUserId = $('#modal-edit #id_employee').val();
                $('#app').removeClass('blurred');
                $('#modal-edit form').prop('action', function (i, old) {
                    return old.replace(editUserId ,':USER_ID' );
                });
                $('.modal .alert-messages').remove();
            });

            // Boton para enviar el formulario de edicion
            $('#modal-edit .btn-success').click(function(){
                $('#modal-edit form').submit();
            });
            */


            // DELETE --------------------------------------------------------------------

            // Carga la data del usuario correcto a traves de los 'atributos data' del boton 'btn-delete' al abrir el modal
            $('#modal-delete').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var modal = $(this);
                $('#app').addClass('blurred');
                modal.find('form').prop('action', button.data('action'));
                modal.find('.modal-title').text(button.data('title'));
                modal.find('.delete-message').text(button.data('message'));
                modal.find('.delete-user').text('#' + button.data('userid') + ' - ' + button.data('firstname') + ' ' + button.data('lastname'));
                modal.find('.btn-success span').text(' ' + (button.data('firstname')));
            });

            // Elimina los elementos "p" que fueron creados dinamicamente al abrir el modal
            $('#modal-delete').on('hidden.bs.modal', function (e) {
                $('#app').removeClass('blurred');
            });

            // Boton para enviar el formulario borrar
            $('#modal-delete .btn-success').click(function () {
                $('#modal-delete form').submit();
            });
        });
    </script>
    @if($errors->create->any())
        <script>
            //ERROR CREATE --------------------------------------------------------------------
            $('#modal-create .btn-success span').text('Create Customer');
            $('#modal-create').modal('show');
        </script>
        {{--
        @elseif($errors->edit->any())
            <script>
                //ERROR EDIT --------------------------------------------------------------------
                var editUserId = $('#modal-edit #user_id').val();
                var editFirstName = $('#modal-edit #first_name').val();
                $('#modal-edit form').prop('action', function (i, old) {
                    return old.replace(':USER_ID', editUserId);
                });
                $('#modal-edit .btn-success span').text('Edit ' + editFirstName);
                $('#modal-edit').modal('show');
            </script>
        --}}
    @endif
@endsection