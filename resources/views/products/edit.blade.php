@extends('base')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-1">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required
                class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Price -->
        <div>
            <label for="price" class="block text-gray-700 font-medium mb-1">Price:</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price', $product->price) }}" required
                class="w-full border border-gray-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Categories -->
        <div>
            <label class="block text-gray-700 font-medium mb-2">Category:</label>
            <div class="grid grid-cols-2 gap-3">
                @foreach ($categories as $category)
                    <div class="flex items-center">
                        <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}"
                               {{ in_array($category->id, $product->categories->pluck('id')->toArray()) ? 'checked' : '' }}
                               class="text-blue-600 focus:ring-blue-500 rounded border-gray-300">
                        <label for="category_{{ $category->id }}" class="ml-2 text-gray-700">{{ $category->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center space-x-4">
            <button type="submit"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                Update Product
            </button>
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">
                ← Back to Products
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete {{ $product->name }} product?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                    Delete Product
                </button>
            </form>
        </div>
    </form>
</div>
@endsection
