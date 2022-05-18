<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuanLyRoutesController;

Route::prefix('quanlyroutes')->group(function () {
    Route::get('/', [
        'as' => 'quanlyroutes.index',
        'uses' => QuanLyRoutesController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'quanlyroutes.create',
        'uses' => QuanLyRoutesController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'quanlyroutes.store',
        'uses' => QuanLyRoutesController::class . '@store'
    ]);
    Route::get('/blocking/{role_id}/{route_id}', [
        'as' => 'quanlyroutes.blocking',
        'uses' => QuanLyRoutesController::class . '@blocking'
    ]);
    Route::get('/delete/{role_id}/{route_id}', [
        'as' => 'quanlyroutes.delete',
        'uses' => QuanLyRoutesController::class . '@delete'
    ]);
});
