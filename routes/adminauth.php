<?php

use App\Http\Controllers\Adminauth\AuthenticatedSessionController;
use App\Http\Controllers\Adminauth\ConfirmablePasswordController;
use App\Http\Controllers\Adminauth\EmailVerificationNotificationController;
use App\Http\Controllers\Adminauth\EmailVerificationPromptController;
use App\Http\Controllers\Adminauth\NewPasswordController;
use App\Http\Controllers\Adminauth\PasswordController;
use App\Http\Controllers\Adminauth\PasswordResetLinkController;
use App\Http\Controllers\Adminauth\RegisteredUserController;
use App\Http\Controllers\Adminauth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::group(['middleware'=>['guest:admin'],'prefix'=>'admin','as'=>'admin.'],function(){

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('admin.passwordReset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group(['middleware'=>['admin'],'prefix'=>'admin','as'=>'admin.'],function(){
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password-update', [PasswordController::class, 'update'])->name('admin.passwordUpdate');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
});
