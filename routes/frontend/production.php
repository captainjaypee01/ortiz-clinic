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

        Route::group(['prefix' => '{product}',
        'middleware' => ['auth', 'password_expires'],], function () {
            Route::get('/', [ProductListController::class, 'show'])->name('show'); 
            Route::post('/order', [ProductListController::class, 'order'])->name('order'); 
        });
    });
     

});