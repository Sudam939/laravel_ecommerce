<?php

use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/vendor/{id}', [PageController::class, 'vendor'])->name('vendor');
Route::get('/search', [PageController::class, 'search'])->name('search');
Route::post('/vendor-store', [PageController::class, 'vendor_store'])->name('vendor_store');

// Google Routes
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/store-cart', [UserController::class, 'store_cart'])->name('store_cart');
    Route::get('/carts', [UserController::class, 'carts'])->name('carts');
    Route::delete('/delete-cart/{id}', [UserController::class, 'delete_cart'])->name('delete_cart');
    Route::get('/checkout', [UserController::class, 'checkout'])->name('checkout');

    Route::post('/store-address', [UserController::class, 'store_address'])->name('store_address');
    Route::post('/store-order', [UserController::class, 'store_order'])->name('store_order');
});

require __DIR__ . '/auth.php';
