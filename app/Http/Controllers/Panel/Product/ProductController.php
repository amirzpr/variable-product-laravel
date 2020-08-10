<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('panel.product.index', [
            'products' => Product::all(),
        ]);
    }
}
