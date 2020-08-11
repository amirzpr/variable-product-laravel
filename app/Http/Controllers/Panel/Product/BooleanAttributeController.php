<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Attribute\BooleanAttributeValue;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class BooleanAttributeController extends Controller
{
    public function __invoke(Product $product, Request $request)
    {
        BooleanAttributeValue::updateOrCreate(
            ['attribute_id' => $request['attribute_id'], 'product_id' => $product->id],
            ['value' => (bool) $request['value']]
        );
    }
}
