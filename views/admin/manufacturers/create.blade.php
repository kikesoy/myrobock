@extends('layouts.admin')

@section('title', trans('admin/manufacturer/create.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('manufacturersAdminCreate') }}
@endsection

@section('content')
    <div class="box-content-admin mb-3">
        <form class="form-horizontal" method="POST" action="{{ route('manufacturers-admin.store') }}">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">{{ trans('admin/manufacturer/create.name') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                           placeholder="{{ trans('admin/manufacturer/create.manufacturer_name') }}" required
                           autofocus>
                    @if ($errors->has('name'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="control-label">{{ trans('admin/manufacturer/create.active') }}</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @if (old('active') || old('active') == "0")
                            <label class="btn btn-toggle btn-toggle-success {{ old('active') == "1" ? 'active' : '' }}">
                                <input type="radio" name="active" id="active-1" autocomplete="off"
                                       value="1" {{ old('active') == "1" ? 'checked' : '' }}>{{ trans('admin/manufacturer/create.yes') }}
                            </label>
                            <label class="btn btn-toggle btn-toggle-danger {{ old('active') == "0" ? 'active' : '' }}">
                                <input type="radio" name="active" id="active-0" autocomplete="off"
                                       value="0" {{ old('active') == "0" ? 'checked' : '' }}>{{ trans('admin/manufacturer/create.no') }}
                            </label>
                        @else
                            <label class="btn btn-toggle btn-toggle-success active">
                                <input type="radio" name="active" id="active-1" autocomplete="off" value="1" checked>
                                {{ trans('admin/manufacturer/create.yes') }}
                            </label>
                            <label class="btn btn-toggle btn-toggle-danger">
                                <input type="radio" name="active" id="active-0" autocomplete="off" value="0">
                                {{ trans('admin/manufacturer/create.no') }}
                            </label>
                        @endif
                    </div>
                    @if ($errors->has('active'))
                        <div class="form-check">
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('active') }}</strong>
                            </small>
                        </div>
                    @endif
                </div>
            </div>{{-- .card-body--}}

            <footer class="card-footer d-flex justify-content-end">
                <a href="{{ route('manufacturers-admin.index') }}" class="btn btn-link mr-1">
                    <i class="fas fa-arrow-circle-left"></i> {{ trans('admin/manufacturer/create.manufacturers_list') }}
                </a>
                <button type="submit" class="btn btn-primary">
                    {{ trans('admin/manufacturer/create.create_manufacturer') }}
                </button>
            </footer>
        </form>
    </div>
@endsection