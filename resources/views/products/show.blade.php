@extends('layouts.main')

@section('contents')
    <h2>{{ $product->name }}</h2>
    <p>Category: {{ $product->category->name ?? 'No category' }}</p>
    <p>Price:₱ {{ number_format($product->price, 2) }}</p>
    <p>Stock: {{ $product->stock }}</p>
    <a href="{{ route('products.edit', $product) }}">Edit</a>
    <a href="{{ route('products.index') }}">Go back</a>
@endsection
