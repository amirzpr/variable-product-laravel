<?php

namespace App\Http\Controllers;

use App\Models\Product\Attribute\AttributeGroup;
use App\Models\Product\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AttributeGroupController extends Controller
{
    public function index()
    {
        return view('panel.attribute_groups', [
            'categories' => Category::all(),
            'attrGroups' => AttributeGroup::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'title' => [
                'required',
                'string',
                'between:2,255',
                "unique:attribute_groups,title,null,id,category_id,{$request['category_id']}"
            ],
        ]);

        AttributeGroup::create($validated);

        return back()->with('status', 'گروه ویژگی «'. $validated['title'] .'» با موفقیت ایجاد شد.');
    }
}
