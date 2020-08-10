<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeGroup extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id'
            ],
            'title' => [
                'required',
                'string',
                'between:2,255',
                "unique:attribute_groups,title,null,id,category_id,{$this['category_id']}"
            ],
        ];
    }
}
