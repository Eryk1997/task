<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryEditController extends Controller
{
    public function edit(Category $category)
    {
        $arrayIdChilds = $category->getIdChilds()->pluck('id')->toArray();
        $arrayIdChilds[] = $category->id;

        if ($category->parent_id != NULL) {
            $arrayIdChilds[] = $category->parent_id;
            $parent = Category::find($category->parent_id);
            $numberOfchilds = $parent->countChilds();
        } else {
            $numberOfchilds = Category::where('parent_id', '=', NULL)->count();
        }

        return view('edit', [
            'category' => $category,
            'allCategories' => Category::whereNotIn('id', $arrayIdChilds)->get(),
            'numberOfchilds' => $numberOfchilds,
        ]);
    }
}
