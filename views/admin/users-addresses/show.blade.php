@extends('layouts.admin')

@section('title', "{$userAddress->name}")

@section('breadcrumbs')
    {{ Breadcrumbs::render('usersAddressesAdminShow', $userAddress) }}
@endsection

@section('content')
    <table class="table table-sm mb-0">
        <tr>
            <th><i class="fas fa-globe"></i> Country:</th>
            <td>{{ $userAddress->state->country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
        </tr>
        <tr>
            <th><i class="fas fa-map-marker-alt"></i> State:</th>
            <td>{{ $userAddress->state->name }}</td>
        </tr>
        <tr>
            <th><i class="fas fa-map-marked-alt"></i> Address:</th>
            <td>{{ $userAddress->address }}</td>
        </tr>
        <tr>
            <th><i class="far fa-address-card"></i> Postal code:</th>
            <td>{{ $userAddress->postal_code }}</td>
        </tr>
        <tr>
            <th><i class="fas fa-phone"></i> Phone:</th>
            <td>{{ $userAddress->phone }}</td>
        </tr>
        <tr>
            <th><i class="far fa-calendar-alt"></i> Created:</th>
            <td>{{ $userAddress->created_at->format('F jS, Y @ H:i:s') }}</td>
        </tr>
        <tr>
            <th><i class="far fa-calendar-check"></i> Updated:</th>
            <td>{{ $userAddress->updated_at->diffForHumans() }}</td>
        </tr>
    </table>
    <p>
        <a href="{{ route("users-addresses-admin.index") }}">Return to customers addresses list</a>
    </p>
@endsection