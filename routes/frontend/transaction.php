<?php

use App\Http\Controllers\Frontend\Transaction\OrderListController;
use App\Http\Controllers\Frontend\Transaction\ReservationListController;
use App\Http\Controllers\Frontend\Transaction\TransactionListController;

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
            Route::post('/upload', [OrderListController::class, 'upload'])->name('upload');  
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
            Route::post('/upload', [ReservationListController::class, 'upload'])->name('upload');  
        });
    });

    Route::group([
        "prefix" => "cart",
        "as" => "cart."
    ], function() {
        Route::get('/', [ReservationListController::class, 'showCart'])->name('index');
        Route::post('/checkout', [ReservationListController::class, 'checkout'])->name('checkout');
    });

    
    // Branches List Routes
    Route::group([
        'prefix' => 'transaction',
        'as' => 'transaction.', 
    ], function () {
    
        Route::get('/', [TransactionListController::class, 'index'])->name('index');  

        Route::group(['prefix' => '{transaction}',
        'middleware' => ['auth', 'password_expires'],], function () {
            Route::get('/', [TransactionListController::class, 'show'])->name('show');  
            Route::post('/upload', [TransactionListController::class, 'upload'])->name('upload');  
        });
    });

});