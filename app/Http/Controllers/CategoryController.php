<?php

namespace App\Http\Controllers;

use App\Models\Product\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('panel.categories', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedCategory = $request->validate([
            'title' => ['required', 'string', 'between:2,255', 'unique:categories'],
            'slug' => ['required', 'string', 'between:2,255', 'regex:/^[a-z0-9\-]+$/', 'unique:categories'],
            'parent_id' => ['required', 'exclude_if:parent_id,0', 'exists:categories,id'],
        ]);

        Category::create($validatedCategory);

        return back();
    }
}
