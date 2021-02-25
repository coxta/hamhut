<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'visitor'])
                ->middleware('guest')
                ->name('visitor');

Route::get('/home', [UserController::class, 'home'])
                ->middleware('auth')
                ->name('home');

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