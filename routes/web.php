<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'rol:admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/cities/{state}', [LocationController::class, 'cities'])->name('cities');
    Route::get('/states/{country}', [LocationController::class, 'states'])->name('states');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/data', [UserController::class, 'data'])->name('users.data');
});

Route::middleware(['auth', 'rol:user'])->group(function () {
    Route::get('/users/emails', [EmailController::class, 'index'])->name('emails.index');
    Route::get('/users/emails/create', [EmailController::class, 'create'])->name('emails.create');
    Route::post('/users/emails', [EmailController::class, 'store'])->name('emails.store');
});


require __DIR__.'/auth.php';
