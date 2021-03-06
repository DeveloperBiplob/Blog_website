<?php

use App\Http\Controllers\Frontend\Auth\ {
    AuthenticatedSessionController,
    ConfirmablePasswordController,
    EmailVerificationNotificationController,
    EmailVerificationPromptController,
    NewPasswordController,
    PasswordResetLinkController,
    RegisteredAdminController,
    VerifyEmailController
};
use App\Http\Controllers\Frontend\DashboardController;
use Illuminate\Support\Facades\Route;

    
Route::get('/register', [RegisteredAdminController::class, 'create'])
                ->middleware('guest:user')
                ->name('register');

Route::post('/register', [RegisteredAdminController::class, 'store'])
                ->middleware('guest:user');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:user')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:user');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:user')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:user')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:user')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:user')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:user')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:user', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:user', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:user')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:user');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:user')
                ->name('logout');

// Route::middleware(['auth:user'])->group(function () {

//     Route::get('/dashboard', [DashboardController::class, 'index'])
//                 ->name('dashboard');
    
// });