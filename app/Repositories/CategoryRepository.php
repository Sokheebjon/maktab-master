<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return $categories = Category::orderBy('id', 'desc')->get();
    }

    /**
     * @param Category $category
     * @return Category
     */

    public function showFindId(Category $category): Category
    {
        return $category;
    }

    public function store(Request $request){
        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
        ]);
        Category::create($request->all());
    }

    /**
     * @param Request $request
     * @param Category $category
     */
    public function updateId(Request $request, Category $category)
    {
        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required'
        ]);

        $category->update($request->all());
    }

    public function deleting(Category $category){
        try {
            $category->delete();
        } catch (\Exception $e) {

        }
    }


}
