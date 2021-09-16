<?php

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository implements CategoryInterface{

    public function getAllCategory()
    {
        return Category::latest()->get();
    }

    public function store(Request $request)
    {

    }

    public function show(Category $category)
    {

    }

    public function update(Request $request, Category $category)
    {

    }
    
    public function delete(Category $category)
    {
        
    }
}