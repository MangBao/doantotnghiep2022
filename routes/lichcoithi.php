<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LichCoiThiController;

Route::prefix('lichcoithi')->group(function () {
    Route::get('/', [
        'as' => 'lichcoithi.index',
        'uses' => LichCoiThiController::class . '@index'
    ]);
    Route::get('/lichcoithiauto', [
        'as' => 'lichcoithi.lichcoithiauto',
        'uses' => LichCoiThiController::class . '@lichcoithiauto'
    ]);
    Route::get('/cuatoi', [
        'as' => 'lichcoithi.cuatoi',
        'uses' => LichCoiThiController::class . '@cuatoi'
    ]);
    Route::get('/export', [
        'as' => 'lichcoithi.export',
        'uses' => LichCoiThiController::class . '@export'
    ]);
    Route::post('/updatethongbao', [
        'as' => 'lichcoithi.updatethongbao',
        'uses' => LichCoiThiController::class . '@updatethongbao'
    ]);
    Route::post('/store', [
        'as' => 'lichcoithi.store',
        'uses' => LichCoiThiController::class . '@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'lichcoithi.edit',
        'uses' => LichCoiThiController::class . '@edit'
    ]);
    Route::get('/xinvang/{id}', [
        'as' => 'lichcoithi.xinvang',
        'uses' => LichCoiThiController::class . '@xinvang'
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
