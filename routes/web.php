<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/operators', function () {
    return view('operators');
})->name('operators');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');