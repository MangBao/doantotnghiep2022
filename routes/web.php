<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\PhongThiController;
use App\Http\Controllers\MonThiController;
use App\Http\Controllers\CaThiController;
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
    Route::post('/show/{id}', [
        'as' => 'giangvien.show',
        'uses' => GiangVienController::class . '@show'
    ]);
    Route::post('/update/{id}', [
        'as' => 'giangvien.update',
        'uses' => GiangVienController::class . '@update'
    ]);
    Route::post('/delete/{id}', [
        'as' => 'giangvien.delete',
        'uses' => GiangVienController::class . '@delete'
    ]);
});

Route::prefix('cathi')->group(function () {
    Route::get('/', [
        'as' => 'cathi.index',
        'uses' => CaThiController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'cathi.create',
        'uses' => CaThiController::class . '@create'
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
});

Route::prefix('monthi')->group(function () {
    Route::get('/', [
        'as' => 'monthi.index',
        'uses' => MonThiController::class . '@index'
    ]);
    Route::get('/create', [
        'as' => 'monthi.create',
        'uses' => MonThiController::class . '@create'
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
});
