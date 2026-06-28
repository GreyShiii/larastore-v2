@extends('layouts.main')

@section('contents')
<h2>Editing: {{ $product->name }}</h2>
    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="">Product Image</label>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->image }}">
            @endif
            <input type="file" name="image">
            @error('image') <span> {{ $message }} </span> @enderror
        </div>

        <label for="">Product Name</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">
        @error('name') <span>{{ $message }}</span> @enderror<br>

        <label for="">Product Price</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price)}}">
        @error('price') <span>{{ $message }}</span> @enderror<br>

        <label for="">Product Stock</label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
        @error('stock') <span>{{ $message }}</span> @enderror<br>

        <div>
            <label for="">Category</label>
            <select name="category_id" id="">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <span>{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="">Tags</label>
            @foreach ($tags as $tag)
                <label for="">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        {{ $product->tags->contains($tag->id) ? 'checked' : '' }}>
                        {{ $tag->name }}
                </label>
            @endforeach
        </div>

        <button type="submit">Update Product</button>
        <a href="{{ route('products.index') }}">Cancel</a>
    </form>
@endsection
