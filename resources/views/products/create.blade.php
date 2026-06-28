@extends('layouts.main')

@section('contents')
<h2>Creating Product</h2>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="Product Image"></label>
            <input type="file" name="image">
            @error('image') <span>{{ $message }}</span> @enderror
        </div>

        <label for="">Product Name</label>
        <input type="text" name="name" value="{{ old('name') }}">
        @error('name') <span>{{ $message }}</span> @enderror<br>

        <label for="">Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        @error('price') <span>{{ $message }}</span> @enderror<br>

        <label for="">Stock</label>
        <input type="number" name="stock" value="{{ old('stock') }}">
        @error('stock') <span>{{ $message }}</span> @enderror<br>

        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Create Product</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
@endsection
