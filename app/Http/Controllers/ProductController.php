<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index', [
            'products' => Product::latest()->get(),
        ]);
    }

    public function show(Product $product)
    {
        $attrValues = $product->allProductAttributes->mapWithKeys( function ($productAttribute) {
            return [ $productAttribute->attribute->title => (array) $productAttribute->value ];
        });


        return view('product.show', compact('product','attrValues'));
    }
}
