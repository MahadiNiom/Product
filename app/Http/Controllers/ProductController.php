<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required',
                'categories' => 'array',
                'categories.*' => 'exists:categories,id',
            ]
        );
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->save();
        // Sync categories with the product
        if (isset($validatedData['categories'])) {
            $product->categories()->sync($validatedData['categories']);
        } else {
            $product->categories()->detach(); // Detach all categories if none are provided
        }
        // If categories are provided, sync them with the product
        // If no categories are provided, the product will have no categories associated
        return redirect()->route('products.index')->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $validatedData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'price' => 'required',
                'categories' => 'array',
                'categories.*' => 'exists:categories,id',
            ]
        );
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->save();
        // Sync categories with the product
        if (isset($validatedData['categories'])) {
            $product->categories()->sync($validatedData['categories']);
        } else {
            $product->categories()->detach(); // Detach all categories if none are provided
        }
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->categories()->detach(); // Detach all categories before deleting the product
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
