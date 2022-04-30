<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuoiThiController;

Route::prefix('buoithi')->group(function () {
    Route::get('/', [
        'as' => 'buoithi.index',
        'uses' => BuoiThiController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'buoithi.create',
        'uses' => BuoiThiController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'buoithi.store',
        'uses' => BuoiThiController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'buoithi.show',
        'uses' => BuoiThiController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'buoithi.edit',
        'uses' => BuoiThiController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'buoithi.update',
        'uses' => BuoiThiController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'buoithi.delete',
        'uses' => BuoiThiController::class . '@delete'
    ]);
});
