<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [];
        $data['sliders'] = Slider::get();
        $data['randPosts'] = Post::with('author', 'category', 'sub_category')->inRandomOrder()->take(3)->get();
        $data['latestPosts'] = Post::with('category')->latest()->limit(3)->get();
        return view('frontend.home', $data);
    }
}
