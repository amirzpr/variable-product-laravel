<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;

class ProductAttributeValuesController extends Controller
{
    /**
     * Sends a json object containing previously set attribute values keyed by attribute_id
     *
     * @param  Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Product $product)
    {
        return response()->json($product->allAttributeValues->mapToGroups( function ($item, $key) {
            if ( ! isset($item['pivot']) ) {
                return [ $item['attribute_id'] =>  $item['value'] ];
            }

            return [ $item['attribute_id'] => $item['id'] ];
        }));
    }
}
