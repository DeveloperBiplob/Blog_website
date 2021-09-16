<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::resource('category', CategoryController::class);

    // Axios Request er jonno Route defien korchi.
    Route::get('fetch-category', [CategoryController::class, 'fetchCategory'])->name('fetch-category');
});