<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id','position'];


    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function allChildrenAccounts()
    {
        return $this->childs()->with('allChildrenAccounts');
    }

    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('childs');
    }

    public function countChilds(){
        return $this->childs()->count();
    }

    public function updatePosition(){
        $index = 1;
        foreach ($this->childs as $child) {
            $child->position = $index;
            $index++;
            $child->save();
        }
    }

    public function getIdChilds(){
        $categories = new Collection();
        foreach ($this->childs as $category) {
            $categories->push($category);
            $categories = $categories->merge($category->getIdChilds());
        }
        return $categories;
    }

}
