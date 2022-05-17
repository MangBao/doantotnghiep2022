<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiangVienController;


Route::prefix('giangvien')->group(function () {
    Route::get('/', [
        'as' => 'giangvien.index',
        'uses' => GiangVienController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'giangvien.create',
        'uses' => GiangVienController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'giangvien.store',
        'uses' => GiangVienController::class . '@store'
    ]);
    Route::post('/import', [
        'as' => 'giangvien.import',
        'uses' => GiangVienController::class . '@import'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'giangvien.edit',
        'uses' => GiangVienController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'giangvien.update',
        'uses' => GiangVienController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'giangvien.delete',
        'uses' => GiangVienController::class . '@delete'
    ]);
});

