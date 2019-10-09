<?php

use App\Http\Controllers\Frontend\Transaction\OrderListController;
use App\Http\Controllers\Frontend\Transaction\ReservationListController;

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
    
    // Branches List Routes
    Route::group([
        'prefix' => 'reservation',
        'as' => 'reservation.', 
    ], function () {
    
        Route::get('/', [ReservationListController::class, 'index'])->name('index');  

        Route::group(['prefix' => '{reservation}',
        'middleware' => ['auth', 'password_expires'],], function () {
            Route::get('/', [ReservationListController::class, 'show'])->name('show');  
        });
    });
});