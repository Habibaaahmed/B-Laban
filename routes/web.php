<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'loginIndex'])->name('login');
    Route::get('register', [AuthController::class, 'registerIndex'])->name('register');

    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});
Route::get('/category/{id}/search', [CategoryController::class, 'search'])->name('category.search');
Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// In routes/web.php
Route::get('/', [AuthController::class, 'loginIndex'])->name('login');


Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('product/{id}/review', [ReviewController::class, 'store'])->middleware('auth')->name('product.review.store');


Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');
Route::get('/success', function () {
    return view('cart.success');
})->name('success');