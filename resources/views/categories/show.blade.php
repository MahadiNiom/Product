@extends('base')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Category</h1>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">{{ $category->name }}</h2>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Products in this Category:</h3>
        @if($category->products->isEmpty())
            <p class="text-gray-500">No products in this category.</p>
        @else
            <ul class="list-disc list-inside text-gray-700">
                @foreach ($category->products as $product)
                    <li>
                        <span class="font-medium">{{ $product->name }}</span>
                        – ${{ number_format($product->price, 2) }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="flex items-center space-x-4">
        <a href="{{ route('categories.index') }}"
           class="text-blue-600 hover:underline">
            ← Back to Categories
        </a>

        <a href="{{ route('categories.edit', $category->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Edit Category
        </a>

        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete {{ $category->name }} category?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Delete Category
            </button>
        </form>
    </div>
</div>
@endsection
