<?php

use App\Http\Controllers\Frontend\Transaction\OrderListController;

Route::group([ 
    'as' => 'transaction.',
    'middleware' => ['auth', 'password_expires'],
], function () {

    // Branches List Routes
    Route::group([
        'prefix' => 'order',
        'as' => 'order.', 
    ], function () {
    
        Route::get('/', [OrderListController::class, 'index'])->name('index');  

        Route::group(['prefix' => '{order}',
        'middleware' => ['auth', 'password_expires'],], function () {
            Route::get('/', [OrderListController::class, 'show'])->name('show');  
        });
    });
});