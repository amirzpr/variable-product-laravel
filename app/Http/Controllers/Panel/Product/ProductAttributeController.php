<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Attribute\Attribute;
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
        return response()->json($product->allAttributeValues->mapToGroups( function ($item, $key) {
            if ( ! isset($item['pivot']) ) {
                return [ $item['attribute_id'] =>  $item['value'] ];
            }

            return [ $item['attribute_id'] => $item['id'] ];
        }));
    }

    /**
     * Store/Update product attributes
     *
     * @param  Product  $product
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function store(Product $product, Request $request)
    {
        if ( is_null($request['value']) ) {
            return response()->json(['message' => 'مقدار نامعتبر'], 400);
        }

        $valueModel = Attribute::find($request['attribute_id'])->type->attributeValue;

        $valueModel->saveValue($product, $request);
    }
}
