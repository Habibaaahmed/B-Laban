<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginIndex'])->name('login');
    Route::get('register', [AuthController::class, 'registerIndex'])->name('register');

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/home', function () {
    return view('homescreen.index');
})->name('home');



Route::get('/home', [HomeController::class, 'index']);
// In routes/web.php
Route::get('/', [AuthController::class, 'loginIndex'])->name('login');


Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/category/{id}/search', [CategoryController::class, 'search'])->name('category.search');



Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('product/{id}/review', [ReviewController::class, 'store'])->middleware('auth')->name('product.review.store');


Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);



