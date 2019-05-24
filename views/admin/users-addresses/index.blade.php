@extends('layouts.admin')

@section('title', 'Customers addresses')

@section('breadcrumbs')
    {{ Breadcrumbs::render('usersAddressesAdmin') }}
@endsection

@section('content')
    <div class="card box-content-admin mb-3">
        <header class="d-flex flex-row align-items-center justify-content-between">
            <div>
                @if ($usersAddresses->count() > 0)
                    Showing {{($usersAddresses->currentpage()-1)*$usersAddresses->perpage()+1}}
                    to {{(($usersAddresses->currentpage()-1)*$usersAddresses->perpage())+$usersAddresses->count()}}
                    of {{$usersAddresses->total()}} entries
                @else
                    No customers addresses.
                @endif
            </div>
            @role('Super administrador|Administrador')
            <a href="{{ route('users-addresses-admin.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Add customer address
            </a>
            @endrole
        </header>
        @if ($usersAddresses->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-hover table-primary">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address name</th>
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
                    @foreach($usersAddresses as $userAddress)
                        <tr>
                            <td scope="row"><input type="checkbox"
                                                   name="user-address-{{ $userAddress->id_user_address }}"
                                                   id="user-address-{{ $userAddress->id_user_address }}"></td>
                            <th scope="row">{{ $userAddress->id_user_address }}</th>
                            <td>{{ $userAddress->user->first_name . " " . $userAddress->user->last_name }}</td>
                            <td>
                                <a href="mailto:{{ $userAddress->user->email }}">{{ $userAddress->user->email }}</a>
                            </td>
                            <td>{{ $userAddress->name }}</td>
                            <td>{{ $userAddress->state->country->langs()->wherePivot('id_lang', auth()->user()->id_lang)->first()->pivot->name }}</td>
                            <td>{{ $userAddress->state->name }}</td>
                            <td>{{ $userAddress->postal_code }}</td>
                            <td>{{ $userAddress->phone }}</td>
                            <td>{{ $userAddress->created_at->format('F jS, Y @ H:i:s') }}</td>
                            <td>{{ $userAddress->updated_at->diffForHumans() }}</td>
                            <td>
                                <form method="POST"
                                      action="{{ route('users-addresses-admin.destroy', $userAddress->id_user_address) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route("users-addresses-admin.show", $userAddress->id_user_address) }}"
                                       class="btn btn-link">Show</a>
                                    @role('Super administrador|Administrador')
                                    <a href="{{ route("users-addresses-admin.edit", $userAddress->id_user_address) }}"
                                       class="btn btn-link">Edit</a>
                                    <button type="submit" class="btn btn-link"
                                            onclick="return confirm('Are you sure you want to delete it?')">Delete
                                    </button>
                                    @endrole
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <footer class="d-flex flex-row align-items-center justify-content-between">
                <div>Showing {{($usersAddresses->currentpage()-1)*$usersAddresses->perpage()+1}}
                    to {{(($usersAddresses->currentpage()-1)*$usersAddresses->perpage())+$usersAddresses->count()}}
                    of {{$usersAddresses->total()}} entries
                </div>
                {{ $usersAddresses->links('pagination::bootstrap-4',['class'=>'pagination-sm']) }}
            </footer>
        @else
            <header class="alert alert-warning" role="alert">
                <h4><i class="fas fa-exclamation-triangle"></i> Warning:</h4>
                <p>There's no customers addresses yet.</p>
                @role('Super administrador|Administrador')
                <a href="{{ route('users-addresses-admin.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Create first customer address
                </a>
                @endrole
            </header>
        @endif
    </div> {{-- .card box-content-admin mb-3 --}}
@endsection