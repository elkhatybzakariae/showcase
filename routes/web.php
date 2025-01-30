<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/about', [HomeController::class, 'about'])->name('about');


// Route::controller(UserController::class)->prefix('admin')->group(function () {
//     Route::get('/signup',  'signuppage')->name('auth.admin.signUp');
//     Route::post('/register',  'signup')->name('auth.admin.signUp.store');
//     Route::get('/signin',  'signinpage')->name('auth.admin.signIn');
//     Route::post('/login',  'signin')->name('auth.admin.signIn.store');


//     Route::get('forgot-password', 'showLinkRequestForm')->name('auth.admin.password.request');
//     Route::post('forgot-password', 'sendResetLinkEmail')->name('auth.admin.password.email');

//     Route::get('reset-password/{token}', 'showResetForm')->name('auth.admin.password.reset');
//     Route::post('reset-password', 'reset')->name('auth.admin.password.update');
// });
