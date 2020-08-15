<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariation;
use App\Models\Product\Attribute\ProductAttribute;
use App\Models\Product\Product;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    /**
     * Return partial view loaded with available variations
     *
     * @param  Product  $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('partials.attribute._variations', [
            'productAttributes' => $product->allProductAttributes,
        ]);
    }

    /**
     * Store variation prices
     *
     * @param  ProductAttribute  $productAttribute
     * @param  StoreVariation  $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(ProductAttribute $productAttribute, StoreVariation $request)
    {
        if ( $request->has('prices') )
        {
            foreach ($request['prices'] as ['option_id' => $option_id, 'price' => $price])
            {
                $productAttribute->attributeOptionValues()
                    ->updateExistingPivot($option_id, ['price' => $price], false);
            }

            return response('successful');
        }

        $productAttribute->attributeBooleanValue()->update([
            'price' => $request['price']
        ]);

        return response('successful');
    }

    /**
     * Update "is_variable" field of product attribute
     *
     * @param  ProductAttribute  $productAttribute
     * @param  Request  $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(ProductAttribute $productAttribute, Request $request)
    {
        $productAttribute->update([
            'is_variable' => $request['is_variable'] ?: null
        ]);

        return response('successful');
    }
}
