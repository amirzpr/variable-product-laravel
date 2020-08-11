<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class MultiSelectableAttributeController extends Controller
{
    public function __invoke(Product $product, Request $request)
    {
        $product->multiSelectableAttributeValues()->sync($request['options']);
    }
}
