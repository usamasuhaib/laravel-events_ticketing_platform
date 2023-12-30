<?php

use App\Http\Controllers\Attendeeauth\AuthenticatedSessionController;
use App\Http\Controllers\Attendeeauth\ConfirmablePasswordController;
use App\Http\Controllers\Attendeeauth\EmailVerificationNotificationController;
use App\Http\Controllers\Attendeeauth\EmailVerificationPromptController;
use App\Http\Controllers\Attendeeauth\NewPasswordController;
use App\Http\Controllers\Attendeeauth\PasswordController;
use App\Http\Controllers\Attendeeauth\PasswordResetLinkController;
use App\Http\Controllers\Attendeeauth\RegisteredUserController;
use App\Http\Controllers\Attendeeauth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>['guest:attendee'],'prefix'=>'attendee','as'=>'attendee.'],function(){
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
    Route::post('store', [RegisteredUserController::class, 'store'])->name('storeAttendee');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);




    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::group(['middleware'=>['attendee'],'prefix'=>'attendee','as'=>'attendee.'],function(){
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

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    //             ->name('admin.logout');
});
