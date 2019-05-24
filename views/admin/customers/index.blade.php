@extends('layouts.admin')

{{-- SECTION TITLE --}}
@section('title', trans('admin/customer/index.title'))

{{-- SECTION CONTENT --}}
@section('content')
    <div class="card box-content-admin mb-3">
        <header class="d-flex flex-row align-items-center justify-content-between">
            <div>
                @if ($users->count() > 0)
                    {{ trans('admin/customer/index.div.show') }} {{($users->currentpage()-1)*$users->perpage()+1}} {{ trans('admin/customer/index.div.to') }} {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} {{ trans('admin/customer/index.div.of') }} {{$users->total()}} {{ trans('admin/customer/index.div.entry') }}
                @else
                    {{ trans('admin/customer/index.div.no') }}.
                @endif
            </div>
            @role('Super administrador|Administrador')
                <button class="btn btn-secondary btn-create"
                        data-action="{{ route("customers.create") }}"
                        data-target="#modal-create"
                        data-toggle="modal">
                    <i class="fas fa-plus-circle"></i> {{ trans('admin/customer/index.div.button') }}
                </button>
            @endrole
        </header>
        @if ($users->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-primary">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">{{ trans('admin/customer/index.div.table.first') }}</th>
                        <th scope="col">{{ trans('admin/customer/index.div.table.last') }}</th>
                        <th scope="col">{{ trans('admin/customer/index.div.table.email') }}</th>
                        <th scope="col">{{ trans('admin/customer/index.div.table.role') }}</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr data-id="{{ $user->id }}">
                            <td scope="row"><input type="checkbox" name="user-{{ $user->id }}"
                                                   id="user-{{ $user->id }}"></td>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                            <td>{{ trans("admin/customer/index.role.$user->rol") }}</td>
                            <td class="tinycell">
                                <div class="dropdown">
                                    <button id="ddm-{{ $user->id }}" class="btn btn-primary btn-sm dropdown-toggle"
                                            type="button" data-title="Create Customer" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        {{ trans('admin/customer/index.div.table.action') }}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="ddm-{{ $user->id }}">
                                        <button class="dropdown-item btn-show"
                                                data-action="{{ route("customers.show", $user) }}"
                                                data-userid="{{ $user->id }}"
                                                data-firstname="{{ $user->first_name }}"
                                                data-lastname="{{ $user->last_name }}"
                                                data-email="{{ $user->email }}"
                                                data-phone="{{ $user->contact_number }}"
                                                data-rol={{ trans("admin/customer/index.role.$user->rol") }}
                                                        data-lang="{{ $user->lang->name }}"
                                                data-active="{{ $user->active }}"
                                                data-validate="{{ $user->validate }}"
                                                data-certificate="{{ $user->certificate }}"
                                                @if (App::getLocale() == 'es')
                                                {{ Date::setLocale(App::getLocale())}}
                                                data-created="{{ Date::parse($user->created_at)->format('l j \\d\\e F Y h:i:s a')}}"
                                                @else
                                                data-created="{{ Auth::user()->created_at->format('l jS \\of F Y h:i:s a') }}"
                                                @endif
                                                data-updated="{{ $user->updated_at->diffForHumans() }}"
                                                data-target="#modal-show"
                                                data-toggle="modal">
                                            <i class="far fa-eye"></i> {{ trans('admin/customer/index.div.table.show') }}
                                        </button>
                                        @role('Super administrador|Administrador')
                                            <button class="dropdown-item btn-edit"
                                                    data-userid="{{ $user->id }}"
                                                    data-firstname="{{ $user->first_name }}"
                                                    data-lastname="{{ $user->last_name }}"
                                                    data-email="{{ $user->email }}"
                                                    data-contactnumber="{{ $user->contact_number }}"
                                                    data-rol="{{ $user->id_rol }}"
                                                    data-active="{{ $user->active }}"
                                                    data-validate="{{ $user->validate }}"
                                                    data-certificate="{{ $user->certificate }}"
                                                    data-target="#modal-edit"
                                                    data-toggle="modal">
                                                <i class="fas fa-edit"></i> {{ trans('admin/customer/index.div.table.edit') }}
                                            </button>
                                            <div class="dropdown-divider"></div>
                                            <button class="dropdown-item btn-delete"
                                                    data-action="{{ route('customers.destroy', $user->id) }}"
                                                    data-userid="{{ $user->id }}"
                                                    data-firstname="{{ $user->first_name }}"
                                                    data-lastname="{{ $user->last_name }}"
                                                    data-target="#modal-delete"
                                                    data-toggle="modal">
                                                <i class="far fa-trash-alt"></i> {{ trans('admin/customer/index.div.table.delete') }}
                                            </button>
                                        @endrole
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="d-flex flex-row align-items-center justify-content-between">
                <div>{{ trans('admin/customer/index.div.show') }} {{($users->currentpage()-1)*$users->perpage()+1}} {{ trans('admin/customer/index.div.to') }} {{(($users->currentpage()-1)*$users->perpage())+$users->count()}} {{ trans('admin/customer/index.div.of') }} {{$users->total()}} {{ trans('admin/customer/index.div.entry') }}</div>
                {{ $users->links('pagination::bootstrap-4',['class'=>'pagination-sm']) }}
            </footer>
        @else
            <header class="alert alert-warning" role="alert">
                <h4><i class="fas fa-exclamation-triangle"></i> {{ trans('admin/customer/index.div.table.warning') }}:</h4>
                <p>{{ trans('admin/customer/index.div.table.no') }}.</p>
                @role('Super administrador|Administrador')
                    <button class="btn btn-warning btn-create"
                            data-action="{{ route("customers.create") }}"
                            data-target="#modal-create"
                            data-toggle="modal">
                        <i class="fas fa-plus-circle"></i> {{ trans('admin/customer/index.div.table.create') }}</a>
                    </button>
                @endrole
            </header>
        @endif
    </div> {{-- .card box-content-admin mb-3 --}}
@endsection

{{-- SECTION EXTRAS: Para agregar codigo adicional al contenido, por ejemplo: modales, etc.--}}
@section('extras')
    {{-- MODAL CREATE --}}
    @component('components.modal',['modal_id' => 'create', 'modal_title' => trans('admin/customer/index.extras.cmodal')])
        @slot('modal_content')
            @include('admin.customers.create')
        @endslot
        @slot('modal_actions')
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i> {{ trans('admin/customer/index.extras.cancel') }}</button>
            <button type="button" class="btn btn-success"><i class="fas fa-check-circle"></i>
                <span>{{ trans('admin/customer/index.extras.create') }}</span></button>
        @endslot
    @endcomponent

    {{-- MODAL SHOW --}}
    @component('components.modal',['modal_id' => 'show', 'modal_title' => ''])
        @slot('modal_content')
            @include('admin.customers.show')
        @endslot
        @slot('modal_actions')
            <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-check-circle"></i>
                <span>{{ trans('admin/customer/index.extras.close') }}</span></button>
        @endslot
    @endcomponent

    {{-- MODAL EDIT --}}
    @component('components.modal',['modal_id' => 'edit', 'modal_title' => trans('admin/customer/index.extras.emodal')])
        @slot('modal_content')
            @include('admin.customers.edit')
        @endslot
        @slot('modal_actions')
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i> {{ trans('admin/customer/index.extras.cancel') }}</button>
            <button type="button" class="btn btn-success"><i
                        class="fas fa-check-circle"></i>{{ trans('admin/customer/index.div.table.edit') }}<span></span>
            </button>
        @endslot
    @endcomponent

    {{-- MODAL DELETE --}}
    @component('components.modal',['modal_id' => 'delete', 'modal_title' => trans('admin/customer/index.extras.dmodal')])
        @slot('modal_content')
            <p class="mb-0 delete-temp delete-message">
                {{ trans('admin/customer/index.extras.sure') }}:
            </p>
            <h4 class="delete-temp delete-user"></h4>
        @endslot

        @slot('modal_actions')
            <form role="form" method="POST" action="">
                {!! method_field('DELETE') !!}
                {!! csrf_field() !!}
            </form>
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i
                        class="fas fa-times-circle"></i> {{ trans('admin/customer/index.extras.cancel') }}</button>
            <button class="btn btn-success"><i
                        class="fas fa-check-circle"></i> {{ trans('admin/customer/index.extras.delete') }} <span></span>
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
            $('#modal-create').on('show.bs.modal', function () {
                $('#app').addClass('blurred');
                $('#modal-create').find('input:text, input:password, input:file, select, textarea').val('');
                $('#modal-create').find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
            });

            // Reseteo del formulario a sus valores iniciales una vez que el modal se oculta y remueve la clase blurred, para que la pagina sea legible
            $('#modal-create').on('hide.bs.modal', function () {
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
                if (button.data('active') < 1) {
                    modal.find('#s-active').removeClass('text-success').addClass('text-danger');
                    modal.find('#s-active i').removeClass('fa-check-circle').addClass('fa-times-circle');
                } else {
                    modal.find('#s-active').removeClass('text-danger').addClass('text-success');
                    modal.find('#s-active i').removeClass('fa-times-circle').addClass('fa-check-circle');
                }
                if (button.data('validate') < 1) {
                    modal.find('#s-validate').removeClass('text-success').addClass('text-danger');
                    modal.find('#s-validate i').removeClass('fa-check-circle').addClass('fa-times-circle');
                } else {
                    modal.find('#s-validate').removeClass('text-danger').addClass('text-success');
                    modal.find('#s-validate i').removeClass('fa-times-circle').addClass('fa-check-circle');
                }
                if (button.data('certificate') < 1) {
                    modal.find('#s-certificate').removeClass('text-success').addClass('text-danger');
                    modal.find('#s-certificate i').removeClass('fa-check-circle').addClass('fa-times-circle');
                } else {
                    modal.find('#s-certificate').removeClass('text-danger').addClass('text-success');
                    modal.find('#s-certificate i').removeClass('fa-times-circle').addClass('fa-check-circle');
                }
            });

            // Remueve la clase blurred, para que la pagina sea legible
            $('#modal-show').on('hidden.bs.modal', function () {
                $('#app').removeClass('blurred');
            });

            // EDIT --------------------------------------------------------------------

            // Carga la data del usuario correcto en los campos del formulario de edicion a traves de los 'atributos data' del boton 'btn-edit' al abrir el modal
            $('#modal-edit').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var modal = $(this);
                var editUserId = button.data('userid');
                var editFirstName = button.data('firstname');
                var editLastName = button.data('lastname');
                var editEmail = button.data('email');
                var editContactNumber = button.data('contactnumber');
                var editRol = button.data('rol');
                var editActive = button.data('active');
                var editValidate = button.data('validate');
                var editCertificate = button.data('certificate');
                var formUser = $('#modal-edit form').data('formuser');
                $('#app').addClass('blurred');
                $('#modal-edit form').prop('action', function (i, old) {
                    return old.replace(':USER_ID', editUserId);
                });
                modal.find('.btn-success span').text(' ' + editFirstName);
                modal.find('.modal-title').text(editFirstName + ' ' + editLastName);
                modal.find('#user_id').val(editUserId);
                modal.find('#first_name').val(editFirstName);
                modal.find('#last_name').val(editLastName);
                modal.find('#email').val(editEmail);
                modal.find('#contact_number').val(editContactNumber);
                modal.find('#rol').val(editRol);
                if (editActive < 1) {
                    modal.find('#active').prop('checked', false);
                } else {
                    modal.find('#active').prop('checked', true);
                }
                if (editValidate < 1) {
                    modal.find('#validate').prop('checked', false);
                } else {
                    modal.find('#validate').prop('checked', true);
                }
                if (editCertificate < 1) {
                    modal.find('#certificate').prop('checked', false);
                } else {
                    modal.find('#certificate').prop('checked', true);
                }
            });

            // Reseteo del formulario a sus valores iniciales una vez que el modal se oculta y remueve la clase blurred, para que la pagina sea legible
            $('#modal-edit').on('hide.bs.modal', function () {
                var editUserId = $('#modal-edit #user_id').val();
                $('#app').removeClass('blurred');
                $('#modal-edit form').prop('action', function (i, old) {
                    return old.replace(editUserId, ':USER_ID');
                });
                $('.modal .alert-messages').remove();
            });

            // Boton para enviar el formulario de edicion
            $('#modal-edit .btn-success').click(function () {
                $('#modal-edit form').submit();
            });


            // DELETE --------------------------------------------------------------------

            // Carga la data del usuario correcto a traves de los 'atributos data' del boton 'btn-delete' al abrir el modal
            $('#modal-delete').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var modal = $(this);
                $('#app').addClass('blurred');
                modal.find('form').prop('action', button.data('action'));
                modal.find('.modal-title').text(button.data('title'));
                modal.find('.delete-user').text('#' + button.data('userid') + ' - ' + button.data('firstname') + ' ' + button.data('lastname'));
                modal.find('.btn-success span').text(button.data('firstname'));
            });

            // Elimina los elementos ".delete-temp" que fueron creados dinamicamente al abrir el modal y remueve la clase blurred, para que la pagina sea legible
            $('#modal-delete').on('hidden.bs.modal', function () {
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
    @elseif($errors->edit->any())
        <script>
            //ERROR EDIT --------------------------------------------------------------------
            var editUserId = $('#modal-edit #user_id').val();
            var editFirstName = $('#modal-edit #first_name').val();
            $('#modal-edit form').prop('action', function (i, old) {
                return old.replace(':USER_ID', editUserId);
            });
            $('#modal-edit .btn-success span').text(editFirstName);
            $('#modal-edit').modal('show');
        </script>
    @endif
@endsection