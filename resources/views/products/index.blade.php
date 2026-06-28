@extends('layouts.main')

@section('contents')
<h2>Product List</h2>
<a href="{{ route('products.create')}}">Add Product</a>

    <form action="{{ route('products.index')}}" method="GET">
        <input type="text" name="search" placeholder="Search products..." value="{{ request('search') }}">

        <select name="category_id" id="">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
            @endforeach
        </select>

        <button type="submit">Search</button>
        <a href="{{ route('products.index') }}">Clear</a>
    </form>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name ?? 'No category' }}</td>
                    <td>₱{{ number_format($product->price, 2)}}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product)}}">Show</a>
                        <a href="{{ route('products.edit', $product)}}">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $product->name }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No product list yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{-- For rendering pagination navigation button, the previous/next --}}
    {{ $products->appends(request()->query())->links() }}
@endsection
