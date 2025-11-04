<?php

use App\Http\Controllers\ProductController;

Route::prefix('/products')->name('products.')->group(function(){
    Route::get('/', [ProductController::class, 'list'])->name('list');

    Route::get('/categories/{category:slug}', [ProductController::class, 'categories'])->name('categories');
    Route::get('/collections/{collection:slug}', [ProductController::class, 'collections'])->name('collections');

    Route::get('/{product:slug}', [ProductController::class, 'detail'])->name('detail');

});

