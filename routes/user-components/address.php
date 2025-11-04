<?php

use App\Http\Controllers\UserAddressController;

Route::get('addresses', [UserAddressController::class, 'list'])->name('user.addresses.list');
Route::get('addresses/create', [UserAddressController::class, 'form'])->name('user.addresses.create');
Route::get('addresses/{address:uuid}/edit', [UserAddressController::class, 'form'])->name('user.addresses.edit');
Route::get('addresses/{address:uuid}/default', [UserAddressController::class, 'default'])->name('user.addresses.default');
Route::post('addresses/save', [UserAddressController::class, 'save'])->name('user.addresses.save');
Route::post('addresses/{address:uuid}/delete', [UserAddressController::class, 'delete'])->name('user.addresses.delete');
