<?php

use App\Http\Controllers\Frontend\Production\ProductListController;

Route::group([ 
    'as' => 'production.', 
], function () {

    // Branches List Routes
    Route::group([
        'prefix' => 'products',
        'as' => 'product.', 
    ], function () {
    
        Route::get('/', [ProductListController::class, 'index'])->name('index');  
        Route::patch('/update/cart', [ProductListController::class, 'updateFromCart'])->name('cart.update'); 
        Route::delete('/remove/cart', [ProductListController::class, 'removeFromCart'])->name('cart.remove'); 

        Route::group(['prefix' => '{product}',
        'middleware' => ['auth', 'password_expires'],], function () {
            Route::get('/', [ProductListController::class, 'show'])->name('show'); 
            Route::post('/order', [ProductListController::class, 'order'])->name('order'); 
            Route::post('/cart/add', [ProductListController::class, 'addToCart'])->name('cart.add'); 
        });
    });
     

});