@extends('layouts.main')

@section('contents')
    <h2>{{ $product->name }}</h2>

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    @else
        <p>No image uploaded.</p>
    @endif

    <p>Category: {{ $product->category->name ?? 'No category' }}</p>
    <p>Price:₱ {{ number_format($product->price, 2) }}</p>
    <p>Stock: {{ $product->stock }}</p>
    <p>Tags:
        @if ($product->tags->count())
            {{ $product->tags->pluck('name')->join(', ') }}
        @else
            No tags
        @endif
    </p>
    <a href="{{ route('products.edit', $product) }}">Edit</a>
    <a href="{{ route('products.index') }}">Go back</a>
@endsection
