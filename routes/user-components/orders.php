<?php


use App\Http\Controllers\UserController;

Route::get('orders', [UserController::class, 'orders'])->name('user.orders');
