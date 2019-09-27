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

        Route::group(['prefix' => '{product}'], function () {
            Route::get('/', [ProductListController::class, 'show'])->name('show'); 
        });
    });
     

});