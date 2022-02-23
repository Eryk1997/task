<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryUpdateController extends Controller
{
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $inputs['name'] = $request->name;

        $inputs['parent_id'] = $request->parent_id == 'null' ? NULL : $request->parent_id;

        if ($request->parent_id == 'null') {
            $inputs['position'] = (Category::where('parent_id', NULL)->count() + 1);
            $category->update($inputs);
            $allCategoriesWithOutParent = Category::where('parent_id', NULL)->get();
            CategoryController::setNewPositionChilds($allCategoriesWithOutParent);
        } else {
            $oldParent = Category::find($category->parent_id);
            $newParent = Category::find($request->parent_id);
            $inputs['position'] = (Category::where('parent_id', $request->parent_id)->count() + 1);
            $category->update($inputs);

            $newParent->updatePosition();
            if (isset($oldParent))
                $oldParent->updatePosition();
        }
        toast('Category updated', 'success');

        return redirect('/');
    }
}
