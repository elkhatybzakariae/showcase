<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
})->name('landing');
Route::get('/about', function () {
    return view('about');
})->name('about');

