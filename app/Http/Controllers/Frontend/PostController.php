<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function allPost()
    {
        $data = [];
        $data['posts'] = Post::with('author', 'category', 'sub_category')->latest()->paginate(6);
        $data['categories'] = Category::with('posts')->get();
        $data['latestPosts'] = Post::with('category')->latest()->take(3)->get();
        $data['tags'] = Tag::get();
        return view('Frontend.post.all_post', $data);
    }
}
