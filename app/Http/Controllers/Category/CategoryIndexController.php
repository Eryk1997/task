<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryIndexController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->structure) && !in_array('NULL', $request->structure)) {
            foreach ($request->structure as $value) {
                $arrayIdNode[] = $value;
            }
            $categories = Category::whereIn('id', $arrayIdNode)->orderBy('position', 'asc')->get();
        } else {
            $categories = Category::where('parent_id', NULL)->orderBy('position', 'asc')->get();
        }

        if ($request->structure)
            toast('Selected structure', 'success');

        return view('welcome', [
            'categories' => $categories,
            'allCategories' => Category::all(),
            'structures' => is_array($request->structure) ?  $request->structure : [],
        ]);
    }
}
