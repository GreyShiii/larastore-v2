@extends('layouts.main')

@section('contents')
    <h2>Editting: {{ $category->name }}</h2>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="">Category Name</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}">
        @error('name') <span>{{ $message }}</span> @enderror<br>

        <button type="submit">Update Category</button>
        <a href="{{ route('categories.index') }}">Cancel</a>
    </form>
@endsection
