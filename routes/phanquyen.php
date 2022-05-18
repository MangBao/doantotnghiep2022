<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhanQuyenController;

Route::prefix('phanquyen')->group(function () {
    Route::get('/', [
        'as' => 'phanquyen.index',
        'uses' => PhanQuyenController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'phanquyen.create',
        'uses' => PhanQuyenController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'phanquyen.store',
        'uses' => PhanQuyenController::class . '@store'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'phanquyen.delete',
        'uses' => PhanQuyenController::class . '@delete'
    ]);
});
