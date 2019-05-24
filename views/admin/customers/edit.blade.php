<form class="form-horizontal" method="POST" action="{{ route('customers.update', ':USER_ID') }}">
    <input id="user_id" type="hidden" name="user_id" value="{{ old('user_id', $user->id) }}">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name" class="control-label">{{ trans('admin/customer/edit.form.first') }}:</label>
        <input id="first_name" type="text" class="form-control" name="first_name"
               value="{{ old('first_name', $user->first_name) }}" placeholder="First name" required autofocus>
        @if ($errors->has('first_name'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('first_name') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="control-label">{{ trans('admin/customer/edit.form.last') }}:</label>
        <input id="last_name" type="text" class="form-control" name="last_name"
               value="{{ old('last_name', $user->last_name) }}" placeholder="Last name" required autofocus>
        @if ($errors->has('last_name'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('last_name') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">{{ trans('admin/customer/edit.form.direction') }}:</label>
        <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"
               placeholder="example@mail.com" required>
        @if ($errors->has('email'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
        <label for="contact_number" class="control-label">{{ trans('admin/customer/edit.form.number') }}:</label>
        <input id="contact_number" type="text" class="form-control" name="contact_number"
               value="{{ old('contact_number', $user->contact_number) }}" placeholder="+1 (555) 555-5555" required>
        @if ($errors->has('contact_number'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('contact_number') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group">
        <label for="rol" class="control-label">{{ trans('admin/customer/edit.form.role') }}:</label>
        @if (old('rol'))
            <select id="rol" class="form-control" name="rol" required="required">
                <option value="" disabled>{{ trans('admin/customer/ediedit.form.choose') }}</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ old('rol') == $rol->id ? 'selected' : '' }}>{{ trans("admin/customer/edit.role.$rol->name") }}</option>
                @endforeach
            </select>
        @else
            <select id="rol" class="form-control" name="rol" required="required">
                <option value="" disabled>{{ trans('admin/customer/edit.form.choose') }}</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $user->rol[0] == $rol->name ? 'selected' : '' }}>{{ trans("admin/customer/edit.role.$rol->name") }}</option>
                @endforeach
            </select>
        @endif
    </div>
    <div class="form-group">
        <div class="form-check">
            <label for="active" class="form-check-label col-md-10 control-label">
                {{--NOTA: ES ADREDE COLOCAR old('email'). Los checkbox tienen el problema de que, al no estar tildado, el valor del elemento es null. ¿Qué problema trae esto? Te lo explico:
                La primera vez que se cargue el formulario de edición, no ocurrirá nada en el método old() de laravel porque no existirán aún valores. CUANDO EXISTA UN PROBLEMA DE VALIDACIÓN, el método old() de laravel se activa y rescata los valores que se ingresaron en el formulario. Si un checkbox (por ejemplo, activate) estaba tildado y se desmarca, usando old('activate')  fallaría porque el valor vendrá nulo, por lo cual laravel creerá que es la primera vez que viene el formulario y lo tildará automáticamente. En este ejemplo, no es lo correcto porque nosotros lo desmarcamos. Es por eso, que se usa un valor que siempre estará en el formulario, en este caso el correo.--}}
                @if (old('email'))
                    <input class="form-check-input" type="checkbox" name="active" id="active"
                           value="1" {{ old('active') ? 'checked' : '' }}>{{ trans('admin/customer/edit.form.active') }}
                @else
                    @if($user->active)
                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1"
                               checked="checked">{{ trans('admin/customer/edit.form.active') }}
                    @else
                        <input class="form-check-input" type="checkbox" name="active" id="active"
                               value="1">{{ trans('admin/customer/edit.form.active') }}
                    @endif
                @endif
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <label for="validate" class="form-check-label col-md-10 control-label">
                @if (old('email'))
                    <input class="form-check-input" type="checkbox" name="validate" id="validate"
                           value="1" {{ old('validate') ? 'checked' : '' }}>{{ trans('admin/customer/edit.form.validate') }}
                @else
                    @if($user->validate)
                        <input class="form-check-input" type="checkbox" name="validate" id="validate" value="1"
                               checked="checked">{{ trans('admin/customer/edit.form.validate') }}
                    @else
                        <input class="form-check-input" type="checkbox" name="validate" id="validate"
                               value="1">{{ trans('admin/customer/edit.form.validate') }}
                    @endif
                @endif
            </label>
        </div>
    </div>

    <div class="form-group">
        <div class="form-check">
            <label for="certificate" class="form-check-label col-md-10 control-label">
                @if (old('email'))
                    <input class="form-check-input" type="checkbox" name="certificate" id="certificate"
                           value="1" {{ old('certificate') ? 'checked' : '' }}>{{ trans('admin/customer/edit.form.certificate') }}
                @else
                    @if($user->certificate)
                        <input class="form-check-input" type="checkbox" name="certificate" id="certificate" value="1"
                               checked="checked">{{ trans('admin/customer/edit.form.certificate') }}
                    @else
                        <input class="form-check-input" type="checkbox" name="certificate" id="certificate"
                               value="1">{{ trans('admin/customer/edit.form.certificate') }}
                    @endif
                @endif
            </label>
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">{{ trans('admin/customer/edit.form.password') }}:</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="******">
        <small id="passwordHelp" class="form-text text-muted">{{ trans('admin/customer/edit.form.at') }}.</small>

        @if ($errors->has('password'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group">
        <label for="password-confirm" class="control-label">{{ trans('admin/customer/edit.form.rpassword') }}:</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
               placeholder="******">
    </div>
</form>