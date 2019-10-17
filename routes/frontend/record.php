<?php

use App\Http\Controllers\Frontend\Record\BranchListController;
use App\Http\Controllers\Frontend\Record\ServiceListController;

Route::group([ 
    'as' => 'record.',
], function () {

    // Branches List Routes
    Route::group([
        'prefix' => 'branches',
        'as' => 'branch.', 
    ], function () {
    
        Route::get('/', [BranchListController::class, 'index'])->name('index');   

        Route::group(['prefix' => '{branch}'], function () {
            Route::get('/', [BranchListController::class, 'show'])->name('show'); 
            
            Route::group( ['middleware' => ['auth', 'password_expires']], function() {
                Route::get('service/{service}', [ServiceListController::class, 'show'])->name('service.show'); 
                Route::post('service/{service}/cart/add', [ServiceListController::class, 'addToCart'])->name('service.cart.add'); 
            });
        });
    });
    
    // Services List Routes
    Route::group([
        'prefix' => 'services',
        'as' => 'service.', 
    ], function () {
    
        Route::get('/', [ServiceListController::class, 'index'])->name('index');  
        Route::delete('/remove/cart', [ServiceListController::class, 'removeFromCart'])->name('cart.remove'); 

        Route::group(['prefix' => '{service}', 'middleware' => ['auth', 'password_expires']], function () {
            Route::get('/', [ServiceListController::class, 'show'])->name('show'); 
            Route::post('/reserve', [ServiceListController::class, 'reserve'])->name('reserve'); 
        });
    });

});