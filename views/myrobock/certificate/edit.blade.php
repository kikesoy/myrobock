@extends('layouts.myrobock')
{{--PAGE TITLE--}}
@section('title', trans('myrobock/certificate/edit.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('certificateEdit') }}
@endsection
{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <h3>{{ trans('myrobock/certificate/edit.form.form') }}:</h3>
        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
              action="{{ route('certificate.update') }}">
            {{ method_field('PUT') }}
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                <label form="company_name">{{ trans('myrobock/certificate/edit.form.name') }}:</label>
                <input id="company_name" type="text" class="form-control" name="company_name"
                       value="{{ old('company_name', $company->company_name ) }}"
                       placeholder="{{ trans('myrobock/certificate/edit.form.name') }}" required
                       autofocus>
                @if ($errors->has('company_name'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('foundation_year') ? ' has-error' : '' }}">
                <label form="foundation_year">{{ trans('myrobock/certificate/edit.form.foundation') }}:</label>
                <input id="foundation_year" type="text" class="form-control" name="foundation_year"
                       value="{{ old('foundation_year', $company->foundation_year) }}"
                       placeholder="{{ trans('myrobock/certificate/edit.form.foundation') }}" required autofocus><br/>
                @if ($errors->has('foundation_year'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('foundation_year') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('employee_number') ? ' has-error' : '' }}">
                <label form="employee_number">{{ trans('myrobock/certificate/edit.form.quantity') }}:</label>
                <input id="employee_number" type="text" class="form-control" name="employee_number"
                       value="{{ old('employee_number', $company->employee_number) }}"
                       placeholder="{{ trans('myrobock/certificate/edit.form.quantity') }}"
                       required autofocus><br/>
                @if ($errors->has('employee_number'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('employee_number') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tax_identification_number') ? ' has-error' : '' }}">
                <label form="tax_identification_number">{{ trans('myrobock/certificate/edit.form.tax') }}:</label>
                <input id="tax_identification_number" type="text" class="form-control" name="tax_identification_number"
                       value="{{ old('tax_identification_number', $company->tax_identification_number) }}"
                       placeholder="{{ trans('myrobock/certificate/edit.form.tax') }}" required autofocus><br/>
                @if ($errors->has('tax_identification_number'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('tax_identification_number') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                <label form="address">{{ trans('myrobock/certificate/edit.form.business') }}:</label>
                <textarea name="address" cols="30" rows="10" id="address" class="form-control"
                          placeholder="{{ trans('myrobock/certificate/edit.form.business') }}" required
                          autofocus>{{ old('address', $company->address) }}</textarea><br/>
                @if ($errors->has('address'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('address') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('postal_code') ? ' has-error' : '' }}">
                <label form="postal_code">{{ trans('myrobock/certificate/edit.form.zip') }}:</label>
                <input id="postal_code" type="text" class="form-control" name="postal_code"
                       value="{{ old('postal_code', $company->postal_code) }}"
                       placeholder="{{ trans('myrobock/certificate/edit.form.zip') }}" required
                       autofocus><br/>
                @if ($errors->has('postal_code'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                <label form="phone">{{ trans('myrobock/certificate/edit.form.phone') }}:</label>
                <input id="phone" type="text" class="form-control" name="phone"
                       value="{{ old('phone', $company->phone) }}"
                       placeholder="{{ trans('myrobock/certificate/edit.form.phone') }}" required autofocus><br/>
                @if ($errors->has('phone'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                <label form="about">{{ trans('myrobock/certificate/edit.form.description') }}:</label>
                <textarea name="about" cols="30" rows="10" id="about" class="form-control"
                          placeholder="{{ trans('myrobock/certificate/edit.form.description') }}">{{ old('about', $company->about) }}</textarea><br/>
                @if ($errors->has('about'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('about') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('business') ? ' has-error' : '' }}">
                <label form="business">{{ trans('myrobock/certificate/edit.form.categories') }}:</label>
                @if (old('business', "$company->id_business_category"))
                    <select name="business" id="business" class="form-control">
                        <option value="null" disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                        @foreach ($categories as $category){
                        <option value="{{ $category->id_business_category }}" {{ old('business', "$company->id_business_category") == $category->id_business_category ? 'selected' : '' }}>{{ $category->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('business'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('business') }}</strong>
                        </small>
                    @endif
                @else
                    <select name="business" id="business" class="form-control">
                        <option selected="selected" value="null"
                                disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id_business_category }}">{{ $category->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('business'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('business') }}</strong>
                        </small>
                    @endif
                @endif
            </div>

            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                @if (old('country', "$company->country"))
                    <label form="country">{{ trans('myrobock/certificate/edit.form.country') }}:</label>
                    <select name="country" id="country" class="form-control">
                        <option value="" disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id_country }}" {{ old('country', "$company->country") == $country->id_country ? 'selected' : '' }}>{{ $country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('country') }}</strong>
                        </small>
                    @endif
                @else
                    <label form="country">{{ trans('myrobock/certificate/edit.form.country') }}:</label>
                    <select name="country" id="country" class="form-control">
                        <option selected="selected" value=""
                                disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id_document_type }}">{{ $country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('country') }}</strong>
                        </small>
                    @endif
                @endif
            </div>

            <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                @if (old('state', "$company->id_state"))
                    <label form="state">{{ trans('myrobock/certificate/edit.form.state') }}:</label>
                    <select name="state" id="state" class="form-control" required="required">
                        <option value="" disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id_state }}" {{ old('state', "$company->id_state") == $state->id_state ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('state'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('state') }}</strong>
                        </small>
                    @endif
                @else
                    <label form="state">{{ trans('myrobock/certificate/edit.form.state') }}:</label>
                    <select name="state" id="state" class="form-control" required="required">
                        <option selected="selected" value=""
                                disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id_state }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('state'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('state') }}</strong>
                        </small>
                    @endif
                @endif
            </div>

            @if ($counter != 0)
                @for ($i = 0; $i < $counter; $i++)
                    <div class="form-group {{ $errors->has('image.'."$i".'.opt') ? ' has-error' : '' }}">
                        <input type="file" name="image[{{$i}}][img]" accept=".jpeg, .png, .bmp, .gif, .pdf"><br/>
                        @if ($errors->has('image.'."$i".'.img'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('image.'."$i".'.img') }}</strong>
                            </small>
                        @endif
                        <select name="image[{{$i}}][opt]" id="image[{{$i}}][opt]" class="form-control">
                            <option value="" disabled>{{ trans('myrobock/certificate/edit.form.choose') }}</option>
                            @foreach ($documentsTypes as $documentType)
                                <option value="{{ $documentType->id_document_type }}" {{ old('image.'."$i".'.opt') == $documentType->id_document_type ? 'selected' : '' }}>{{ $documentType->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('image.'."$i".'.opt'))
                            <small class="help-block text-danger">
                                <strong>{{ $errors->first('image.'."$i".'.opt') }}</strong>
                            </small>
                        @endif
                    </div>
                @endfor
            @endif

            <button type="submit" class="btn btn-primary mr-1">
                {{ trans('myrobock/certificate/edit.form.send') }}
            </button>
            <a href="{{ route('my-account.index') }}"
               class="text-nowrap">{{ trans('myrobock/certificate/edit.form.home') }}</a>
        </form>
    </div>
@endsection