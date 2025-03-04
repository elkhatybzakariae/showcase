<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'landing'])->name('landing');
Route::get('/about', [HomeController::class, 'about'])->name('about');
