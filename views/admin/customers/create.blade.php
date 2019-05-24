<form id="createCustomer" class="form-horizontal" method="POST" action="{{ route('customers.store') }}">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name" class="control-label">{{ trans('admin/customer/create.form.first') }}:</label>
        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
               placeholder="First name" required autofocus>
        @if ($errors->has('first_name'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('first_name') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name" class="control-label">{{ trans('admin/customer/create.form.last') }}:</label>
        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
               placeholder="Last name" required autofocus>
        @if ($errors->has('last_name'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('last_name') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="control-label">{{ trans('admin/customer/create.form.direction') }}:</label>
        <input id="email" type="email" class="form-control" name="email"
               value="{{ old('email') }}" placeholder="example@mail.com" required>

        @if ($errors->has('email'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
        <label for="contact_number" class="control-label">{{ trans('admin/customer/create.form.number') }}:</label>
        <input id="contact_number" type="text" class="form-control" name="contact_number"
               value="{{ old('contact_number') }}" placeholder="+1 (555) 555-5555" required>

        @if ($errors->has('contact_number'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('contact_number') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group">
        <label for="rol" class="control-label">{{ trans('admin/customer/create.form.role') }}:</label>
        @if (old('rol'))
            <select id="rol" class="form-control" name="rol" required="required">
                <option value="" disabled>{{ trans('admin/customer/create.form.choose') }}</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ old('rol') == $rol->id ? 'selected' : '' }}>{{ trans("admin/customer/create.role.$rol->name") }}</option>
                @endforeach
            </select>
        @else
            <select id="rol" class="form-control" name="rol" required="required">
                <option selected="selected" value="" disabled>{{ trans('admin/customer/create.form.choose') }}</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}">{{ trans("admin/customer/create.role.$rol->name") }}</option>
                @endforeach
            </select>
        @endif
    </div>
    <div class="form-group">
        <div class="form-check">
            <label for="active" class="form-check-label col-md-10 control-label">
                <input class="form-check-input" type="checkbox" name="active" id="active"
                       value="1" {{ old('active') ? 'checked' : '' }}>{{ trans('admin/customer/create.form.active') }}
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <label for="validate" class="form-check-label col-md-10 control-label">
                <input class="form-check-input" type="checkbox" name="validate" id="validate"
                       value="1" {{ old('validate') ? 'checked' : '' }}>{{ trans('admin/customer/create.form.validate') }}
            </label>
        </div>
    </div>
    <div class="form-group">
        <div class="form-check">
            <label for="certificate" class="form-check-label col-md-10 control-label">
                <input class="form-check-input" type="checkbox" name="certificate" id="certificate"
                       value="1" {{ old('certificate') ? 'checked' : '' }}>{{ trans('admin/customer/create.form.certificate') }}
            </label>
        </div>
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="control-label">{{ trans('admin/customer/create.form.password') }}:</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="******" required>
        <small id="passwordHelp" class="form-text text-muted">{{ trans('admin/customer/create.form.minimum') }}.</small>

        @if ($errors->has('password'))
            <small class="help-block text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </small>
        @endif
    </div>
    <div class="form-group">
        <label for="password-confirm" class="control-label">{{ trans('admin/customer/create.form.confirm') }}:</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
               placeholder="******" required>
    </div>
</form>