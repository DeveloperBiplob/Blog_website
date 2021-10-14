<?php

use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use App\Http\Controllers\Frontend\UserController;
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
