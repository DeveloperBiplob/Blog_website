<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::resource('category', CategoryController::class);
});