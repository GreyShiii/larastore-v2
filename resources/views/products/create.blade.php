@extends('layouts.main')

@section('contents')
<h2>Adding Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="">Product Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <span>{{ $message }}</span> @enderror<br>

        <label for="">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        @error('price') <span>{{ $message }}</span> @enderror<br>

        <label for="">Stock</label>
        <input type="number" name="stock" value="{{ old('stock') }}">
        @error('stock') <span>{{ $message }}</span> @enderror<br>

        <button type="submit">Create Product</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
@endsection
