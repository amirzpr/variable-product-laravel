<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVariation;
use App\Models\Product\Attribute\ProductAttribute;
use App\Models\Product\Product;

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
     * @param  StoreVariation  $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(StoreVariation $request)
    {
        $product_attribute = ProductAttribute::find($request['product_attribute_id']);

        if ( $request->has('prices') )
        {
            foreach ($request['prices'] as ['option_id' => $option_id, 'price' => $price])
            {
                $product_attribute->attributeOptionValues()
                    ->updateExistingPivot($option_id, ['price' => $price], false);
            }

            return response('successful');
        }

        $product_attribute->attributeBooleanValue()->update([
            'price' => $request['price']
        ]);

        return response('successful');
    }
}
