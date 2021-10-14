<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bookmark;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Shwo all bookmarks in dashboard
    public function userPostComments()
    {
        // $comments = Auth('user')->user()->comments;
        $comments = Auth::user()->comments;
        return view('frontend.user.comments', compact('comments'));
    }

    // Store Bookmarks
    public function bookmarkPosts(Post $post)
    {
        $check = $this->postBookmarksExistsOrNot($post->name, $post->id);

        if($check){

            $unBookmark = $post->bookmarks()->delete();
            if($unBookmark){
                session()->flash('warning', 'The Post is Unbookmark!');
            }
        }else{
            
            $bookmark = $post->bookmarks()->create([
                'user_id' => Auth('user')->user()->id,
                'name' => $post->name,
                'slug' => $post->name,
            ]);
            
            if($bookmark){
                session()->flash('success', 'Bookmark Added Successfully!');
            }
        }

        return back();
    }

    // Check this post add in bookmarks or not
    protected function postBookmarksExistsOrNot($post_name, $post_id)
    {
        $result = Bookmark::where('name', $post_name)->where('post_id', $post_id)->first();

        if($result){
            return true;
        }else{
            return false;
        }
    }

    // Show bookmarks Post View
    public function showBookmarks()
    {
        $bookmarks = Auth('user')->user()->bookmarks;
        return view('frontend.user.bookmarks', compact('bookmarks'));
    }

}
