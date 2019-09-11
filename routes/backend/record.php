<?php

use App\Http\Controllers\Backend\Record\BranchController;
Route::group([
    'prefix' => 'record',
    'as' => 'record.',
], function () {

    Route::group([
        'prefix' => 'branch',
        'as' => 'branch.', 
    ], function () {
    
        Route::get('/', [BranchController::class, 'index'])->name('index'); 
        Route::get('/create', [BranchController::class, 'create'])->name('create');
        Route::post('/', [BranchController::class, 'store'])->name('store');

        Route::group(['prefix' => '{branch}'], function () {
            Route::get('/', [BranchController::class, 'show'])->name('show');
            Route::get('/edit', [BranchController::class, 'edit'])->name('edit');
            Route::get('mark/{status}', [BranchController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/', [BranchController::class, 'update'])->name('update');
            Route::delete('/', [BranchController::class, 'destroy'])->name('destroy');
        });
    });

});
