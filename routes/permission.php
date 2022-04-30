<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::group(['prefix' => '/permission'], function () {
    Route::get('/index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/create', [PermissionController::class, 'create'])->name('permission.create');
    Route::get('/edit/{id}', [PermissionController::class, 'index'])->name('permission.edit');
    Route::get('/delete{id}', [PermissionController::class, 'index'])->name('permission.delete');
});

// Route::prefix('permission')->group(function () {
//     Route::get('/', [
//         'as' => 'permission.index',
//         'uses' => PermissionController::class . '@index'
//     ]);
//     Route::get('/create', [
//         'as' => 'permission.create',
//         'uses' => PermissionController::class . '@create'
//     ]);
//     Route::post('/store', [
//         'as' => 'permission.store',
//         'uses' => PermissionController::class . '@store'
//     ]);
//     Route::get('/show/{id}', [
//         'as' => 'permission.show',
//         'uses' => PermissionController::class . '@show'
//     ]);
//     Route::get('/edit/{id}', [
//         'as' => 'permission.edit',
//         'uses' => PermissionController::class . '@edit'
//     ]);
//     Route::post('/update/{id}', [
//         'as' => 'permission.update',
//         'uses' => PermissionController::class . '@update'
//     ]);
//     Route::get('/delete/{id}', [
//         'as' => 'permission.delete',
//         'uses' => PermissionController::class . '@delete'
//     ]);
// });
