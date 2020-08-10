<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
            'slug' => ['required', 'string', 'between:2,255', 'regex:/^[a-z0-9\-]+$/', 'unique:categories'],
            'parent_id' => ['required', 'exclude_if:parent_id,0', 'exists:categories,id'],
        ];
    }
}
