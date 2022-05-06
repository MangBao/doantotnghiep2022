<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonXinVangController;


Route::prefix('donxinvang')->group(function () {
    Route::get('/', [
        'as' => 'donxinvang.index',
        'uses' => DonXinVangController::class . '@index'
    ]);
    Route::get('/xinvang', [
        'as' => 'donxinvang.xinvang',
        'uses' => DonXinVangController::class . '@xinvang'
    ]);
    Route::post('/store', [
        'as' => 'donxinvang.store',
        'uses' => DonXinVangController::class . '@store'
    ]);
    Route::get('/duyetdon/{id}', [
        'as' => 'donxinvang.duyetdon',
        'uses' => DonXinVangController::class . '@duyetdon'
    ]);
    Route::post('/update/{id}', [
        'as' => 'donxinvang.update',
        'uses' => DonXinVangController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'donxinvang.delete',
        'uses' => DonXinVangController::class . '@delete'
    ]);
});

