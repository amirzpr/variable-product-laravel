<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class SelectableAttributeController extends Controller
{
    public function __invoke(Product $product, Request $request)
    {
        $product->selectableAttributeValues()->updateOrCreate(
            ['attribute_id' => $request['attribute_id']],
            ['option_id' => $request['option_id']]
        );
    }
}
