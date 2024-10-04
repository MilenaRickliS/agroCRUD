<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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


Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::post('/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->where('id', '[0-9]+');
Route::put('/products/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');
Route::patch('/products/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->where('id', '[0-9]+');

require __DIR__.'/auth.php';
