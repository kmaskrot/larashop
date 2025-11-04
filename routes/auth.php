<?php

//user authentication
use App\Http\Controllers\AuthenticateController;

Route::view('/lookup', 'components.pages.user.authentication.lookup')->name('auth.lookup');
Route::post('/lookup', [AuthenticateController::class, 'lookup'])->name('auth.lookup.post');

Route::view('/login', 'components.pages.user.authentication.login')->name('auth.login');
Route::post('/login', [AuthenticateController::class, 'login'])->name('auth.login.post');

Route::get('/logout', [AuthenticateController::class, 'logout'])->name('auth.logout');

Route::view('/register', 'components.pages.user.authentication.register')->name('auth.register');
Route::post('/register', [AuthenticateController::class, 'register'])->name('auth.register.post');

