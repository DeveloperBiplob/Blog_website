<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendFormSubscriberEmial;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    public function allPost()
    {
        $data = [];
        $data['posts'] = Post::whereStatus(1)->with('author', 'category', 'sub_category')->latest()->paginate(6);
        $data['categories'] = Category::with('posts')->get();
        $data['latestPosts'] = Post::with('category')->latest()->take(3)->get();
        $data['tags'] = Tag::get();
        return view('Frontend.post.all_post', $data);
    }

    public function singlePost(Post $slug)
    {
        $slug->increment('view', 1);
        $data = [];
        $data['post'] = $slug->load('category', 'sub_category', 'tags');
        $data['categories'] = Category::with('posts')->get();
        $data['latestPosts'] = Post::with('category')->latest()->take(3)->get();
        $data['tags'] = Tag::get();
        return view('frontend.post.single-post', $data);
    }

    public function categoryWisePost(Category $slug)
    {
        $categoyWisePosts = $slug->posts()->paginate(6);

        $data = [];
        $data['posts'] = $categoyWisePosts;
        $data['categories'] = Category::with('posts')->get();
        $data['latestPosts'] = Post::with('category')->latest()->take(3)->get();
        $data['tags'] = Tag::get();
        return view('Frontend.post.all_post', $data);
    }

    public function tagWisePost(Tag $slug)
    {
        $tagWisePosts = $slug->posts()->paginate(6);

        $data = [];
        $data['posts'] = $tagWisePosts;
        $data['categories'] = Category::with('posts')->get();
        $data['latestPosts'] = Post::with('category')->latest()->take(3)->get();
        $data['tags'] = Tag::get();
        return view('Frontend.post.all_post', $data);
    }

    public function storePostComment(Request $request, Post $post)
    {
        // return Auth('user')->user()->name;
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'exists:users,email'],
            'comment' => ['required'],
        ]);

        $check = $this->postCommentsExistsOrNot($post->id, Auth('user')->user()->id);

        if($check){
            session()->flash('warning', 'You are already Commented!');
        }else{

            $comment = $post->comments()->create([
                'user_id' => Auth('user')->user()->id,
                // 'post_id' => $post->id, // jehto post er under e comment insert kortechi, ti post id auto peye jabe.
                'comment' => $request->comment,
            ]);
    
            if($comment){
                session()->flash('success', 'Comment Added Successfully!');
            }
        }
        return back();
    }

    // User comments exists check
    protected function postCommentsExistsOrNot($post_id, $user_id)
    {
        $result = PostComment::where('post_id', $post_id)->where('user_id', $user_id)->first();

        if($result){
            return true;
        }else{
            return false;
        }
    }


    // Search Post
    public function searchPost($query)
    {
        // info($query);
        return Post::withOnly('author')->where('name', 'like', "%$query%")->get(['name', 'slug', 'author_id']);
    }

    // subscriber
    public function subscriber(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:subscribers,email']
        ]);

        $subscriber = Subscriber::create([
            'email' => $request->email
        ]);

        if($subscriber){
            Mail::to($subscriber->email)->send(new SendFormSubscriberEmial($subscriber));
        }
    }

    // Post Status Active and Inactive
    public function postStatusAction(Post $post)
    {
        $status = $post->status;
        if($status == 0){
            $post->update([
                'status' => 1
            ]);
            $this->notification('Post Status is Active');
        }else{
            $post->update([
                'status' => 0
            ]);
            $this->notification('Post Status is Inactive');
        }
        return back();
    }
}
