<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

Route::view('user', 'user')
    ->middleware(['auth', 'verified', 'user'])
    ->name('user');

Route::view('agent', 'agent')
    ->middleware(['auth', 'verified', 'agent'])
    ->name('agent');


Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
