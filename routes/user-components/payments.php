<?php

use App\Http\Controllers\UserPaymentController;

Route::get('payments', [UserPaymentController::class, 'list'])->name('user.payments.list');
Route::get('payments/create', [UserPaymentController::class, 'form'])->name('user.payments.create');
Route::get('payments/{payment:uuid}/default', [UserPaymentController::class, 'default'])->name('user.payments.default');
Route::post('payments/save', [UserPaymentController::class, 'save'])->name('user.payments.save');
Route::post('payments/{payment:uuid}/delete', [UserPaymentController::class, 'delete'])->name('user.payments.delete');

