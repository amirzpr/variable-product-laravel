<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;

class ProductController extends Controller
{
    /**
     * Products list for customer
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Product page for customer
     *
     * @param  Product  $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        $attrValues = $product->allProductAttributes->mapWithKeys( function ($product_attribute) {
            return [ $product_attribute->attribute->title => $product_attribute->values->pluck('value') ];
        });

        return view('products.show', compact('product','attrValues'));
    }
}
