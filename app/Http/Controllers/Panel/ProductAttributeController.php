<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Product\Attribute\ProductAttribute;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Sends a json object containing previously set attribute values keyed by attribute_id
     *
     * @param  Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        $attribute_values = $product->allProductAttributes
        ->mapWithKeys(
            function ($product_attribute) {
                return [$product_attribute->attribute_id => $product_attribute->values->pluck('value', 'id')];
            }
        )
        ->map(
            function ($item) {
                return isset($item['']) ? $item[''] : $item;
            }
        );

        return response()->json($attribute_values);
    }

    /**
     * Store/Update product attributes
     *
     * @param  Product  $product
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Exception
     */
    public function store(Product $product, Request $request)
    {
        $productAttribute = ProductAttribute::firstOrNew([
            'product_id' => $product->id,
            'attribute_id' => $request['attribute_id'],
        ]);

        $productAttribute->saveAttributeValues($request['value']);
    }
}
