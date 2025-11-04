<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/product.php';
require __DIR__.'/auth.php';
require __DIR__.'/user.php';
require __DIR__.'/forgot-password.php';
require __DIR__.'/cart.php';