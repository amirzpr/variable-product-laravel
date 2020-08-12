<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Http\Request;

class MultiSelectableAttributeValue extends AttributeValue
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function saveValue(Product $product, Request $request)
    {
        $product->multiSelectableAttributeValues()->sync($request['value']);
    }
}