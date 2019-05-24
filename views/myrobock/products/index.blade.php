@extends('layouts.myrobock')

@section('title', 'Products')

@section('breadcrumbs')
    {{ Breadcrumbs::render('products') }}
@endsection

@section('content')
    <p>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Create product</a>
    </p>

    @if ($products->isNotEmpty())
        <table class="table table-stripped table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Wholesale price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Active</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id_product }}</th>
                    <td><a href="{{ $product->images->where('cover', 1)->first()->image_path }}"><img src="{{ $product->images->where('cover', 1)->first()->image_path_xs }}" alt="{{ $product->name }}"></a></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @if($product->wholesale_price)
                            {{ $product->wholesale_price }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        @if($product->active)
                            <i class="fas fa-check-circle fa-2x"></i>
                        @else
                            <i class="fas fa-times-circle fa-2x"></i>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('products.destroy', $product->id_product) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route("products.show", $product->id_product) }}" class="btn btn-link">Show</a>
                            <a href="{{ route("products.edit", $product->id_product) }}" class="btn btn-link">Edit</a>
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
            {{ $products->links() }}
        </div>
    @else
        <p>No registered products.</p>
    @endif
    <a href="{{ route('store.index') }}" class="btn btn-primary mb-3">Main menu</a>
@endsection