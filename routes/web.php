<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnifeController;


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

Route::get('/knives', [KnifeController::class, 'index'])->name('knives.index');
Route::get('/knives/create', [KnifeController::class, 'create'])->name('knives.create');
Route::post('/knives', [KnifeController::class, 'store'])->name('knives.store');
Route::get('/knives/{knife}/edit', [KnifeController::class, 'edit'])->name('knives.edit');
Route::put('/knives/{knife}', [KnifeController::class, 'update'])->name('knives.update');
Route::delete('/knives/{knife}', [KnifeController::class, 'destroy'])->name('knives.destroy');


require __DIR__.'/auth.php';
