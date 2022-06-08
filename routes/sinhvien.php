<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AccountSVController;
use App\Http\Controllers\LichThiSVController;
use App\Http\Controllers\SinhVienController;


Route::get('/profilesv', [SinhVienController::class, 'profilesv'])->middleware('auth');

Route::prefix('lichthisv')->group(function () {
    Route::get('/', [
        'as' => 'lichthisv.index',
        'uses' => LichThiSVController::class . '@index'
    ]);
    Route::get('/tintuc', [
        'as' => 'lichthisv.tintuc',
        'uses' => LichThiSVController::class . '@tintuc'
    ]);
    Route::get('/lichcuatoi', [
        'as' => 'lichthisv.lichcuatoi',
        'uses' => LichThiSVController::class . '@lichcuatoi'
    ]);
    Route::post('/updatethongbao', [
        'as' => 'lichthisv.updatethongbao',
        'uses' => LichThiSVController::class . '@updatethongbao'
    ]);
    Route::get('/store/{id}', [
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


