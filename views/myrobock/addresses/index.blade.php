@extends('layouts.myrobock')

@section('title', 'Addresses')

@section('breadcrumbs')
    {{ Breadcrumbs::render('usersAddresses') }}
@endsection

@section('content')
    <p>
        <a href="{{ route('users-addresses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Add address
        </a>
    </p>

    @if ($userAddresses->isNotEmpty())
        <table class="table table-stripped table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">State</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($userAddresses as $userAddress)
                <tr>
                    <td scope="row"><input type="checkbox" name="user-address-{{ $userAddress->id_user_address }}"
                                           id="user-address-{{ $userAddress->id_user_address }}"></td>
                    <th>{{ $userAddress->id_user_address }}</th>
                    <td>{{ $userAddress->name }}</td>
                    <td>{{ $userAddress->state->country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
                    <td>{{ $userAddress->state->name }}</td>
                    <td>{{ $userAddress->postal_code }}</td>
                    <td>{{ $userAddress->phone }}</td>
                    <td>{{ $userAddress->created_at->format('F jS, Y @ H:i:s') }}</td>
                    <td>{{ $userAddress->updated_at->diffForHumans() }}</td>
                    <td>
                        <form method="POST" action="{{ route('users-addresses.destroy', $userAddress->id_user_address) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route("users-addresses.show", $userAddress->id_user_address) }}" class="btn btn-link">Show</a>
                            <a href="{{ route("users-addresses.edit", $userAddress->id_user_address) }}" class="btn btn-link">Edit</a>
                            <button type="submit" class="btn btn-link"
                                    onclick="return confirm('Are you sure you want to delete it?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="actions text-center">
            {{ $userAddresses->links() }}
        </div>
    @else
        <p>No registered addresses.</p>
    @endif
    <a href="{{ route('my-account.index') }}" class="btn btn-primary mb-3">Back to my account</a>
@endsection