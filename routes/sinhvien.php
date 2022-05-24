<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountSVController;
use App\Http\Controllers\LichThiSVController;



Route::get('/logup_process', [AccountSVController::class, 'LogupProcess']);
Route::get('/login_process', [AccountSVController::class, 'LoginProcess']);
Route::get('/logoutsv', [AccountSVController::class, 'LogoutProcess']);

Route::prefix('lichthisv')->group(function () {
    Route::get('/', [
        'as' => 'lichthisv.index',
        'uses' => LichThiSVController::class . '@index'
    ]);
    Route::post('/updatethongbao', [
        'as' => 'lichthisv.updatethongbao',
        'uses' => LichCoiThiController::class . '@updatethongbao'
    ]);
    Route::post('/store', [
        'as' => 'lichthisv.store',
        'uses' => LichThiSVController::class . '@store'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'lichthisv.delete',
        'uses' => LichThiSVController::class . '@delete'
    ]);
    Route::get('/export', [
        'as' => 'lichthisv.export',
        'uses' => LichThiSVController::class . '@export'
    ]);
});


