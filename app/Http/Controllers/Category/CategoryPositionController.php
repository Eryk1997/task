<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryPositionController extends Controller
{
    public function position(Category $category, Request $request)
    {
        if ($category->parent_id != NULL) {
            $parent = Category::find($category->parent_id);
            $numberOfchilds = $parent->countChilds();
        } else {
            $numberOfchilds = Category::where('parent_id', '=', NULL)->count();
        }
        return view('position', [
            'numberOfchilds' => $numberOfchilds,
            'category' => $category
        ]);
    }
}
