<?php

use App\Http\Controllers\UserController;

Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
