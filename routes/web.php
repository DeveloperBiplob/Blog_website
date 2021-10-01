<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/all-post', [PostController::class, 'allPost'])->name('all-post');



Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/admin_auth.php';
