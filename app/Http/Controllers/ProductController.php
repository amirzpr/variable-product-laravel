<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;

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
        $attrValues = $product->allAttributeValues->mapToGroups( function ($item) {
            return [ $item->attribute->title =>  $item['value'] ];
        });

        return view('product.show', compact('product','attrValues'));
    }
}
