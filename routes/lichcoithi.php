<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LichCoiThiController;

Route::prefix('lichcoithi')->group(function () {
    Route::get('/', [
        'as' => 'lichcoithi.index',
        'uses' => LichCoiThiController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'lichcoithi.create',
        'uses' => LichCoiThiController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'lichcoithi.store',
        'uses' => LichCoiThiController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'lichcoithi.show',
        'uses' => LichCoiThiController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'lichcoithi.edit',
        'uses' => LichCoiThiController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'lichcoithi.update',
        'uses' => LichCoiThiController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'lichcoithi.delete',
        'uses' => LichCoiThiController::class . '@delete'
    ]);
});
