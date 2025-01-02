<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'getPdfColis'])->name('landing');
Route::get('/about', [HomeController::class, 'getPdfColis'])->name('about');



