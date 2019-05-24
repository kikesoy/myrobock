@extends('layouts.admin')

{{-- SECTION TITLE --}}
@section('title', trans('admin/employee/edit.title') . " {$user->first_name} {$user->last_name}")

@section('breadcrumbs')
    {{ Breadcrumbs::render('employeeEdit', $user) }}
@endsection

{{-- SECTION CONTENT --}}
@section('content')
    <div class="box-content-admin mb-3">
        <form id="edit-form" class="form-horizontal" method="POST"
              action="{{ route('employees.update', $user->id_employee) }}">
            {{-- <form id="edit-form" method="POST" action="{{ route('employees.update', ':USER_ID') }}"> --}}
            <input id="id_employee" type="hidden" name="id_employee"
                   value="{{ old('id_employee', $user->id_employee) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="card-body">
                <div class="form-group{{ $errors->edit->has('first_name') ? ' has-error' : '' }}">
                    <label for="first_name" class="control-label">{{ trans('admin/employee/edit.form.first') }}:</label>
                    <input id="first_name" type="text" class="form-control" name="first_name"
                           value="{{ old('first_name', $user->first_name) }}" placeholder="First name" required
                           autofocus>

                    @if ($errors->edit->has('first_name'))
                        <small class="help-block text-danger">
                            {{ $errors->edit->first('first_name') }}
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->edit->has('last_name') ? ' has-error' : '' }}">
                    <label for="last_name" class="control-label">{{ trans('admin/employee/edit.form.last') }}:</label>
                    <input id="last_name" type="text" class="form-control" name="last_name"
                           value="{{ old('last_name', $user->last_name) }}" placeholder="Last name" required autofocus>
                    @if ($errors->edit->has('last_name'))
                        <small class="help-block text-danger">
                            {{ $errors->edit->first('last_name') }}
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->edit->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">{{ trans('admin/employee/edit.form.direction') }}:</label>
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ old('email', $user->email) }}" placeholder="example@mail.com" required>
                    @if ($errors->edit->has('email'))
                        <small class="help-block text-danger">
                            {{ $errors->edit->first('email') }}
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->edit->has('contact_number') ? ' has-error' : '' }}">
                    <label for="contact_number" class="control-label">{{ trans('admin/employee/edit.form.number') }}
                        :</label>
                    <input id="contact_number" type="text" class="form-control" name="contact_number"
                           value="{{ old('contact_number', $user->contact_number) }}" placeholder="+1 (555) 555-5555"
                           required>

                    @if ($errors->edit->has('contact_number'))
                        <small class="help-block text-danger">
                            {{ $errors->edit->first('contact_number') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="rol" class="control-label">{{ trans('admin/employee/edit.role.role') }}:</label>
                    @if (old('rol'))
                        <select id="rol" class="form-control" name="rol"
                                required="required" {{ $fieldDisabled ? 'disabled' : '' }}>
                            <option value="" disabled>{{ trans('admin/employee/edit.form.choose') }}</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ old('rol') == $rol->id ? 'selected' : '' }}>{{ trans('admin/employee/edit.role.' . $rol->name) }}</option>
                            @endforeach
                        </select>
                    @else
                        <select id="rol" class="form-control" name="rol"
                                required="required" {{ $fieldDisabled ? 'disabled' : '' }}>
                            <option value="" disabled>{{ trans('admin/employee/edit.form.choose') }}</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}" {{ $user->rol[0] == $rol->name ? 'selected' : '' }}>{{ trans('admin/employee/edit.role.' . $rol->name) }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group">
                    <div class="form-check">
                        <label for="active" class="form-check-label col-md-10 control-label">
                            @if (old('email'))
                                <input class="form-check-input" type="checkbox" name="active" id="active"
                                       value="1" {{ old('active') ? 'checked' : '' }} {{ $fieldDisabled ? 'disabled' : '' }}>{{ trans('admin/employee/edit.form.active') }}
                            @else
                                @if($user->active)
                                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1"
                                           checked="checked" {{ $fieldDisabled ? 'disabled' : '' }}>{{ trans('admin/employee/edit.form.active') }}
                                @else
                                    <input class="form-check-input" type="checkbox" name="active" id="active"
                                           value="1" {{ $fieldDisabled ? 'disabled' : '' }}>{{ trans('admin/employee/edit.form.active') }}
                                @endif
                            @endif
                        </label>
                    </div>
                </div>

                <div class="form-group{{ $errors->edit->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">{{ trans('admin/employee/edit.form.password') }}
                        :</label>

                    <input id="password" type="password" class="form-control" name="password" placeholder="******">
                    <small id="passwordHelp"
                           class="form-text text-muted">{{ trans('admin/employee/edit.form.minimum') }}</small>

                    @if ($errors->edit->has('password'))
                        <small class="help-block text-danger">
                            {{ $errors->edit->first('password') }}
                        </small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password-confirm"
                           class="control-label">{{ trans('admin/employee/edit.form.rpassword') }}:</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           placeholder="******">
                </div>
            </div>

            <footer class="card-footer d-flex justify-content-end">
                <a href="{{ route('employees.index') }}" class="btn btn-link mr-1">
                    <i class="fas fa-arrow-circle-left"></i> {{ trans('admin/employee/edit.form.back') }} </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check-circle"></i> {{ trans('admin/employee/edit.form.edit') }} {{ $user->first_name }}
                </button>
            </footer>
        </form>
    </div>
@endsection