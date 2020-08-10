<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'between:2,255', 'unique:categories'],
            'slug' => ['required', 'string', 'between:2,255', 'regex:/^[a-z0-9\-]+$/', 'unique:products'],
            'price' => ['required', 'integer'],
            'categories' => ['required'],
            'categories.*' => ['exists:categories,id'],
            'root_category_id' => ['required', 'in_array:categories.*'],
        ];
    }
}
