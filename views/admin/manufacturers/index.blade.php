@extends('layouts.admin')

@section('title', trans('admin/manufacturer/index.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('manufacturersAdmin') }}
@endsection

@section('content')
    <div class="card box-content-admin mb-3">
        <header class="d-flex flex-row align-items-center justify-content-between">
            <div>
                @if ($productManufacturers->count() > 0)
                    {{ trans('admin/manufacturer/index.showing_entries', ['from' => ($productManufacturers->currentpage()-1)*$productManufacturers->perpage()+1, 'end' => (($productManufacturers->currentpage()-1)*$productManufacturers->perpage())+$productManufacturers->count(), 'total' => $productManufacturers->total()]) }}
                @else
                    {{ trans('admin/manufacturer/index.no_manufacturers') }}
                @endif
            </div>
            @role('Super administrador|Administrador')
                <a href="{{ route('manufacturers-admin.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> {{ trans('admin/manufacturer/index.add_manufacturer') }}
                </a>
            @endrole
        </header>
        @if ($productManufacturers->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-primary">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">{{ trans('admin/manufacturer/index.name') }}</th>
                        <th scope="col">{{ trans('admin/manufacturer/index.active') }}</th>
                        <th scope="col">{{ trans('admin/manufacturer/index.created_at') }}</th>
                        <th scope="col">{{ trans('admin/manufacturer/index.updated_at') }}</th>
                        <th scope="col">{{ trans('admin/manufacturer/index.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productManufacturers as $productManufacturer)
                        <tr>
                            <td scope="row"><input type="checkbox"
                                                   name="user-address-{{ $productManufacturer->id_product_manufacturer }}"
                                                   id="user-address-{{ $productManufacturer->id_product_manufacturer }}"></td>
                            <th scope="row">{{ $productManufacturer->id_product_manufacturer }}</th>
                            <td>{{ $productManufacturer->name }}</td>
                            <td>
                                @if($productManufacturer->active)
                                    <i class="fas fa-check-circle fa-2x"></i>
                                @else
                                    <i class="fas fa-times-circle fa-2x"></i>
                                @endif
                            </td>
                            <td>
                                {{ trans('admin/manufacturer/index.full_date_created', ['day_name' => Date::parse($productManufacturer->created_at)->format('l'), 'day' => Date::parse($productManufacturer->created_at)->format('j'), 'month_name' => Date::parse($productManufacturer->created_at)->format('F'), 'year_and_time' => Date::parse($productManufacturer->created_at)->format('Y H:i:s')]) }}
                            </td>
                            <td>{{ $productManufacturer->updated_at->diffForHumans() }}</td>
                            <td>
                                <form method="POST"
                                      action="{{ route('manufacturers-admin.destroy', $productManufacturer->id_product_manufacturer) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    @role('Super administrador|Administrador')
                                        <a href="{{ route("manufacturers-admin.edit", $productManufacturer->id_product_manufacturer) }}"
                                           class="btn btn-link">{{ trans('admin/manufacturer/index.edit') }}</a>
                                        <button type="submit" class="btn btn-link"
                                                onclick="return confirm('Are you sure you want to delete it?')">{{ trans('admin/manufacturer/index.delete') }}
                                        </button>
                                    @endrole
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="d-flex flex-row align-items-center justify-content-between">
                <div>
                    {{ trans('admin/manufacturer/index.showing_entries', ['from' => ($productManufacturers->currentpage()-1)*$productManufacturers->perpage()+1, 'end' => (($productManufacturers->currentpage()-1)*$productManufacturers->perpage())+$productManufacturers->count(), 'total' => $productManufacturers->total()]) }}
                </div>
                {{ $productManufacturers->links('pagination::bootstrap-4',['class'=>'pagination-sm']) }}
            </footer>
        @else
            <header class="alert alert-warning" role="alert">
                <h4><i class="fas fa-exclamation-triangle"></i> {{ trans('admin/manufacturer/index.warning') }}</h4>
                <p>{{ trans('admin/manufacturer/index.manufacturers_yet') }}</p>
                @role('Super administrador|Administrador')
                    <a href="{{ route('manufacturers-admin.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle"></i> {{ trans('admin/manufacturer/index.first_manufacturer') }}
                    </a>
                @endrole
            </header>
        @endif
    </div> {{-- .card box-content-admin mb-3 --}}
@endsection