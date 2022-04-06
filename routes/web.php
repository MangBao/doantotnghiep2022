<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GiangVien;
use App\Http\Controllers\PhongThi;
use App\Http\Controllers\MonThi;
use App\Http\Controllers\CaThi;
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

// Load view đăng nhập
Route::get('/', function () {
    return view('front-end.login_form');
});

// Xử lý form đăng nhập
Route::post('/login_process', [AccountController::class, 'Login_Process']);

Route::get('/giangvien', [GiangVien::class, 'index']);
Route::get('/cathi', [CaThi::class, 'index']);
Route::get('/phongthi', [PhongThi::class, 'index']);
Route::get('/lichcoithi', [LichCoiThiController::class, 'index']);
Route::get('/monthi', [MonThi::class, 'index']);
// Đăng xuất
Route::get('/logout', [AccountController::class, 'Logout']);
// Chuyển qua giao diện admin
Route::get('/index', function () {
    if(! \Session::has('user')) {
        return redirect('/');
    }
    return view('front-end.admin');
});
