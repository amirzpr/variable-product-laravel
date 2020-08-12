<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Http\Request;

class SelectableAttributeValue extends AttributeValue
{
    public function attributeOption()
    {
        return $this->belongsTo(AttributeOption::class, 'option_id');
    }

    public function saveValue(Product $product, Request $request)
    {
        self::updateOrCreate(
            ['attribute_id' => $request['attribute_id'], 'product_id' => $product->id],
            ['option_id' => $request['value']]
        );
    }
}