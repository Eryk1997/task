<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryDestroyController extends Controller
{
    public function destroy(Category $category, Request $request)
    {
        $allCategoriesWithOutParent = Category::where('parent_id', NULL)->get();

        if (array_key_exists('button1', $_POST)) {
            if ($category->parent_id != NULL) {
                CategoryController::deleteAndSetChild($category, $category->parent_id);
                $parent = Category::find($category->parent_id);
                $parent->updatePosition();
            } else {
                CategoryController::deleteAndSetChild($category, NULL);
                CategoryController::setNewPositionChilds($allCategoriesWithOutParent);
            }
            toast('Category deleted', 'success');
        }
        if (array_key_exists('button2', $_POST)) {
            $category->delete();
            CategoryController::setNewPositionChilds($allCategoriesWithOutParent);
            toast('Category deleted with childs', 'success');
        }

        return redirect('/');
    }
}
