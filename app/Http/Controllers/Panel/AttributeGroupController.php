<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAttributeGroup;
use App\Models\Product\Attribute\AttributeGroup;
use App\Models\Product\Category;

class AttributeGroupController extends Controller
{
    /**
     * Attribute group index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('panel.attribute_groups', [
            'categories' => Category::all(),
            'attrGroups' => AttributeGroup::with('category')->get(),
        ]);
    }

    /**
     * Store an AttributeGroup
     *
     * @param  StoreAttributeGroup  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAttributeGroup $request)
    {
        $validated = $request->validated();

        AttributeGroup::create($validated);

        return back()->with('status', 'گروه مشخصات «'. $validated['title'] .'» با موفقیت ایجاد شد.');
    }
}
