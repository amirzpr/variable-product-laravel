<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Attribute\TextAttributeValue;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class TextAttributeController extends Controller
{
    public function __invoke(Product $product, Request $request)
    {
        if ( ! $request['value'] ) {
            return response()->json(['message' => 'متن نمی‌تواند خالی باشد'], 400);
        }

        TextAttributeValue::updateOrCreate(
            ['attribute_id' => $request['attribute_id'], 'product_id' => $product->id],
            ['value' => $request['value']]
        );
    }
}
