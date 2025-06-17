@extends('base')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Category</h1>

    <!-- Update Form -->
    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Category Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-1">Category Name</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', $category->name) }}" required
                   class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <div class="flex items-center space-x-4">
            <button type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                Update Category
            </button>

            <a href="{{ route('categories.index') }}"
               class="text-blue-600 hover:underline">
                ← Back to Categories
            </a>
        </div>
    </form>

    <!-- Delete Button -->
    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
          class="mt-6"
          onsubmit="return confirm('Are you sure you want to delete {{ $category->name }} category?');">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
            Delete Category
        </button>
    </form>
</div>
@endsection
