<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Profile\AdminProfileController;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        Validator::extend('admin_password', function ($attribute, $value, $parameters, $validator) {
            // Define your custom password validation rules here
            // Example: Password must be at least 8 characters, contain at least one uppercase letter, and one special character.
            $minLength = 8;
            $hasUppercase = preg_match('/[A-Z]/', $value);
            // $hasSpecialCharacter = preg_match('/[!@#$%^&*()_+{}[\]:;<>,.?~\\\\-]/', $value);
    
            // return strlen($value) >= $minLength && $hasUppercase && $hasSpecialCharacter;
            return strlen($value) >= $minLength && $hasUppercase;
        });
    }
}
