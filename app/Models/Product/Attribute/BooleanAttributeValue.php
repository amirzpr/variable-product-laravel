<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Http\Request;

class BooleanAttributeValue extends AttributeValue
{
    protected $casts = ['value' => 'boolean'];

    public function saveValue(Product $product, Request $request)
    {
        self::updateOrCreate(
            ['attribute_id' => $request['attribute_id'], 'product_id' => $product->id],
            ['value' => (bool) $request['value']]
        );
    }
}