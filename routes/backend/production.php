<?php

use App\Http\Controllers\Backend\Production\CategoryController; 
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
 
    // Product Routes
    Route::group([
        'prefix' => 'category',
        'as' => 'category.', 
    ], function () {
    
        Route::get('/', [CategoryController::class, 'index'])->name('index'); 
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');

        Route::group(['prefix' => '{category}'], function () {
            Route::get('/', [CategoryController::class, 'show'])->name('show');
            Route::get('/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::get('mark/{status}', [CategoryController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/', [CategoryController::class, 'update'])->name('update');
            Route::delete('/', [CategoryController::class, 'destroy'])->name('destroy');
        });
    });
 



});
