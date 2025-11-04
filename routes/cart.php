<?php

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::get('/cart/lookup', [CartController::class, 'lookup'])->name('cart.lookup');