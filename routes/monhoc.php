<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonHocController;

Route::prefix('monhoc')->group(function () {
    Route::get('/', [
        'as' => 'monhoc.index',
        'uses' => MonHocController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'monhoc.create',
        'uses' => MonHocController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'monhoc.store',
        'uses' => MonHocController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'monhoc.show',
        'uses' => MonHocController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'monhoc.edit',
        'uses' => MonHocController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'monhoc.update',
        'uses' => MonHocController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'monhoc.delete',
        'uses' => MonHocController::class . '@delete'
    ]);
});
