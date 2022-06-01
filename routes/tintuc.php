<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinTucController;
use App\Http\Controllers\TinTucSVController;

Route::get('/show/{id}', [
    'as' => 'tintuc.show',
    'uses' => TinTucSVController::class . '@show'
]);

Route::prefix('tintuc')->group(function () {
    Route::get('/', [
        'as' => 'tintuc.index',
        'uses' => TinTucController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'tintuc.create',
        'uses' => TinTucController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'tintuc.store',
        'uses' => TinTucController::class . '@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'tintuc.edit',
        'uses' => TinTucController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'tintuc.update',
        'uses' => TinTucController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'tintuc.delete',
        'uses' => TinTucController::class . '@delete'
    ]);
});
