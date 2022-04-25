<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\PhongThiController;
use App\Http\Controllers\MonHocController;
use App\Http\Controllers\BuoiThiController;
use App\Http\Controllers\LichCoiThiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// // Xử lý form đăng nhập
// Route::post('/login_process', [AccountController::class, 'Login_Process']);

Auth::routes();

Route::get('/', [HomeController::class, 'index']);
Route::middleware('password.confirm')->get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('giangvien')->group(function () {
    Route::get('/', [
        'as' => 'giangvien.index',
        'uses' => GiangVienController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'giangvien.create',
        'uses' => GiangVienController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'giangvien.store',
        'uses' => GiangVienController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'giangvien.show',
        'uses' => GiangVienController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'giangvien.edit',
        'uses' => GiangVienController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'giangvien.update',
        'uses' => GiangVienController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'giangvien.delete',
        'uses' => GiangVienController::class . '@delete'
    ]);
});

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

Route::prefix('phongthi')->group(function () {
    Route::get('/', [
        'as' => 'phongthi.index',
        'uses' => PhongThiController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'phongthi.create',
        'uses' => PhongThiController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'phongthi.store',
        'uses' => PhongThiController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'phongthi.show',
        'uses' => PhongThiController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'phongthi.edit',
        'uses' => PhongThiController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'phongthi.update',
        'uses' => PhongThiController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'phongthi.delete',
        'uses' => PhongThiController::class . '@delete'
    ]);
});

Route::prefix('monhoc')->group(function () {
    Route::get('/', [
        'as' => 'monhoc.index',
        'uses' => MonHocController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'monhoc.create',
        'uses' => MonHocController::class . '@create'
    ]);
    Route::post('/store', [
        'as' => 'monhoc.store',
        'uses' => MonHocController::class . '@store'
    ]);
    Route::get('/show/{id}', [
        'as' => 'monhoc.show',
        'uses' => MonHocController::class . '@show'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'monhoc.edit',
        'uses' => MonHocController::class . '@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'monhoc.update',
        'uses' => MonHocController::class . '@update'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'monhoc.delete',
        'uses' => MonHocController::class . '@delete'
    ]);
});

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
