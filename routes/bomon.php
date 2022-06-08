<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoMonController;

Route::prefix('bomon')->group(function () {
    Route::get('/', [
        'as' => 'bomon.index',
        'uses' => BoMonController::class . '@index'
    ]);
    Route::get('/search', [
        'as' => 'bomon.search',
        'uses' => BoMonController::class . '@search'
    ]);
    Route::get('/create', [
        'as' => 'bomon.create',
        'uses' => BoMonController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'bomon.store',
        'uses' => BoMonController::class . '@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'bomon.edit',
        'uses' => BoMonController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'bomon.update',
        'uses' => BoMonController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'bomon.delete',
        'uses' => BoMonController::class . '@delete'
    ]);
});
