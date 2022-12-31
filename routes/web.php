<?php

use App\Http\Controllers\ULSController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Repeaters;

Route::get('/', [UserController::class, 'visitor'])
    ->middleware('guest')
    ->name('visitor');

Route::get('/home', [UserController::class, 'home'])
    ->middleware('auth')
    ->name('home');

Route::get('/sync', [ULSController::class, 'sync_comments'])
    ->middleware('auth')
    ->name('sync');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/stations', function () {
    return view('stations');
})->name('stations');

Route::get('/repeaters', Repeaters::class)->name('repeaters');

Route::get('/favorites', function () {
    return view('favorites');
})->name('favorites');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');
