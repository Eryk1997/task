<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoryStoryController extends Controller
{
    public function store(CategoryRequest $request)
    {
        $inputs['name'] = $request->name;

        $inputs['parent_id'] = $request->parent_id == 'null' ? NULL : $request->parent_id;
        $inputs['position'] = $request->parent_id == 'null' ?
            (Category::where('parent_id', NULL)->count() + 1) : (Category::where('parent_id', $request->parent_id)->count() + 1);

        Category::create($inputs);
        toast('Add new category', 'success');

        return back();
    }
}
