@extends('layouts.admin')

{{--PAGE TITLE--}}
@section('title', trans('admin/certificate/index.title'))

@section('breadcrumbs')
    @if (\Route::getCurrentRoute()->getName() == 'certificate-admin.index')
        {{ Breadcrumbs::render('certificateAdmin') }}
    @elseif (\Route::getCurrentRoute()->getName() == 'certificate-admin.index-processed')
        {{ Breadcrumbs::render('certificateAdminProcessed') }}
    @else
        {{ Breadcrumbs::render('certificateAdminHold') }}
    @endif
@endsection

{{-- USE THIS SECTION IF CONTENT IS NOT A FORM --}}
@section('content')
    @if (session('certificate-edit'))
        <div class="alert alert-success">
            {{ session('certificate-edit') }}
        </div>
    @endif
    <a href="{{ route('certificate-admin.index') }}" class="btn btn-link">{{ trans('admin/certificate/index.querys.all') }}</a><br>
    <a href="{{ route('certificate-admin.index-hold') }}" class="btn btn-link">{{ trans('admin/certificate/index.querys.hold') }}</a><br>
    <a href="{{ route('certificate-admin.index-processed') }}" class="btn btn-link">{{ trans('admin/certificate/index.querys.processed') }}</a><br>

    <h3>{{ trans('admin/certificate/index.business') }}</h3>

    @if (!$userCompanies->isEmpty())
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">{{ trans('admin/certificate/index.table.user') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.status') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.name') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.foundation') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.quantity') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.address') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.code') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.tax') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.phone') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.about') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.business') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.state') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.country') }}</th>
                <th scope="col">{{ trans('admin/certificate/index.table.update') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($userCompanies as $userCompany)
                <tr>
                    <th scope="row"><a
                                href="{{ route('certificate-admin.show', ['id' => $userCompany->id_user_company]) }}"> {{ $userCompany->id_user_company }} </a>
                    </th>
                    <th scope="row"><a
                                href="{{ route('customers.show', ['id' => $userCompany->id_user]) }}">{{ $userCompany->id_user }}</a>
                    </th>
                    <td>{{ $userCompany->userCompanyStatus->langs()->wherePivot('id_lang', auth('admin')->user()->id_lang)->first()->pivot->name }}</td>
                    <td>{{ $userCompany->company_name }}</td>
                    <td>{{ $userCompany->foundation_year }}</td>
                    <td>{{ $userCompany->employee_number }}</td>
                    <td>{{ $userCompany->address }}</td>
                    <td>{{ $userCompany->postal_code }}</td>
                    <td>{{ $userCompany->tax_identification_number }}</td>
                    <td>{{ $userCompany->phone }}</td>
                    <td>{{ $userCompany->about }}</td>
                    <td>{{ $userCompany->businessCategory->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
                    <td>{{ $userCompany->state->name }}</td>
                    <td>{{ $userCompany->state->country->langs()->wherePivot('id_lang', auth('admin')->user()->id_lang)->first()->pivot->name}}</td>
                    <td>{{ $userCompany->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
    {{ trans('admin/certificate/index.table.no') }}
    @endif
@endsection