<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttribute;
use App\Models\Product\Attribute\Attribute;
use App\Models\Product\Attribute\AttributeType;
use App\Models\Product\Category;

class AttributeController extends Controller
{
    public function index()
    {
        return view('panel.attributes', [
            'categories' => Category::all(),
            'attrTypes' => AttributeType::all(),
            'attrs' => Attribute::all(),
        ]);
    }

    public function store(StoreAttribute $request)
    {
        $validated = $request->validated();

        if ( array_key_exists('options', $validated) ) {
            $options_array = explode('|', trim($validated['options'], '|'));
            array_pop($validated);
        }

        $attribute = Attribute::create($validated);

        if ( isset($options_array) ) {
            $attribute->attachOptions($options_array);
        }

        return back()->with('status', 'مشخصه «'. $validated['title'] .'» با موفقیت ایجاد شد.');
    }
}
