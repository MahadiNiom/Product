@extends('base')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-md">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Categories</h1>
        <a href="{{ route('categories.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Add New Category
        </a>
    </div>

    <table class="min-w-full table-auto border border-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 text-left text-gray-600 font-medium border-b">Name</th>
                <th class="px-4 py-2 text-left text-gray-600 font-medium border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2 text-gray-800">{{ $category->name }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('categories.show', $category->id) }}"
                           class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('categories.edit', $category->id) }}"
                           class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}"
                              method="POST" class="inline"
                              onsubmit="return confirm('Are you sure you want to delete {{ $category->name }} category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
