<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'price' => [
                'integer',
                'required_without:prices'
            ],
            'prices' => [
                'array',
                'required_without:price'
            ],
        ];
    }
}
