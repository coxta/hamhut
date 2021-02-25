<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('visitor');
})->name('visitor')->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

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