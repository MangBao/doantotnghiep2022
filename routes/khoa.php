<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhoaController;

Route::prefix('khoa')->group(function () {
    Route::get('/', [
        'as' => 'khoa.index',
        'uses' => KhoaController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'khoa.create',
        'uses' => KhoaController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'khoa.store',
        'uses' => KhoaController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'khoa.show',
        'uses' => KhoaController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'khoa.edit',
        'uses' => KhoaController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'khoa.update',
        'uses' => KhoaController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'khoa.delete',
        'uses' => KhoaController::class . '@delete'
    ]);
});
