<?php

namespace App\Repository\Category;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnotherRepository implements CategoryInterface{

    // Thard party api use kore data fache korte chaile.

    protected $url = 'http://127.0.0.1:8000/admin/';

    public function getAllCategory()
    {
        $res = Http::get($this->url . 'category');
        return json_decode($res->body());
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