<?php

use App\Http\Controllers\ForgotPasswordController;

Route::get('password/reset', [ForgotPasswordController::class, 'reset'])->name('password.reset');
Route::post('password/reset', [ForgotPasswordController::class, 'update'])->name('password.update');
Route::get('password/email/send', [ForgotPasswordController::class, 'send'])->name('password.email.send');