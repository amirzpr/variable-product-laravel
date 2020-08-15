<?php

namespace App\Http\Requests;

use App\Models\Product\Attribute\AttributeType;
use App\Models\Product\Attribute\ProductAttribute;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVariation extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_attribute_id' => [
                'required',
                'integer',
                'exists:product_attributes,id'
            ],
            'price' => [
                'integer',
                Rule::requiredIf(function () {
                    return ProductAttribute::find($this['product_attribute_id'])->attribute->type->name == AttributeType::boolean;
                })
            ],
            'prices' => [
                'array',
                Rule::requiredIf(function () {
                    return ProductAttribute::find($this['product_attribute_id'])->attribute->type->name == AttributeType::select;
                })
            ],
        ];
    }
}
