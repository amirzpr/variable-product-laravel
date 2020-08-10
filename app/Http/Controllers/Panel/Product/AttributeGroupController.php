<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeGroup;
use App\Models\Product\Attribute\AttributeGroup;
use App\Models\Product\Category;

class AttributeGroupController extends Controller
{
    public function index()
    {
        return view('panel.attribute_groups', [
            'categories' => Category::all(),
            'attrGroups' => AttributeGroup::all(),
        ]);
    }

    public function store(StoreAttributeGroup $request)
    {
        $validated = $request->validated();

        AttributeGroup::create($validated);

        return back()->with('status', 'گروه مشخصات «'. $validated['title'] .'» با موفقیت ایجاد شد.');
    }
}
