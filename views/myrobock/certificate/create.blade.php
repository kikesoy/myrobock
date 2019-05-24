@extends('layouts.myrobock')
{{--PAGE TITLE--}}
@section('title', trans('myrobock/certificate/create.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('certificateCreate') }}
@endsection

{{-- USE THIS SECTION IF CONTENT IS A FORM, IE: CREATE OR EDIT--}}
@section('form')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="form-group">
            <h3>{{ trans('myrobock/certificate/create.form.form') }}</h3>
        </div>

        <form class="form-horizontal" enctype="multipart/form-data" method="POST"
              action="{{ route('certificate.store') }}">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
                <label form="company_name">{{ trans('myrobock/certificate/create.form.name') }}:</label>
                <input id="company_name" type="text" class="form-control" name="company_name"
                       value="{{ old('company_name') }}"
                       placeholder="{{ trans('myrobock/certificate/create.form.name') }}" required autofocus>
                @if ($errors->has('company_name'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('company_name') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('foundation_year') ? ' has-error' : '' }}">
                <label form="foundation_year">{{ trans('myrobock/certificate/create.form.foundation') }}:</label>
                <input id="foundation_year" type="text" class="form-control" name="foundation_year"
                       value="{{ old('foundation_year') }}"
                       placeholder="{{ trans('myrobock/certificate/create.form.foundation') }}" required
                       autofocus>
                @if ($errors->has('foundation_year'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('foundation_year') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('employee_number') ? ' has-error' : '' }}">
                <label form="employee_number">{{ trans('myrobock/certificate/create.form.quantity') }}:</label>
                <input id="employee_number" type="text" class="form-control" name="employee_number"
                       value="{{ old('employee_number') }}"
                       placeholder="{{ trans('myrobock/certificate/create.form.quantity') }}" required autofocus>
                @if ($errors->has('employee_number'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('employee_number') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('tax_identification_number') ? ' has-error' : '' }}">
                <label form="tax_identification_number">{{ trans('myrobock/certificate/create.form.tax') }}:</label>
                <input id="tax_identification_number" type="text" class="form-control" name="tax_identification_number"
                       value="{{ old('tax_identification_number') }}"
                       placeholder="{{ trans('myrobock/certificate/create.form.tax') }}"
                       required autofocus>
                @if ($errors->has('tax_identification_number'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('tax_identification_number') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                <label form="address">{{ trans('myrobock/certificate/create.form.business') }}:</label>
                <textarea name="address" cols="30" rows="10" class="form-control" id="address"
                          placeholder="{{ trans('myrobock/certificate/create.form.business') }}" required
                          autofocus>{{ old('address') }}</textarea>
                @if ($errors->has('address'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('address') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('postal_code') ? ' has-error' : '' }}">
                <label form="postal_code">{{ trans('myrobock/certificate/create.form.zip') }}:</label>
                <input id="postal_code" type="text" class="form-control" name="postal_code"
                       value="{{ old('postal_code') }}"
                       placeholder="{{ trans('myrobock/certificate/create.form.zip') }}" required autofocus>
                @if ($errors->has('postal_code'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('postal_code') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                <label form="phone">{{ trans('myrobock/certificate/create.form.phone') }}:</label>
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                       placeholder="{{ trans('myrobock/certificate/create.form.phone') }}" required autofocus>
                @if ($errors->has('phone'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </small>
                @endif
            </div>
            <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                <label form="about">{{ trans('myrobock/certificate/create.form.description') }}:</label>
                <textarea name="about" cols="30" rows="10" class="form-control" id="about"
                          placeholder="{{ trans('myrobock/certificate/create.form.description') }}">{{ old('about') }}</textarea>
                @if ($errors->has('about'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('about') }}</strong>
                    </small>
                @endif
            </div>

            <div class="form-group {{ $errors->has('business') ? ' has-error' : '' }}">
                <label form="business">{{ trans('myrobock/certificate/create.form.categories') }}:</label>
                @if (old('business'))
                    <select name="business" id="business" class="form-control">
                        <option value="null" disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
                        @foreach ($businessCategories as $businessCategory){
                        <option value="{{ $businessCategory->id_business_category }}" {{ old('business') == $businessCategory->id_business_category ? 'selected' : '' }}>{{ $businessCategory->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
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
                                disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
                        @foreach ($businessCategories as $businessCategory)
                            <option value="{{ $businessCategory->id_business_category }}">{{ $businessCategory->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
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
                <label form="country">{{ trans('myrobock/certificate/create.form.country') }}:</label>
                @if (old('country'))
                    <select name="country" id="country" class="form-control">
                        <option value="null" disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
                        @foreach ($countries as $country){
                        <option value="{{ $country->id_country }}" {{ old('country') == $country->id_country ? 'selected' : '' }}>{{ $country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('country'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('country') }}</strong>
                        </small>
                    @endif
                @else
                    <select name="country" id="country" class="form-control">
                        <option selected="selected" value="null"
                                disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
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
                <label form="name">{{ trans('myrobock/certificate/create.form.state') }}:</label>
                @if (old('state'))
                    <select name="state" id="state" class="form-control" required autofocus>
                        <option value="null" disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id_state }}" {{ old('state') == $state->id_state ? 'selected' : '' }}>{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('state'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('state') }}</strong>
                        </small>
                    @endif
                @else
                    <select name="state" id="state" class="form-control" required autofocus>
                        <option selected="selected" value="null"
                                disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
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

            @for ($i = 0; $i < count($documentsTypes); $i++)
                <div class="form-group {{ $errors->has('image.'."$i".'.opt') ? ' has-error' : '' }}">
                    <input type="file" name="image[{{$i}}][img]" accept=".jpeg, .png, .bmp, .gif, .pdf"><br/>
                    @if ($errors->has('image.'."$i".'.img'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('image.'."$i".'.img') }}</strong>
                        </small>
                    @endif
                    @if (old('image.'."$i".'.opt'))
                        <select name="image[{{$i}}][opt]" id="image[{{$i}}][opt]" class="form-control"
                                required="required">
                            <option value="" disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
                            @foreach ($documentsTypes as $documentType)
                                <option value="{{ $documentType->id_document_type }}" {{ old('image.'."$i".'.opt') == $documentType->id_document_type ? 'selected' : '' }}>{{ $documentType->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                            @endforeach
                        </select>
                    @else
                        <select name="image[{{$i}}][opt]" id="image[{{$i}}][opt]" class="form-control"
                                required="required">
                            <option selected="selected" value=""
                                    disabled>{{ trans('myrobock/certificate/create.form.choose') }}</option>
                            @foreach ($documentsTypes as $documentType)
                                <option value="{{ $documentType->id_document_type }}">{{ $documentType->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                            @endforeach
                        </select>
                    @endif
                    @if ($errors->has('image.'."$i".'.opt'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('image.'."$i".'.opt') }}</strong>
                        </small>
                    @endif
                </div>
            @endfor

            <div class="form-group {{ $errors->has('terms') ? ' has-error' : '' }}">
                <label form="terms">{{ trans('myrobock/certificate/create.form.terms') }}:</label>
                <label for="terms"><input type="checkbox" name="terms" id="terms" value="true"></label>
                @if ($errors->has('terms'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('terms') }}</strong>
                    </small>
                @endif
            </div>

            <button type="submit" class="btn btn-primary mr-1">
                {{ trans('myrobock/certificate/create.form.send') }}
            </button>
            <a href="{{ route('my-account.index') }}"
               class="text-nowrap">{{ trans('myrobock/certificate/create.form.home') }}</a>
        </form>
    </div>
@endsection