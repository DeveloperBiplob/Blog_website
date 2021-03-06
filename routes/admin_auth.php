<?php

use App\Http\Controllers\Admin\Auth\ {
    AuthenticatedSessionController,
    ConfirmablePasswordController,
    EmailVerificationNotificationController,
    EmailVerificationPromptController,
    NewPasswordController,
    PasswordResetLinkController,
    RegisteredAdminController,
    VerifyEmailController
};


use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    
Route::get('/register', [RegisteredAdminController::class, 'create'])
                ->middleware('guest:web')
                ->name('register');

Route::post('/register', [RegisteredAdminController::class, 'store'])
                ->middleware('guest:web');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest:web')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest:web');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest:web')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest:web')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest:web')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest:web')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth:web')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth:web', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth:web', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth:web')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth:web');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth:web')
                ->name('logout');

});