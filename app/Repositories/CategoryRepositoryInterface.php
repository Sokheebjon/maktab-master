<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function all();

    /**
     * @param Category $category
     * @return Category
     */
    public function showFindId(Category $category): Category;

    /**
     * @param Request $request
     * @param Category $category
     */

    public function store(Request $request);

    public function updateId(Request $request, Category $category);

    public function deleting(Category $category);
}
