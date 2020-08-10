<?php

namespace App\Http\Controllers\Panel\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Models\Product\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('panel.categories', [
            'categories' => Category::all(),
        ]);
    }

    public function store(StoreCategory $request)
    {
        $validated = $request->validated();

        Category::create($validated);

        return back()->with('status', 'دسته بندی «'. $validated['title'] .'» با موفقیت ایجاد شد.');
    }
}
