@extends('layouts.admin')

@section('title', trans('admin/category/index.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('categories') }}
@endsection

@section('content')
{{-- MENSAJES DEL SERVIDOR AL ACTUALIZAR EL ORDEN DE LAS CATEGORIAS CON SORTABLE--}}
<div id="success-alert" class="alert alert-success alert-temporal">
    <i class="fas fa-check-circle"></i> {{ trans('admin/category/index.content.category') }}.
</div>
<div id="fail-alert" class="alert alert-danger alert-temporal">
    <i class="fas fa-exclamation-triangle"></i>{{ trans('admin/category/index.content.server') }}.
</div>
<div class="card box-content-admin mb-3">
    <header class="d-flex flex-row align-items-center justify-content-between">
        <div>
            @if ($categories->count() > 0)
            {{ trans('admin/category/index.content.div0.show') }} {{($categories->currentpage()-1)*$categories->perpage()+1}} {{ trans('admin/category/index.content.div0.to') }} {{(($categories->currentpage()-1)*$categories->perpage())+$categories->count()}} {{ trans('admin/category/index.content.div0.of') }} {{$categories->total()}} {{ trans('admin/category/index.content.div0.entries') }}
            @else
            {{ trans('admin/category/index.content.div0.category') }}.
            @endif
        </div>
        @role('Super administrador|Administrador')
        <a href="{{ route('categories-admin.create') }}" class="btn btn-secondary btn-create"> <i class="fas fa-plus-circle"></i>{{ trans('admin/category/index.content.role') }}</a>
        @endrole
    </header>
    @if ($categories->isNotEmpty())
    <div class="table-responsive">
        <table class="table table-borderless table-striped table-hover table-primary">
            <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col">ID</th>
                <th scope="col"> {{ trans('admin/category/index.content.div1.name') }}</th>
                <th scope="col"> {{ trans('admin/category/index.content.div1.subcategory') }}</th>
                <th scope="col"> {{ trans('admin/category/index.content.div1.position') }}</th>
                <th scope="col"> {{ trans('admin/category/index.content.div1.active') }}</th>
                <th scope="col"> </th>
            </tr>
            </thead>
            {{ method_field('PUT') }}
            <tbody id="categories-sort" data-route="{{ route('categories-admin.update-category') }}">
            @foreach($categories as $category)
                <tr data-index="{{ $category->id_category }}" data-position="{{ $category->position }}">
                    <td class="tinycell"><input type="checkbox" name="cat-{{ $category->id_category }}" id="cat-{{ $category->id_category }}"></td>
                    <th class="tinycell" scope="row">{{ $category->id_category }}</th>
                    <td><a href="{{ route("categories-admin.show", $category->slug) }}">{{ $category->langs()->wherePivot('id_lang', Auth::user()->id_lang)->first()->pivot->name }}</a></td>
                    <td class="text-center tinycell">{{ $category->childs->count() }}</td>
                    <td class="position text-center tinycell"><i class="fas fa-arrows-alt-v"></i> {{ $category->position }}</td>
                    <td class="text-center tinycell">
                        @if ($category->active > 0)
                            <i class="fas fa-check-circle text-success"></i> 
                        @else 
                            <i class="fas fa-times-circle text-danger"></i>
                        @endif
                    </td>
                    <td class="tinycell">
                        <div class="dropdown">
                            <button type="button" id="ddm-{{ $category->id_category }}" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ trans('admin/category/index.content.div1.action') }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="ddm-{{ $category->id_category }}">
                                <a href="{{ route("categories-admin.show", $category->slug) }}" class="dropdown-item"><i class="far fa-eye"></i>{{ trans('admin/category/index.content.div1.show') }}</a>
                                @role('Super administrador|Administrador')
                                    <a href="{{ route("categories-admin.edit", $category->slug) }}" class="dropdown-item"><i class="fas fa-edit"></i>{{ trans('admin/category/index.content.div1.edit') }}</a>
                                    <div class="dropdown-divider"></div>
                                    <button class="dropdown-item btn-delete" 
                                        data-action="{{ route('categories-admin.destroy', $category->id_category) }}"
                                        data-catid="{{ $category->id_category }}"
                                        data-catname="{{ $category->name }}"
                                        data-target="#modal-delete" 
                                        data-toggle="modal">
                                            <i class="far fa-trash-alt"></i> {{ trans('admin/category/index.content.div1.delete') }}
                                    </button>
                                @endrole
                            </div>
                        </div>   
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>{{-- .table-responsive --}}
    <footer class="d-flex flex-row align-items-center justify-content-between">
        <div>
            {{ trans('admin/category/index.content.div0.show') }} {{($categories->currentpage()-1)*$categories->perpage()+1}} {{ trans('admin/category/index.content.div0.to') }} {{(($categories->currentpage()-1)*$categories->perpage())+$categories->count()}} {{ trans('admin/category/index.content.div0.of') }} {{$categories->total()}} {{ trans('admin/category/index.content.div0.entries') }}
        </div>
        {{ $categories->links('pagination::bootstrap-4',['class'=>'pagination-sm']) }} 
    </footer>
    @else
    <header class="alert alert-warning" role="alert">
        <h4><i class="fas fa-exclamation-triangle"></i> {{ trans('admin/category/index.content.div1.header.warning') }}:</h4>
        <p>{{ trans('admin/category/index.content.div1.header.category') }}.</strong></p>
        @role('Super administrador|Administrador')
            <a href="{{ route('categories-admin.create') }}" class="btn btn-warning btn-create"> {{ trans('admin/category/index.content.div1.header.add') }}</a>
        @endrole
    </header>
    @endif
</div>{{-- .card box-content-admin mb-3 --}}
@endsection

{{-- SECTION EXTRAS: Para agregar codigo adicional al contenido, por ejemplo: modales, etc.--}}
@section('extras')
    {{-- MODAL DELETE --}}
    @component('components.modal',['modal_id' => 'delete', 'modal_title' => trans('admin/category/show.extras.modal')])
        @slot('modal_content')
            <p class="mb-0 delete-temp delete-message">
                {{ trans('admin/category/index.extras.sure') }}
            </p>
            <h4 class="delete-temp delete-object"></h4>   
        @endslot

        @slot('modal_actions')
            <form role="form" method="POST" action="">
                {!! method_field('DELETE') !!}
                {!! csrf_field() !!}
            </form>
            <button type="button" class="btn btn-danger mr-1" data-dismiss="modal"><i class="fas fa-times-circle"></i>{{ trans('admin/category/index.extras.cancel') }}</button> 
            <button class="btn btn-success"><i class="fas fa-check-circle"></i>{{ trans('admin/category/index.content.div1.delete') }} <span></span></button>
            
        @endslot
    @endcomponent
@endsection

{{-- SECTION SCRIPTS --}}
@section('scripts')
    <script type="application/javascript">
        $(document).ready(function(){
            // DELETE --------------------------------------------------------------------

            // Carga la data de la categoria correcta a traves de los 'atributos data' del boton 'btn-delete' al abrir el modal
            $('#modal-delete').on('show.bs.modal', function (e) {
                var button = $(e.relatedTarget);
                var modal = $(this);
                $('#app').addClass('blurred');
                modal.find('form').prop('action', button.data('action'));
                modal.find('.delete-object').text(button.data('catname')+' (ID: '+button.data('catid')+') ');
                modal.find('.btn-success span').text(button.data('catname'));
            });
            
            // Elimina los elementos ".delete-temp" que fueron creados dinamicamente al abrir el modal y remueve la clase blurred, para que la pagina sea legible
            $('#modal-delete').on('hidden.bs.modal', function (e) {
                $('#app').removeClass('blurred');
            });

            // Boton para enviar el formulario borrar
            $('#modal-delete .btn-success').click(function(){
                $('#modal-delete form').submit();
            });
        });
    </script>
@endsection