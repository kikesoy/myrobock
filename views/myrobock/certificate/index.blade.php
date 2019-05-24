@extends('layouts.myrobock')
{{--PAGE TITLE--}}
@section('title', trans('myrobock/certificate/index.title') )

@section('breadcrumbs')
    {{ Breadcrumbs::render('certificate') }}
@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <div class="form-group">
            @if (session('message-sent'))
                <div class="alert alert-info">
                    {{ session('message-sent') }}
                </div>
            @elseif(session('message-edit'))
                <div class="alert alert-warning">
                    {{ session('message-edit') }}
                </div>
            @endif
            <br><br>
            <label for="about">{{ trans('myrobock/certificate/index.content.status') }}:</label>
            <label for="about">{{$data->userCompanyStatus->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name}}</label>

            @if ($data->id_user_company_status == 2)
                <label for="about"> <a href="#">{{ trans('myrobock/certificate/index.content.gos') }}</a></label>
            @elseif($data->id_user_company_status == 3)
                <label for="about"> <a
                            href="{{ route('messenger.create') }}">{{ trans('myrobock/certificate/index.content.gom') }}</a></label>
            @elseif($data->id_user_company_status == 4)
                <label for="about"> <a
                            href="{{ route('certificate.edit')}}">{{ trans('myrobock/certificate/index.content.goi') }}</a></label>
            @endif
        </div>
        <h3>{{ trans('myrobock/certificate/index.content.data') }}</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <p class="alert-heading mb-0"><i class="fas fa-exclamation-circle"></i>
                    <strong>{{ trans('myrobock/certificate/index.content.we') }}
                        .</strong> {{ trans('myrobock/certificate/index.content.please') }}:</p>
            </div>
        @endif
        <table class="table table-hover">
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.name') }}:</th>
                <td>{{ $data->company_name }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.foundation') }}:</th>
                <td>{{ $data->foundation_year }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.quantity') }}:</th>
                <td>{{ $data->employee_number }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.tax') }}:</th>
                <td>{{ $data->tax_identification_number }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.address') }}:</th>
                <td>{{ $data->address }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.zip') }}:</th>
                <td>{{ $data->postal_code }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.phone') }}:</th>
                <td>{{ $data->phone }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.about') }}:</th>
                <td>{{ $data->about }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.categories') }}:</th>
                <td>{{ $data->businessCategory->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.country') }}:</th>
                <td>{{ $data->state->country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
            </tr>
            <tr>
                <th>{{ trans('myrobock/certificate/index.content.state') }}:</th>
                <td>{{ $data->state->name }}</td>
            </tr>
        </table>

        <div class="row">
            @foreach ($paths as $path)
                <div class="col-4">
                    <img src="{{asset($path['path'])}}" type="application/pdf"><br>
                    <label for="flag">{{$path['flag']}}</label>
                    <label for="name">{{ trans('myrobock/certificate/index.content.name') }}:</label>
                    <p class="mb-1">{{ $path['name'] }}</p>
                    <a href="{{ asset($path['pathOriginal']) }}">{{ trans('myrobock/certificate/index.content.view') }}</a>
                </div>
            @endforeach
        </div>
        <div class="form-group">
            <label for="about">{{ trans('myrobock/certificate/index.content.status') }}:</label>
            <label for="about">{{$data->userCompanyStatus->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name}}</label>
        </div>
        @if(isset($histories))
            <br>
            <h3>{{ trans('myrobock/certificate/index.content.history') }}</h3>
            <br>
            @foreach ($histories as $history)
                <div class="form-group">
                    <label for="about"> {{ $history['first_name'] }} {{  $history['last_name'] }} </label>
                    <p class="about">{{ $history['observation'] }}</p>
                    <label for="about"> {{ $history['created_at'] }}</label>
                    <br>
                </div>
            @endforeach
        @endif
        <div class="form-group">
            @if ($data->id_user_company_status == 2)
                <label for="about"> <a
                            href="{{ route('store.index') }}">{{ trans('myrobock/certificate/index.content.gos') }}</a></label>
            @elseif($data->id_user_company_status == 3)
                <label for="about"> <a
                            href="{{ route('messenger.create') }}">{{ trans('myrobock/certificate/index.content.gom') }}</a></label>
            @elseif($data->id_user_company_status == 4)
                <label for="about"> <a
                            href="{{ route('certificate.edit') }}">{{ trans('myrobock/certificate/index.content.goi') }}</a></label>
            @endif
        </div>
        <p>
            <a href="{{ route('my-account.index') }}"
               class="btn btn-primary mb-3">{{ trans('myrobock/certificate/index.content.home') }}</a>
        </p>
    </div>
@endsection