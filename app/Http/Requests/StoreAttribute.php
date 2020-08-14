<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttribute extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'attribute_group_id' => [
                'required',
                'integer',
                'exists:attribute_groups,id',
            ],
            'attribute_type_id' => [
                'required',
                'integer',
                'exists:attribute_types,id',
            ],
            'title' => [
                'required',
                'string',
                'between:2,255',
                "unique:attributes,title,null,id,attribute_group_id,{$this['attribute_group_id']}"
            ],
            'options' => [
                'exclude_unless:attribute_type_id,3',
                'required',
            ],
        ];
    }
}
