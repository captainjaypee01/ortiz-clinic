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
        });
    });
    
    // Services List Routes
    Route::group([
        'prefix' => 'services',
        'as' => 'service.', 
    ], function () {
    
        Route::get('/', [ServiceListController::class, 'index'])->name('index');  

        Route::group(['prefix' => '{service}'], function () {
            Route::get('/', [ServiceListController::class, 'show'])->name('show'); 
            Route::post('/reserve', [ServiceListController::class, 'reserve'])->name('reserve'); 
        });
    });

});