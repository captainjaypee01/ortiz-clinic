<?php

use App\Http\Controllers\Backend\Production\ProductController; 

Route::group([
    'prefix' => 'production',
    'as' => 'production.',
], function () {

    // Product Routes
    Route::group([
        'prefix' => 'product',
        'as' => 'product.', 
    ], function () {
    
        Route::get('/', [ProductController::class, 'index'])->name('index'); 
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/', [ProductController::class, 'store'])->name('store');

        Route::group(['prefix' => '{product}'], function () {
            Route::get('/', [ProductController::class, 'show'])->name('show');
            Route::get('/edit', [ProductController::class, 'edit'])->name('edit');
            Route::get('mark/{status}', [ProductController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/', [ProductController::class, 'update'])->name('update');
            Route::delete('/', [ProductController::class, 'destroy'])->name('destroy');
        });
    });
 


});
