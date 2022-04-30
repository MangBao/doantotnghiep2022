<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhongThiController;

Route::prefix('phongthi')->group(function () {
    Route::get('/', [
        'as' => 'phongthi.index',
        'uses' => PhongThiController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'phongthi.create',
        'uses' => PhongThiController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'phongthi.store',
        'uses' => PhongThiController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'phongthi.show',
        'uses' => PhongThiController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'phongthi.edit',
        'uses' => PhongThiController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'phongthi.update',
        'uses' => PhongThiController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'phongthi.delete',
        'uses' => PhongThiController::class . '@delete'
    ]);
});
