@extends('layouts.admin')
{{--PAGE TITLE--}}
@section('title', trans('admin/certificate/edit.title'))

@section('breadcrumbs')
    {{ Breadcrumbs::render('certificateAdminShow', $data) }}
@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <h3>{{ trans('admin/certificate/edit.data') }}</h3>
        <table class="table table-hover">
            <tr>
                <th>{{ trans('admin/certificate/edit.table.name') }}:</th>
                <td>{{ $data->company_name }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.foundation') }}:</th>
                <td>{{ $data->foundation_year }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.quantity') }}:</th>
                <td>{{ $data->employee_number }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.tax') }}:</th>
                <td>{{ $data->tax_identification_number }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.address') }}:</th>
                <td>{{ $data->address }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.code') }}:</th>
                <td>{{ $data->postal_code }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.phone') }}:</th>
                <td>{{ $data->phone }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.about') }}:</th>
                <td>{{ $data->about }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.business') }}:</th>
                <td>{{ $data->businessCategory->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.country') }}:</th>
                <td>{{ $data->state->country->langs()->wherePivot('id_lang', auth('admin')->user()->id_lang)->first()->pivot->name }}</td>
            </tr>
            <tr>
                <th>{{ trans('admin/certificate/edit.table.state') }}:</th>
                <td>{{ $data->state->name }}</td>
            </tr>
        </table>

        @if ($data->id_user_company_status == 1)
            <form class="form-horizontal" enctype="multipart/form-data" method="POST"
                  action="{{ route('certificate-admin.update', ['id' => $data->id_user_company]) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                @for ($i = 0; $i < count($paths); $i++)
                    <div class="col-4">
                        <img src="{{asset($paths[$i]['path'])}}" type="application/pdf"><br>
                        <label for="flag">{{$paths[$i]['opt']}}</label>
                        <label for="name">{{ trans('admin/certificate/edit.name') }}:</label>
                        <p class="mb-1">{{ $paths[$i]['name'] }}</p>
                        <a href="{{ asset($paths[$i]['pathOriginal']) }}" class="text-nowrap">{{ trans('admin/certificate/edit.view') }}</a>
                        <br>
                        <label for="approved">{{ trans('admin/certificate/edit.approved') }}:</label>
                        <label for="about"><input type="checkbox" name="approved[{{$i}}]" id="approved[{{$i}}]"
                                                  value="{{$paths[$i]['id']}}" @isset($request){{ $request->approved ? 'checked' : '' }}@endisset></label>
                    </div>
                @endfor
                @if ($errors->has('error-approved'))
                    <small class="help-block text-danger">
                        <strong>{{ $errors->first('error-approved') }}</strong>
                    </small>
                @endif
                <br>
                <div class="form-group">
                    <label for="status">{{ trans('admin/certificate/edit.status') }}:</label>
                    <label for="status-name">{{$data->userCompanyStatus->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name}}</label>
                    <br>
                    <label for="status-approved">{{ trans('admin/certificate/edit.change') }}:</label>
                    <select name="seleccion" id="seleccion">
                        @foreach ($statuses as $status)
                            @if ($status->id_user_company_status > 1)
                                <option value="{{ $status->id_user_company_status }}" @isset($request){{ old($data->id_user_company_status,$request['seleccion']) == $status->id_user_company_status ? 'selected' : '' }} @endisset>{{ $status->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group {{ $errors->has('observation') ? ' has-error' : '' }}">
                    <label for="observation">{{ trans('admin/certificate/edit.observation') }}:</label>
                    <textarea name="observation" cols="30" rows="10" id="observation"
                              placeholder="Company review observation">@isset($request){{ old('observation', $request['observation']) }}@endisset</textarea><br/>
                    @if ($errors->has('error-observation'))
                        <small class="help-block text-danger">
                            <strong>{{ $errors->first('error-observation') }}</strong>
                        </small>
                    @endif
                </div>
                <p>
                    <button type="submit" class="btn btn-primary mr-1">
                        {{ trans('admin/certificate/edit.edit') }}
                    </button>
                </p>
            </form>
        @else
            @for ($i = 0; $i < count($paths); $i++)
                <div class="col-4">
                    <img src="{{asset($paths[$i]['path'])}}" type="application/pdf"><br>
                    <label for="name">{{ trans('admin/certificate/edit.name') }}:</label>
                    <p class="mb-1">{{ $paths[$i]['name'] }}</p>
                    <a href="{{ asset($paths[$i]['pathOriginal']) }}">{{ trans('admin/certificate/edit.view') }}</a>
                    <br>
                </div>
            @endfor

            <div class="form-group">
                <label for="status">{{ trans('admin/certificate/edit.status') }}:</label>
                <label for="status-name">{{$data->userCompanyStatus->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name}}</label>
            </div>
            <br>
        @endif

        @if(isset($histories))
            <h3>{{ trans('admin/certificate/edit.associated') }}</h3>
            @foreach ($histories as $history)
                <div class="form-group">
                    <label for="history"> {{ $history['id_employee'] }} {{ $history['first_name'] }} {{  $history['last_name'] }} </label>
                    <p class="history-observation">{{ $history['observation'] }}</p>
                    <label for="history-created"> {{ $history['created_at'] }}</label>
                    <br>
                </div>
            @endforeach
        @endif
        <p>
            <a href="{{ route('my-account.index') }}" class="btn btn-primary mr-1">{{ trans('admin/certificate/edit.home') }}</a>
        </p>
    </div>
@endsection