<?php

use App\Http\Controllers\Frontend\Record\BranchListController;
use App\Http\Controllers\Frontend\Record\ServiceListController;
use App\Http\Controllers\Frontend\Record\SymptomListController;

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
        Route::get('/list/date', [ServiceListController::class, 'showListTime'])->name('list.date');
        Route::get('/check/time', [ServiceListController::class, 'checkListTime'])->name('check.time');
        Route::delete('/remove/cart', [ServiceListController::class, 'removeFromCart'])->name('cart.remove'); 

        Route::group(['prefix' => '{service}', 'middleware' => ['auth', 'password_expires']], function () {
            Route::get('/', [ServiceListController::class, 'show'])->name('show'); 
            Route::post('/reserve', [ServiceListController::class, 'reserve'])->name('reserve'); 
        });
    });

    // Symptom List Routes
    Route::group([
        'prefix' => 'symptom',
        'as' => 'symptom.', 
    ], function () {
    
        Route::get('/', [SymptomListController::class, 'index'])->name('index');  
        Route::get('/all', [SymptomListController::class, 'all'])->name('all');  

        Route::group(['prefix' => '{symptom}', 'middleware' => ['auth', 'password_expires']], function () {
            Route::get('/', [SymptomListController::class, 'show'])->name('show'); 
            Route::post('/reserve', [SymptomListController::class, 'reserve'])->name('reserve'); 
        });
    });

});