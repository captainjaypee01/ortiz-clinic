<?php

use App\Http\Controllers\Backend\Record\BranchController;
use App\Http\Controllers\Backend\Record\RoomController;
use App\Http\Controllers\Backend\Record\ServiceController;
use App\Http\Controllers\Backend\Record\SymptomController;

Route::group([
    'prefix' => 'record',
    'as' => 'record.',
], function () {

    // Branch Routes
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
            Route::get('/rooms/{room}/delete', [BranchController::class, 'destroyRoom'])->name('rooms.destroy');
            Route::post('/rooms', [BranchController::class, 'storeRoom'])->name('rooms.add');
            Route::patch('/', [BranchController::class, 'update'])->name('update');
            Route::delete('/', [BranchController::class, 'destroy'])->name('destroy');
        });
    });

    // Branch Routes
    Route::group([
        'prefix' => 'room',
        'as' => 'room.', 
    ], function () {
    
        Route::get('/', [RoomController::class, 'index'])->name('index'); 
        Route::get('/create', [RoomController::class, 'create'])->name('create');
        Route::post('/', [RoomController::class, 'store'])->name('store');

        Route::group(['prefix' => '{room}'], function () {
            Route::get('/', [RoomController::class, 'show'])->name('show');
            Route::get('/edit', [RoomController::class, 'edit'])->name('edit');
            Route::get('mark/{status}', [RoomController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/', [RoomController::class, 'update'])->name('update');
            Route::delete('/', [RoomController::class, 'destroy'])->name('destroy');
        });
    });

    // Service Routes
    Route::group([
        'prefix' => 'service',
        'as' => 'service.', 
    ], function () {
    
        Route::get('/', [ServiceController::class, 'index'])->name('index'); 
        Route::get('/create', [ServiceController::class, 'create'])->name('create');
        Route::post('/', [ServiceController::class, 'store'])->name('store');

        Route::group(['prefix' => '{service}'], function () {
            Route::get('/', [ServiceController::class, 'show'])->name('show');
            Route::get('/edit', [ServiceController::class, 'edit'])->name('edit');
            Route::get('/assign', [ServiceController::class, 'assign_branch'])->name('assign_branch');
            Route::get('mark/{status}', [ServiceController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']);
            Route::patch('/branch', [ServiceController::class, 'store_branch'])->name('store_branch');
            Route::patch('/', [ServiceController::class, 'update'])->name('update');
            Route::delete('/', [ServiceController::class, 'destroy'])->name('destroy');
        });
    });

    // Symptom Routes
    Route::group([
        'prefix' => 'symptom',
        'as' => 'symptom.', 
    ], function () {
    
        Route::get('/', [SymptomController::class, 'index'])->name('index'); 
        Route::get('/create', [SymptomController::class, 'create'])->name('create');
        Route::post('/', [SymptomController::class, 'store'])->name('store');

        Route::group(['prefix' => '{symptom}'], function () {
            Route::get('/', [SymptomController::class, 'show'])->name('show');
            Route::get('/edit', [SymptomController::class, 'edit'])->name('edit'); 
            Route::get('mark/{status}', [SymptomController::class, 'mark'])->name('mark')->where(['status' => '[0,1]']); 
            Route::patch('/', [SymptomController::class, 'update'])->name('update');
            Route::delete('/', [SymptomController::class, 'destroy'])->name('destroy');
        });
    });


});
