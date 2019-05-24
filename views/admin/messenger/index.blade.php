@extends('layouts.admin')

@section('title', trans('admin/messenger/index.table.message'))

@section('content')
    <p>
        <a href="{{ route('messenger-admin.index') }}" class="btn btn-link">Consultar todo ordenado
            descendentemente</a><br>
        <a href="{{ route('messenger-admin.index-asc') }}" class="btn btn-link">Consultar todo
            ordenado ascendentemente</a><br>
        <a href="{{ route('messenger-admin.category', ['option' => 1]) }}" class="btn btn-link">Consultar todo ordenado
            descendentemente por ATC</a> ||
        <a href="{{ route('messenger-admin.category', ['option' => 2]) }}" class="btn btn-link">Consultar todo ordenado
            descendentemente por Reclamos</a> ||
        <a href="{{ route('messenger-admin.category', ['option' => 3]) }}" class="btn btn-link">Consultar todo ordenado
            descendentemente por Soporte</a><br>
        <a href="{{ route('messenger-admin.category-asc', ['opcion' => 1]) }}" class="btn btn-link">Consultar
            todo ordenado ascendentemente por ATC</a> ||
        <a href="{{ route('messenger-admin.category-asc', ['opcion' => 2]) }}" class="btn btn-link">Consultar
            todo ordenado ascendentemente por Reclamos</a> ||
        <a href="{{ route('messenger-admin.category-asc', ['opcion' => 3]) }}" class="btn btn-link">Consultar
            todo ordenado ascendentemente por Soporte</a><br>
        <a href="{{ route('messenger-admin.status', ['option' => 1]) }}" class="btn btn-link">DESC por estado
            'Enviado'</a> ||
        <a href="{{ route('messenger-admin.status', ['option' => 2]) }}" class="btn btn-link">DESC por estado
            'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.status', ['option' => 3]) }}" class="btn btn-link">DESC por estado
            'Recibido'</a> ||
        <a href="{{ route('messenger-admin.status', ['option' => 4]) }}" class="btn btn-link">DESC por estado
            'Abierto'</a> ||
        <a href="{{ route('messenger-admin.status', ['option' => 5]) }}" class="btn btn-link">DESC por estado
            'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.status-asc', ['option' => 1]) }}" class="btn btn-link">ASC por estado
            'Enviado'</a> ||
        <a href="{{ route('messenger-admin.status-asc', ['option' => 2]) }}" class="btn btn-link">ASC por estado
            'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.status-asc', ['option' => 3]) }}" class="btn btn-link">ASC por estado
            'Recibido'</a> ||
        <a href="{{ route('messenger-admin.status-asc', ['option' => 4]) }}" class="btn btn-link">ASC por estado
            'Abierto'</a> ||
        <a href="{{ route('messenger-admin.status-asc', ['option' => 5]) }}" class="btn btn-link">ASC por estado
            'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 1, 'opcion1' => 1]) }}" class="btn btn-link">Categoría
            'ATC' DESC por estado 'Enviado'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 1, 'opcion1' => 2]) }}" class="btn btn-link">Categoría
            'ATC' DESC por estado 'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 1, 'opcion1' => 3]) }}" class="btn btn-link">Categoría
            'ATC' DESC por estado 'Recibido'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 1, 'opcion1' => 4]) }}" class="btn btn-link">Categoría
            'ATC' DESC por estado 'Abierto'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 1, 'opcion1' => 5]) }}" class="btn btn-link">Categoría
            'ATC' DESC por estado 'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 2, 'opcion1' => 1]) }}" class="btn btn-link">Categoría
            'Reclamos' DESC por estado 'Enviado'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 2, 'opcion1' => 2]) }}" class="btn btn-link">Categoría
            'Reclamos' DESC por estado 'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 2, 'opcion1' => 3]) }}" class="btn btn-link">Categoría
            'Reclamos' DESC por estado 'Recibido'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 2, 'opcion1' => 4]) }}" class="btn btn-link">Categoría
            'Reclamos' DESC por estado 'Abierto'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 2, 'opcion1' => 5]) }}" class="btn btn-link">Categoría
            'Reclamos' DESC por estado 'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 3, 'opcion1' => 1]) }}" class="btn btn-link">Categoría
            'Soporte' DESC por estado 'Enviado'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 3, 'opcion1' => 2]) }}" class="btn btn-link">Categoría
            'Soporte' DESC por estado 'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 3, 'opcion1' => 3]) }}" class="btn btn-link">Categoría
            'Soporte' DESC por estado 'Recibido'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 3, 'opcion1' => 4]) }}" class="btn btn-link">Categoría
            'Soporte' DESC por estado 'Abierto'</a> ||
        <a href="{{ route('messenger-admin.category.status', ['opcion' => 3, 'opcion1' => 5]) }}" class="btn btn-link">Categoría
            'Soporte' DESC por estado 'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 1, 'opcion1' => 1]) }}"
           class="btn btn-link">Categoría 'ATC' ASC por estado 'Enviado'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 1, 'opcion1' => 2]) }}"
           class="btn btn-link">Categoría 'ATC' ASC por estado 'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 1, 'opcion1' => 3]) }}"
           class="btn btn-link">Categoría 'ATC' ASC por estado 'Recibido'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 1, 'opcion1' => 4]) }}"
           class="btn btn-link">Categoría 'ATC' ASC por estado 'Abierto'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 1, 'opcion1' => 5]) }}"
           class="btn btn-link">Categoría 'ATC' ASC por estado 'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 2, 'opcion1' => 1]) }}"
           class="btn btn-link">Categoría 'Reclamos' ASC por estado 'Enviado'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 2, 'opcion1' => 2]) }}"
           class="btn btn-link">Categoría 'Reclamos' ASC por estado 'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 2, 'opcion1' => 3]) }}"
           class="btn btn-link">Categoría 'Reclamos' ASC por estado 'Recibido'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 2, 'opcion1' => 4]) }}"
           class="btn btn-link">Categoría 'Reclamos' ASC por estado 'Abierto'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 2, 'opcion1' => 5]) }}"
           class="btn btn-link">Categoría 'Reclamos' ASC por estado 'Cerrado'</a><br>
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 3, 'opcion1' => 1]) }}"
           class="btn btn-link">Categoría 'Soporte' ASC por estado 'Enviado'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 3, 'opcion1' => 2]) }}"
           class="btn btn-link">Categoría 'Soporte' ASC por estado 'Nuevo'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 3, 'opcion1' => 3]) }}"
           class="btn btn-link">Categoría 'Soporte' ASC por estado 'Recibido'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 3, 'opcion1' => 4]) }}"
           class="btn btn-link">Categoría 'Soporte' ASC por estado 'Abierto'</a> ||
        <a href="{{ route('messenger-admin.category.status-asc', ['opcion' => 3, 'opcion1' => 5]) }}"
           class="btn btn-link">Categoría 'Soporte' ASC por estado 'Cerrado'</a><br>

    </p>
    @if ($message == "vacio")
        Usted no posee mensajes
    @else
        {{ $message->links() }}
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <td scope="col">Id</td>
                <td scope="col">{{ trans('admin/messenger/index.table.subject') }}</td>
                <td scope="col">{{ trans('admin/messenger/index.table.message') }}</td>
                <td scope="col">{{ trans('admin/messenger/index.table.category') }}</td>
                <td scope="col">{{ trans('admin/messenger/index.table.state') }}</td>
                <td scope="col">{{ trans('admin/messenger/index.table.seen') }}</td>
                <td scope="col">{{ trans('admin/messenger/index.table.update') }}</td>
            </tr>
            </thead>
            <tbody>
            @foreach ($message as $content)
                <tr>
                    <td scope="row"><a
                                href="{{ route('messenger-admin.show', ['id' => $content->id]) }}"> {{ $content->id }} </a>
                    </td>
                    <td>{{ $content->messageHeader->subject }}</td>
                    <td>{{ $content->message }}</td>
                    <td>{{ trans("admin/messenger/index.category.".$content->messageHeader->messageCategory->name) }}</td>
                    <td>{{ trans("admin/messenger/index.category.".$content->messageStatusAdmin->name) }}</td>
                    @if ($content->id_message_status_admin == 1)
                        <td>{{ $content->userRemitter->first_name }} {{ $content->userRemitter->last_name }}</td>
                    @elseif ($content->id_message_status_admin == 2)
                        <td>{{ $content->userRemitter->first_name }} {{ $content->userRemitter->last_name }}</td>
                    @elseif ($content->id_message_status_admin == 3)
                        <td>{{ $content->userRemitter->first_name }} {{ $content->userRemitter->last_name }}</td>
                    @elseif ($content->id_message_status_admin == 4 )
                        <td>{{ $content->userReceiver->first_name }} {{ $content->userReceiver->last_name }}</td>
                    @elseif ($content->id_message_status_admin == 5)
                        <td></td>
                    @endif
                    @if (App::getLocale() == 'es')
                        <td>{{ $content->updated_at->format('d m Y  H:i:s') }}</td>    
                    @elseif(App::getLocale() == 'en')
                        <td>{{ $content->updated_at->format('m d Y H:i:s') }}</td>
                    @endif
                </tr>
            @endforeach
            </tbody>

        </table>
        {{ $message->links() }}

    @endif
    <p>
        <a href="{{ route('dashboard.index') }}">{{ trans('admin/messenger/index.category.home') }}</a>
    </p>
@endsection