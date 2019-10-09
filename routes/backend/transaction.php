<?php
 
use App\Http\Controllers\Backend\Transaction\OrderController;
use App\Http\Controllers\Backend\Transaction\ReservationController;

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
    
        Route::get('/', [ReservationController::class, 'index'])->name('index'); 
        Route::get('/create', [ReservationController::class, 'create'])->name('create');
        Route::get('/service/branches', [ReservationController::class, 'serviceBranches'])->name('service.branches');
        Route::post('/', [ReservationController::class, 'store'])->name('store');

        Route::group(['prefix' => '{reservation}'], function () {
            Route::get('/', [ReservationController::class, 'show'])->name('show');
            Route::get('/edit', [ReservationController::class, 'edit'])->name('edit'); 
            Route::get('mark/{status}', [ReservationController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']); 
            Route::patch('/', [ReservationController::class, 'update'])->name('update');
            Route::delete('/', [ReservationController::class, 'destroy'])->name('destroy');
        });
    });


});
