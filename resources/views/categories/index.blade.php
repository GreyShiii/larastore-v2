@extends('layouts.main')

@section('contents')
    <h2>Category List</h2>
    <a href="{{ route('categories.create') }}">Add Category</a>
    <table>
        <thead>
            <tr>
                <th>Category Name</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{ $category->name }}?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr colspan="1">No cateogiries found.</tr>
            @endforelse
        </tbody>
    </table>
@endsection
