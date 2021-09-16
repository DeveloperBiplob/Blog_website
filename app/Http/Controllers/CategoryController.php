<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\Category\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryInterface $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        // $categories = Category::all();
        $categories = $this->category->getAllCategory();
        return view('backend.category.index', compact('categories'));
    }

    
}
