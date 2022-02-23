<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function deleteAndSetChild(Category $category, $option)
    {
        $category->childs()->update(['parent_id' => $option]);
        $category->delete();
    }

    public static function setNewPositionChilds($allCategoriesWithOutParent)
    {
        $index = 1;
        foreach ($allCategoriesWithOutParent as $value) {
            $value->position = $index;
            $index++;
            $value->save();
        }
    }

    public static function decremenetElementsPosition($request, $arrayElemts)
    {
        for ($i = $request->index; $i > 1; $i--) {
            $category = $arrayElemts->where('position', $i)->first();
            $category->position--;
            $category->save();
        }
    }

    public static function incrementElementsPosition($request, $arrayElemts)
    {
        for ($i = $request->index; $i < $arrayElemts->count(); $i++) {
            $category = $arrayElemts->where('position', $i)->first();
            $category->position++;
            $category->save();
        }
    }
}
