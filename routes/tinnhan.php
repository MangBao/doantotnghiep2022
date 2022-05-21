<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TinNhanController;

Route::prefix('tinnhan')->group(function () {
    Route::get('/', [
        'as' => 'tinnhan.tinnhan',
        'uses' => TinNhanController::class . '@index'
    ]);

    Route::get('/viewchat/{id}', [
        'as' => 'tinnhan.viewchat',
        'uses' => TinNhanController::class . '@viewchat'
    ]);

    Route::get('/getchat/{id}', [
        'as' => 'tinnhan.getchat',
        'uses' => TinNhanController::class . '@getchat'
    ]);

    Route::get('/getstatususer/{id}', [
        'as' => 'tinnhan.getstatususer',
        'uses' => TinNhanController::class . '@getstatususer'
    ]);

    Route::get('/getlistuser', [
        'as' => 'tinnhan.getlistuser',
        'uses' => TinNhanController::class . '@getlistuser'
    ]);

    Route::post('/insertchat', [
        'as' => 'tinnhan.insertchat',
        'uses' => TinNhanController::class . '@insertchat'
    ]);

    Route::get('/deletechat/{id}', [
        'as' => 'tinnhan.deletechat',
        'uses' => TinNhanController::class . '@deletechat'
    ]);

    Route::get('/takebackmess/{id}', [
        'as' => 'tinnhan.takebackmess',
        'uses' => TinNhanController::class . '@takebackmess'
    ]);

});
