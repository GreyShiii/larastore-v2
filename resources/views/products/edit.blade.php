@extends('layouts.main')

@section('contents')
<h2>Editing: {{ $product->name }}</h2>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Product Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        @error('name') <span>{{ $message }}</span> @enderror<br>

        <label for="">Product Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price)}}">
        @error('price') <span>{{ $message }}</span> @enderror<br>

        <label for="">Product Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
        @error('stock') <span>{{ $message }}</span> @enderror<br>

        <button type="submit">Update Product</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
@endsection
