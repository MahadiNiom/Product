@extends('base')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Product Details</h1>

    <div class="mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">{{ $product->name }}</h2>
        <p class="text-lg text-gray-600 mt-2">Price: <span class="font-medium text-gray-900">${{ number_format($product->price, 2) }}</span></p>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-2">Categories:</h3>
        @if($product->categories->isEmpty())
            <p class="text-gray-500">No categories assigned to this product.</p>
        @else
            <ul class="list-disc list-inside text-gray-700">
                @foreach ($product->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="flex items-center space-x-4">
        <a href="{{ route('products.index') }}"
           class="text-blue-600 hover:underline">
            ← Back to Products
        </a>
        <a href="{{ route('products.edit', $product->id) }}"
           class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
            Edit Product
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
</div>
@endsection
