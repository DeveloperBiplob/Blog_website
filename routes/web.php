<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\SocialLoginController;
use App\Http\Controllers\Frontend\UserController;
use App\Mail\SocialNewUserMail;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/all-post', [PostController::class, 'allPost'])->name('all-post');

Route::get('/post/{slug}', [PostController::class, 'singlePost'])->name('single-post');

Route::get('/post/category/{slug}', [PostController::class, 'categoryWisePost'])->name('category-post');

Route::get('/post/tag/{slug}', [PostController::class, 'tagWisePost'])->name('tag-post');

// Under Authenticaton 
Route::middleware(['auth:user'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
                ->name('user-dashboard');

    Route::post('post-comments/{post}', [PostController::class, 'storePostComment'])
                ->name('post-comments');

    Route::get('/user-comments', [UserController::class, 'userPostComments'])
                ->name('user-all-comments');

    Route::get('bookmark-post/{post}', [UserController::class, 'bookmarkPosts'])
                ->name('bookmark');

    Route::get('show-bookmarks', [UserController::class, 'showBookmarks'])
                ->name('show-bookmarks');

});




Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web'])->name('dashboard');

require __DIR__.'/admin_auth.php';



// Social Login

Route::get('/auth/redirect/{provider}', [SocialLoginController::class, 'login'])->name('social-login');

Route::get('/auth/{provider}/callback/', [SocialLoginController::class, 'callback'])->name('social-callback');

// Test Mail template-------//
// Route::get('mial-test', function () {
//     $user = User::first();
//     return new SocialNewUserMail($user);
// });


// Dynamic Search
Route::get('/search-post/{query}', [PostController::class, 'searchPost'])->name('search-post');


// Subscribers
Route::post('/subscriber', [PostController::class, 'subscriber'])->name('subscriber');