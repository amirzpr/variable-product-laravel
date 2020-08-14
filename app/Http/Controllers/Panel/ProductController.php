<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Models\Product\Category;
use App\Models\Product\Product;

class ProductController extends Controller
{
    /**
     * Products page in admin panel
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('panel.products.index', [
            'products' => Product::with('rootCategory')->get(),
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a product
     *
     * @param  StoreProduct  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProduct $request)
    {
        $validated = $request->validated();

        $categories = $validated['categories'];
        unset($validated['categories']);

        $product = Product::create($validated);

        $product->categories()->sync($categories);

        return redirect()->route('products.edit', $product)
            ->with('status', "محصول « {$validated['title']} » با موفقیت ایجاد شد. اکنون می‌توانید ویژگی‌های محصول را اضافه کنید.");
    }

    /**
     * Product attributes edit page
     *
     * @param  Product  $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        return view('panel.products.edit', [
            'product' => $product,
            'attrGroups' => $product->rootCategory->allAttributeGroups,
        ]);
    }
}
