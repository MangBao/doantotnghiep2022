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
    Route::get('/show/{id}', [
        'as' => 'giangvien.show',
        'uses' => GiangVienController::class . '@show'
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

