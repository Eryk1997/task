<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryUpdatePositionController extends Controller
{
    public function updatePosition(Category $category, Request $request)
    {
        $elementsWithParents = Category::where('parent_id', $category->parent_id)->get();
        $elementsWithOutParents = Category::where('parent_id', NULL)->get();

        if ($category->position < $request->index) {
            if ($category->parent_id) {
                CategoryController::decremenetElementsPosition($request, $elementsWithParents);
            } else {
                CategoryController::decremenetElementsPosition($request, $elementsWithOutParents);
            }
        } else {
            if ($category->parent_id) {
                CategoryController::incrementElementsPosition($request, $elementsWithParents);
            } else {
                CategoryController::incrementElementsPosition($request, $elementsWithOutParents);
            }
        }
        $category->update(['position' => $request->index]);
        toast('Category change position', 'success');

        return redirect('/');
    }
}
