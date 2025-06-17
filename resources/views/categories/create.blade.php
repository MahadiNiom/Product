@extends('base')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- Category Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-1">Category Name</label>
            <input type="text" name="name" id="name" required
                   class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Create Category
            </button>
        </div>
    </form>
</div>
@endsection
