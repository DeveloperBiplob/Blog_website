<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repository\Category\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // protected $category;

    // public function __construct(CategoryInterface $category)
    // {
    //     $this->category = $category;
    // }


    public function index()
    {
        // $categories = Category::all();
        // $categories = $this->category->getAllCategory();
        // return view('backend.category.index', compact('categories'));

        return view('backend.category.index');
    }

    public function fetchCategory()
    {
        return Category::get();
    }
    
    public function store(CategoryRequest $request)
    {
        // info($request->all());

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->name
        ]);

        info($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return true;
    }
}
