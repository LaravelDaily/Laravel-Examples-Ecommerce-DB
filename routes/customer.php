<?php

// Authenticated User Routes
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\ReviewController;
use App\Http\Controllers\Customer\ProfileController;

Route::group(['middleware' => ['auth']], function () {
    // Cart Management
    Route::get('cart', [CartController::class, 'index']); // View cart
    Route::post('cart/{product}', [CartController::class, 'store']); // Add to cart
    Route::delete('cart/{cart}', [CartController::class, 'destroy']); // Remove from cart

    // Wishlist Management
    Route::get('wishlist', [WishlistController::class, 'index']); // View wishlist
    Route::post('wishlist/{wishlist}', [WishlistController::class, 'store']); // Add to wishlist
    Route::delete('wishlist/{wishlist}', [WishlistController::class, 'destroy']); // Remove from wishlist

    // Orders
    Route::get('orders', [OrderController::class, 'index']); // List user orders
    Route::get('orders/{order}', [OrderController::class, 'show']); // View order details
    Route::post('orders/{cart}/{userAddress}', [OrderController::class, 'store']); // Place an order

    // User Profile
    Route::get('profile', [ProfileController::class, 'show']); // View user profile
    Route::put('profile', [ProfileController::class, 'update']); // Update user profile

    Route::post('products/{product}/reviews', [ReviewController::class, 'store']); // Submit a product review
});
