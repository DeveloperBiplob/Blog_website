<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::resource('category', CategoryController::class);

    // Axios Request er jonno Route defien korchi.
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');

    Route::resource('sub-category', SubCategoryController::class)->except(['create', 'edit']);

    Route::get('fetch-sub-category', [SubCategoryController::class, 'fetchSubCategory'])->name('fetch-sub-category');

    // Post
    Route::resource('post', PostController::class);
    Route::get('get-sub-category-by-category/{id}', [PostController::class, 'getSubCategoryByCategory'])->name('get-sub-cat-by-cat');
    Route::get('check-post-exists-or-not/{id}', [PostController::class, 'checkPostExistOrNot']);

    Route::resource('tag', TagController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('website', WebsiteController::class);
});

