<?php

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryInterface {

    public function getAllCategory();
    public function store(Request $request);
    public function show(Category $category);
    public function update(Request $request, Category $category);
    public function delete(Category $category);
}