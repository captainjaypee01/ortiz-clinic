<?php

use App\Http\Controllers\Backend\Record\BranchController;
use App\Http\Controllers\Backend\Record\ServiceController;
use App\Http\Controllers\Backend\Transaction\OrderController;

Route::group([
    'prefix' => 'transaction',
    'as' => 'transaction.',
], function () {

    // Branch Routes
    Route::group([
        'prefix' => 'order',
        'as' => 'order.', 
    ], function () {
    
        Route::get('/', [OrderController::class, 'index'])->name('index'); 
        Route::get('/create', [OrderController::class, 'create'])->name('create');
        Route::post('/', [OrderController::class, 'store'])->name('store');

        Route::group(['prefix' => '{order}'], function () {
            Route::get('/', [OrderController::class, 'show'])->name('show');
            Route::get('/edit', [OrderController::class, 'edit'])->name('edit');
            Route::get('mark/{status}', [OrderController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/', [OrderController::class, 'update'])->name('update');
            Route::delete('/', [OrderController::class, 'destroy'])->name('destroy');
        });
    });

    // Service Routes
    Route::group([
        'prefix' => 'reservation',
        'as' => 'reservation.', 
    ], function () {
    
        Route::get('/', [ServiceController::class, 'index'])->name('index'); 
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');

        Route::group(['prefix' => '{reservation}'], function () {
            Route::get('/', [ServiceController::class, 'show'])->name('show');
            Route::get('/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::get('/assign', [ServiceController::class, 'assign_branch'])->name('assign_branch');
            Route::get('mark/{status}', [ServiceController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/branch', [ServiceController::class, 'store_branch'])->name('store_branch');
            Route::patch('/', [ServiceController::class, 'update'])->name('update');
            Route::delete('/', [ServiceController::class, 'destroy'])->name('destroy');
        });
    });


});
