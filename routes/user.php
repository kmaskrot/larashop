<?php

use App\Http\Controllers\UserController;

Route::prefix('/users/{user:slug}')->middleware(['auth'])->group(function () {
    Route::get('/', [UserController::class, 'detail'])->name('user.detail');
    foreach (glob(__DIR__ . '/user-components/*.php') as $filename) {
        require $filename;
    }

});


