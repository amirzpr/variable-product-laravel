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
        return response()->json($product->allProductAttributes->mapWithKeys(function ($item) {
            return [$item->attribute_id => $item->value];
        }));
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
