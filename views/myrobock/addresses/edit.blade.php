@extends('layouts.myrobock')

@section('title', "Edit address '{$userAddress->name}'")

@section('breadcrumbs')
    {{ Breadcrumbs::render('usersAddressesEdit', $userAddress) }}
@endsection

@section('form')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        @if($errors->any())
            <div class="alert alert-danger">
                <p class="alert-heading mb-0"><i class="fas fa-exclamation-circle"></i> <strong>We found a
                        problem.</strong> Please, check the errors below:</p>
            </div>
        @endif
        <form class="form-horizontal" method="POST"
              action="{{ route('users-addresses.update', $userAddress->id_user_address) }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="control-label">Name:</label>
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ old('name', $userAddress->name) }}"
                           placeholder="Name of the address" required
                           autofocus>
                    @if ($errors->has('name'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('name') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group" data-route="{{ route('users-addresses.find-state', ':ID_COUNTRY') }}">
                    <label for="id-country" class="control-label">Country:</label>
                    <select id="id-country" class="form-control" name="id_country" required="required">
                        <option value="" disabled>Choose an option...</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id_country }}" {{ old('id_country', $userAddress->state->country->id_country) == $country->id_country ? 'selected' : '' }}>{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Server error, please try again!
                    </div>
                </div>

                <div class="form-group">
                    <label for="id-state" class="control-label">State:</label>
                    <select id="id-state" class="form-control" name="id_state" required="required">
                        <option value="" disabled>Choose a state...</option>
                        @foreach ($countries as $country)
                            @if ($country->id_country == old('id_country', $userAddress->state->country->id_country))
                                @foreach($country->states as $state)
                                    <option value="{{ $state->id_state }}" {{ old('id_state', $userAddress->id_state) == $state->id_state ? 'selected' : '' }}>{{ $state->name }}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                    <label for="address" class="control-label">Address:</label>
                    <textarea id="address" class="form-control" name="address"
                              placeholder="QPS Electric, 3233 Commerce Parkway Miramar Florida 33025" required
                              autofocus>{{ old('address', $userAddress->address) }}</textarea>
                    @if ($errors->has('address'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('address') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('postal_code') ? ' has-error' : '' }}">
                    <label for="postal-code" class="control-label">Postal code:</label>
                    <input id="postal-code" type="text" class="form-control" name="postal_code"
                           value="{{ old('postal_code', $userAddress->postal_code) }}"
                           placeholder="33025" required
                           autofocus>
                    @if ($errors->has('postal_code'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('postal_code') }}</strong>
                        </small>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" class="control-label">Phone:</label>
                    <input id="phone" type="text" class="form-control" name="phone"
                           value="{{ old('phone', $userAddress->phone) }}"
                           placeholder="+1 (555) 555-5555" required
                           autofocus>
                    @if ($errors->has('phone'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </small>
                    @endif
                </div>
            </div>{{-- .card-body--}}

            <footer class="card-footer d-flex justify-content-end">
                <a href="{{ route('users-addresses.index') }}" class="btn btn-link mr-1">
                    <i class="fas fa-arrow-circle-left"></i> Back to addresses list
                </a>
                <button type="submit" class="btn btn-primary">
                    Edit address {{ $userAddress->name }}
                </button>
            </footer>
        </form>
    </div>
@endsection