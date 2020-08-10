<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Models\Product\Category;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('panel.products.index', [
            'products' => Product::all(),
            'categories' => Category::all(),
        ]);
    }

    public function edit()
    {
        return view('panel.products.edit');
    }

    public function store(StoreProduct $request)
    {
        $validated = $request->validated();

        $categories = $validated['categories'];
        unset($validated['categories']);

        $product = Product::create($validated);

        $product->categories()->sync($categories);

        return back()->with('status', 'محصول «'. $validated['title'] .'» با موفقیت ایجاد شد.');
    }
}
