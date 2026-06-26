@extends('layouts.main')

@section('contents')
<h2>Product List</h2>
<a href="{{ route('products.create')}}">Add Product</a>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>₱{{ number_format($product->price, 2)}}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product)}}">Show</a>
                        <a href="{{ route('products.edit', $product)}}">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No product list yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
