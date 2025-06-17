@extends('base')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Add New Product
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="text-left px-6 py-3 text-gray-600 font-medium">Name</th>
                    <th class="text-left px-6 py-3 text-gray-600 font-medium">Price</th>
                    <th class="text-left px-6 py-3 text-gray-600 font-medium">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-gray-800">{{ $product->name }}</td>
                        <td class="px-6 py-4 text-gray-800">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <a href="{{ route('products.show', $product->id) }}"
                               class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('products.edit', $product->id) }}"
                               class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete product {{ $product->name }}?');">
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
</div>
@endsection
